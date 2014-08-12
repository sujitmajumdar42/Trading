<?php
class RcptDetailDAO {

    const CLASS_NAME = "ReceiptDetailTO";
    const CREATE_QUERY = "INSERT INTO `trading`.`receipt_detl`(RCP_ID,RCP_DATE,RCP_TOTAL) values(?,?,?)";

    function create($rcptID, $rcptTotal) {
        $params = array($rcptID, date("Y-m-d h:m:s",time()),$rcptTotal);
        DbConfig::queryForObject(self::CREATE_QUERY, $params);
    }
}