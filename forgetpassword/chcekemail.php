<?php

include "../connect.php";
include "../function.php";


$email = filterRequest('email');

$verifiyCode = rand(10000, 99999);


$stmt=$con->prepare("SELECT * FROM users WHERE email=?");
$stmt->execute(array($email));
$count=$stmt->rowCount();
result($count);


if($count>0)
{
    $data=array("verifiyCode"=>$verifiyCode);
    updateData("users",$data,"email='$email'",false);
    sendEmail($email, "Verify Code Ecommerce", "Verify Code $verifiyCode");
}

