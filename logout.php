<?php
session_start();
session_unset(); // يمسح كل بيانات الجلسة
session_destroy(); // يدمر الجلسة نفسها
header("Location: login.php"); // يرجعك لصفحة تسجيل الدخول
exit();
?>
