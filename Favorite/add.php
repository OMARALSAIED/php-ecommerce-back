<?php

include "../connect.php";
include "../function.php";

$itemID=filterRequest("item_id");
$userID=filterRequest("user_id");
$data=array("user_id"=>$userID,
"item_id"=>$itemID
);

insertData('favorite',$data);

