<?php
$folder = "hackpoint/myprofile/";

// Check if folder exists
if (is_dir($folder)) {
    // Check if writable
    if (is_writable($folder)) {
        echo "<p style='color:green;'>✅ المجلد موجود وقابل للكتابة.</p>";
    } else {
        echo "<p style='color:orange;'>⚠️ المجلد موجود لكن مش قابل للكتابة.</p>";
        echo "<p>جرب تعطيه صلاحيات 777 بالأمر:</p>";
        echo "<code>chmod 777 hackpoint/myprofile</code>";
    }
} else {
    echo "<p style='color:red;'>❌ المجلد غير موجود. أنشئه على المسار: <code>$folder</code></p>";
}
?>
