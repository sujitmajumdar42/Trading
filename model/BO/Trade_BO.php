<?php

class TradedBO {

    private $tradeDAO = null;
    private $tradeDetailDAO = null;

    function __construct() {
        $this->tradeDAO = new TradeDAO();
        $this->tradeDetailDAO = new TradeDetailDAO();
    }
    
    function createTrade($tradeTO){
        $this->tradeDAO->create($tradeTO);
    }
    
    function createTradeDetail($tradeDetailTO){
        $this->tradeDetailDAO->create($tradeDetailTO);
    }
}
