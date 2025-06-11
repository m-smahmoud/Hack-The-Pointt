<?php
// admin.php
session_start();

// محاكاة للجلسة - يمكن تعديل هذا بعد تفعيل الثغرة
// الهاكر قد يعدل الجلسة ليصبح "Admin"
$_SESSION['username'] = 'Admin'; // تلاعب الجلسة هنا

// التحقق فقط إذا كانت الجلسة موجودة، بدون التحقق من الدور
if (isset($_SESSION['username'])) { 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to the Admin Panel</h1>
        <p>You have access to the Admin Panel.</p>
        
        <h3>Admin Operations</h3>
        <button class="btn btn-danger">Delete Data</button>
        <button class="btn btn-warning">Modify Data</button>
        <button class="btn btn-success">Add New Content</button>
    </div>
</body>
</html>

<?php 
} else {
    echo "Access Denied!";
}
?>
