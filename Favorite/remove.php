<?php

include "../connect.php";
include "../function.php";

$itemID=filterRequest("item_id");
$userID=filterRequest("user_id");


deleteData("favorite","user_id=$userID AND item_id=$itemID");
