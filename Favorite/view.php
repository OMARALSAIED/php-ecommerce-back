<?php

include "../connect.php";
include "../function.php";

$id=filterRequest("id");

getAlldata("myFavorite","user_id=?  ",array($id));