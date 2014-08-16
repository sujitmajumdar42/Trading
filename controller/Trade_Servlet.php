<?php
require_once '../model/BO/Trade_BO.php';
require_once '../model/BO/Product_BO.php';
require_once '../model/DAO/Prod_Repo_DAO.php';
require_once '../model/DAO/Trade_DAO.php';
require_once '../model/DAO/Trade_Detail_DAO.php';
require_once '../model/DAO/Product_DAO.php';
require_once '../model/TO/Trade_TO.php';
require_once '../model/TO/Trade_Detail_TO.php';
require_once '../model/TO/Product_TO.php';
require_once '../model/TO/Prod_Repo_TO.php';

class TradeServlet {

    private $tradeBO;
    private $tradeDetailBO;
    private $prodBO;
    private $tradeDAO;
    private $tradeDetailDAO;
    private $prodDAO;
    private $prodRepoDAO;
    private $tradeTO;
    private $tradeDetailTO;
    private $productTO;
    private $prodRepoTO;

    public function __construct() {
        $this->tradeBO = new TradedBO();
        $this->prodBO = new ProductBO();
        $this->tradeDAO = new TradeDAO();
        $this->tradeDetailDAO = new TradeDetailDAO();
        $this->prodDAO = new ProductDAO();
        $this->tradeTO = new TradeTO();
        $this->tradeDetailTO = new TradeDetailTO();
        $this->productTO = new ProductTO();
        $this->prodRepoDAO = new ProdRepoDAO();
        $this->prodRepoTO = new ProdRepoTO();
        $this->manageTrade();
    }

    public function manageTrade() {
        $oprCode = $_POST['oprCode'];
        switch ($oprCode) {
            case "addTrade" :
                $this->addTrade();
                break;
        }
    }

    public function addTrade() {
        $tradeID = AimsUtility::getID();
        $prodIDs = $_POST['prodID'];
        $prodUnits = $_POST['prodUnit'];
        $prodQty = $_POST['prodQty'];

        $tradeDate = date("Y-m-d", time());
        $tradeType = "IN";
        $userName = "admin";

        $listSize = sizeof($prodIDs);

        $this->tradeTO->set_TRD_ID($tradeID);
        $this->tradeTO->set_TRD_DATE($tradeDate);
        $this->tradeTO->set_TRD_TYPE($tradeType);
        $this->tradeTO->set_USR_USERNAME($userName);
        $this->tradeBO->createTrade($this->tradeTO);
            
        for ($index = 0; $index < $listSize; $index++) {
            $this->tradeDetailTO->set_TRD_ID($tradeID);
            $this->tradeDetailTO->set_PROD_ID($prodIDs[$index]);
            $this->tradeDetailTO->set_PROD_UNIT($prodUnits[$index]);
            $this->tradeDetailTO->set_PROD_QTY($prodQty[$index]);
            $this->tradeBO->createTradeDetail($this->tradeDetailTO);
            
            $this->productTO = $this->prodBO->read($prodIDs[$index]);
            //Update Repo
            $this->prodRepoTO->set_PROD_ID($prodIDs[$index]);
            $this->prodRepoTO->set_PROD_UNIT($prodUnits[$index]);
            $this->prodRepoTO->set_PROD_AVAIL($prodQty[$index]);
            $this->prodBO->updateRepo($this->prodRepoTO);
        }
    }

}
