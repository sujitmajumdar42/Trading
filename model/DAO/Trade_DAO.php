<?php

class TradeDAO {
    
    const CLASS_NAME = "TradeTO";
    const CREATE_QUERY = "INSERT INTO `trading_db`.`trade` (`TRD_ID`,`TRD_DATE`,`TRD_TYPE`,`USR_USERNAME`) VALUES (?, ?, ?, ?)";
    const READ_QUERY = "SELECT * FROM `trading_db`.`trade` WHERE `TRD_ID`=?";
    const READ_ALL_QUERY = "SELECT * FROM `trading_db`.`trade`";
    const UPDATE_QUERY = "UPDATE `trading_db`.`trade` SET `TRD_DATE` = ?, `TRD_TYPE` = ?  WHERE `trade`.`TRD_ID` = ?";
    const DELETE_QUERY = "DELETE FROM `trading_db`.`trade` WHERE `trade`.`TRD_ID` = ?";
    const READ_BY_FK = "SELECT * FROM `trading_db`.`trade` WHERE `USR_USERNAME`=?";
    
    function create($tradeTO) {
        $params = array($tradeTO->get_TRD_ID(),$tradeTO->get_TRD_DATE(),$tradeTO->get_TRD_TYPE(),$tradeTO->get_USR_USERNAME());
        DbConfig::queryForObject(self::CREATE_QUERY, $params);
    }

    function read($tradeId) {
        $params = array($tradeId);
        return DbConfig::readQuery(self::READ_QUERY, $params,self::CLASS_NAME);
    }

    function readAll() {
        return DbConfig::readAllQuery(self::READ_ALL_QUERY, self::CLASS_NAME);
    }

    function update($tradeTO) {
        $params = array($tradeTO->get_TRD_DATE(),$tradeTO->get_TRD_TYPE(),$tradeTO->get_TRD_ID());
        DbConfig::queryForObject(self::UPDATE_QUERY, $params);
    }

    function delete($tradeId) {
        $params = array($tradeId);
        DbConfig::queryForObject(self::DELETE_QUERY, $params);
    }
    
    function readByFK($tradeId) {
        $params = array($tradeId);
        return DbConfig::readQuery(self::READ_QUERY, $params,self::CLASS_NAME);
    }

}
