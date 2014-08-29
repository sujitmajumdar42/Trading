<?php

class ProdRepoDAO {

    const CLASS_NAME = "ProdRepoTO";
    const CREATE_QUERY = "INSERT INTO PROD_REPO (`PROD_ID`,`PROD_UNIT`,`PROD_AVAIL`) VALUES (?, ?, ?)";
    const READ_QUERY = "SELECT * from PROD_REPO WHERE PROD_ID =? AND PROD_UNIT = ?";
    const UPDATE_QUERY = "UPDATE PROD_REPO SET PROD_AVAIL = ? WHERE PROD_ID = ? AND PROD_UNIT = ?";
    const CHECK_REPO_QUERY = "SELECT PROD_AVAIL FROM PROD_REPO WHERE PROD_ID = ? AND PROD_UNIT = ?";
    const DELETE_QUERY = "DELETE FROM PROD_REPO WHERE PROD_ID = ?";
     
    function create($prodRepoTO) {
        $params = array($prodRepoTO->get_PROD_ID(), $prodRepoTO->get_PROD_UNIT(), $prodRepoTO->get_PROD_AVAIL());
        DbConfig::queryForObject(self::CREATE_QUERY, $params);
    }

    function read($prodID, $prodUnit) {
        $params = array($prodID, $prodUnit);
        return DbConfig::readQuery(self::READ_QUERY, $params, self::CLASS_NAME);
    }

    function update($prodRepoTO) {
        $params = array($prodRepoTO->get_PROD_AVAIL(), $prodRepoTO->get_PROD_ID(), $prodRepoTO->get_PROD_UNIT());
        DbConfig::queryForObject(self::UPDATE_QUERY, $params);
    }

    function checkRepo($prodID, $prodUnit) {
        $params = array($prodID, $prodUnit);
        return DbConfig::readQuery(self::CHECK_REPO_QUERY, $params, self::CLASS_NAME);
    }
    
    function delete($productId) {
        $params = array($productId);
        DbConfig::queryForObject(self::DELETE_QUERY, $params);
    }
    
    function updateToRepo($prodID, $prodUnit,$quantity,$type){
        $prodAvail = $this->checkRepo($prodID, $prodUnit)->get_PROD_AVAIL();
        if($type == "ADD"){
            $prodAvail += $quantity;
        } else { 
            $prodAvail -= $quantity;
        }
        $prodRepoTO = new ProdRepoTO();
        $prodRepoTO->set_PROD_AVAIL($prodAvail);
        $prodRepoTO->set_PROD_ID($prodID);
        $prodRepoTO->set_PROD_UNIT($prodUnit);
        $this->update($prodRepoTO);
    }

}
