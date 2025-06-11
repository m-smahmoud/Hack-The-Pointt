<?php
session_start();
unset($_SESSION['solved']);  // امسح كل الثغرات المحلولة
header("Location: index.php"); // رجوع للرئيسية
exit();
?>
