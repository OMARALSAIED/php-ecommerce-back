<?php

include "../conect.php";

$email=filterRequest("email");

$password_user= filterRequest("password_user");

$data=array("password_user=>$password_user");

updateData("users",$data,"email='$email'");