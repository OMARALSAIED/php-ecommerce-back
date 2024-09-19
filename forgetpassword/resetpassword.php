<?php

include "../connect.php";
include "../function.php";


$email=filterRequest("email");

$password_user = sha1($_POST['password_user']);

$data=array("password_user"=>$password_user);

updateData("users",$data,"email='$email'");