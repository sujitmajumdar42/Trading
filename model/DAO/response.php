<?php
require_once '../../config/dbConfig.php';
//$db = getDB();
//$req_id= $_POST["req_id"];
/*if($req_id=="VENDOR"){
    $sql = "select * from `product` where prd_brand=`delmonte`";
    $respDb = $db->query($sql)->fetchAll();
    echo ($respDb['prod_id']);
}*/
/*$page=$db->prepare("select * from `product` where prd_brand='delmonte'");
$page->execute();
$row_no = 0;
while ($row = $page->fetchAll(PDO::FETCH_ASSOC)) {
    echo $row[$row_no]['PRD_NAME'];
    $row_no++;
}*/
//---------------
if(isset($_POST["vendor"])){
    if($_POST["vendor"] == "" || $_POST["vendor"] =="Select"){
        echo "NO ITEMS";
    } else {
        process_prd_brand($_POST["vendor"]);
    }
}
function process_prd_brand($prd_brand){
    $sql = "select * from `product` where prd_brand='".$prd_brand."'";
    invokeRequest($sql);
}
function invokeRequest($sql){
    $db = getDB();
   $page=$db->prepare($sql);
   $page->execute();
   $row_no = 0;
    while ($row = $page->fetchAll(PDO::FETCH_ASSOC)) {
        echo $row[$row_no]['PRD_NAME'];
    $row_no++;
    }
}
?>

