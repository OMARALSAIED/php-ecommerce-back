<?php

include "../connect.php";
include "../function.php";

$username = filterRequest('username');
$password_user = sha1($_POST['password_user']);
$email = filterRequest('email');
$phone = filterRequest('phone');
$verifiyCode = rand(10000, 99999);

// تشفير كلمة المرور باستخدام PASSWORD_DEFAULT
$stmt = $con->prepare("SELECT * FROM users WHERE email = ? OR phone = ?");

$stmt->execute(array($email, $phone));

$count = $stmt->rowCount();

if ($count > 0) {
    printFailuure("phone or email already used");
} else {
    $data = array(
        "username" => "$username",
        "password_user" => "$password_user",
        "email" => "$email",
        "phone" => "$phone",
        "verifiyCode" => "$verifiyCode"
    );
    

    // إرسال البريد الإلكتروني
    sendEmail($email, "Verify Code Ecommerce", "Verify Code $verifiyCode");

    // إدخال البيانات في قاعدة البيانات
    insertData("users", $data);
}
?>
