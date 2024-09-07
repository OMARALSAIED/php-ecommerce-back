<?php

include "../connect.php";
include "../function.php";



$email=filterRequest("email");

$verifiy=filterRequest("verifiy");


$stmt =$con->prepare("SELECT * FROM users WHERE email='$email' AND verifiyCode='$verifiy'");


$stmt->execute();

$count=$stmt->rowCount();

result($count);






?>