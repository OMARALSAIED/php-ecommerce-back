<?php

include "./connect.php";
include "./function.php";

$alldata=array();
$alldata["status"]='success';


$catgeorie=getAllData('categoies',null,null,false);

$alldata['categoies']=$catgeorie;


$items=getAllData('itemsviews1',null,null,false);

$alldata['items']=$items;



echo json_encode($alldata);


?>