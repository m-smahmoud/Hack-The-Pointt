<?php
if (isset($_SERVER["HTTP_ORIGIN"])) {
    header("Access-Control-Allow-Origin: " . $_SERVER["HTTP_ORIGIN"]);
    header("Access-Control-Allow-Credentials: true");
}
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

if ($_SERVER["REQUEST_METHOD"] == "OPTIONS") {
    http_response_code(204); // No Content for preflight
    exit();
}

header("Content-Type: application/json");

$data = array(
    "message" => "مرحبًا بك! تم تنفيذ الطلب.",
    "user_id" => 123,
    "user_email" => "sensitive-data@example.com"
);

echo json_encode($data);
?>
