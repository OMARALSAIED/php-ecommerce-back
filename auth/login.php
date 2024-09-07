<?php

include "../connect.php";
include "../function.php";

// جلب البيانات من النموذج (POST)
$email = filterRequest('email');
$password_user = filterRequest($_POST['password_user']);

// إعداد الاستعلام للتحقق من وجود البريد الإلكتروني
$stmt = $con->prepare("SELECT * FROM users WHERE email = ?" );
$stmt->execute(array($email));

// جلب النتائج
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    // استخدام password_verify للتحقق من كلمة المرور
    if (password_verify($password_user, $user['password_user'])) {
        // كلمة المرور صحيحة
        echo json_encode([
            "status" => "success",
            "message" => "Login successful",
            "user_data" => $user  // يمكنك إرجاع بيانات المستخدم حسب الحاجة
        ]);
    } else {
        // كلمة المرور غير صحيحة
        echo json_encode([
            "status" => "failure",
            "message" => "Incorrect password"
        ]);
    }
} else {
    // البريد الإلكتروني غير موجود
    echo json_encode([
        "status" => "failure",
        "message" => "Email not found"
    ]);
}

?>
