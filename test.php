<?php


include './connect.php';
include './function.php';


$table="users";

$data=array(
    "username"=>"omar",
    "email"=>"wwomar@gmail.com",
    "phone"=>"324234r",
    "verifiyCode"=>"2433", 
);

$count=insertData($table,$data);