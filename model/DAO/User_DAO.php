<?php

class UserDAO {
    
    const CLASS_NAME = "UserTO";
    
    const USER_LOGIN = "SELECT * FROM `user` WHERE `USR_USERNAME` = ? and `USR_PASS` = ?";
    const UPDATE_LAST_LOGIN = "UPDATE `user` SET USR_LAST_LOGIN = ? where USR_USERNAME = ?";
    
    const CREATE_QUERY = "INSERT INTO `trading_db`.`brand` (`Brand_Id`, `Brand_name`) VALUES (?, ?)";
    const READ_QUERY = "SELECT * FROM `trading_db`.`brand` WHERE `Brand_Id`=?";
    const READ_ALL_QUERY = "SELECT * FROM `trading_db`.`brand`";
    const UPDATE_QUERY = "UPDATE `trading_db`.`brand` SET `Brand_name` = ? WHERE `brand`.`Brand_Id` = ?";
    const DELETE_QUERY = "DELETE FROM `trading_db`.`brand` WHERE `brand`.`Brand_Id` = ?";
    
    function userLogin($uname,$pass){
        $params = array($uname,$pass);
        $userTO = DbConfig::readQuery(self::USER_LOGIN, $params,self::CLASS_NAME);
        if($userTO!=null){
        $this->updateLastLogin($userTO);
        }
        return $userTO;
    }
    
    function updateLastLogin($userTO){
        $params = array(date('D, d M Y H:i:s'),$userTO->get_USR_USERNAME());
        DbConfig::queryForObject(self::UPDATE_LAST_LOGIN, $params);
    }
    //----------------------------copied code
    function create($brandTO) {
        $params = array($brandTO->getBrandID(), $brandTO->getBrandName());
        DbConfig::queryForObject(self::CREATE_QUERY, $params);
    }

    function read($brandId) {
        $params = array($brandId);
        return DbConfig::readQuery(self::READ_QUERY, $params,self::CLASS_NAME);
    }

    function readAll() {
        return DbConfig::readAllQuery(self::READ_ALL_QUERY, self::CLASS_NAME);
    }

    function update($brandTO) {
        $params = array($brandTO->getBrandName(), $brandTO->getBrandID());
        DbConfig::queryForObject(self::UPDATE_QUERY, $params);
    }

    function delete($brandID) {
        $params = array($brandID);
        DbConfig::queryForObject(self::DELETE_QUERY, $params);
    }

}
