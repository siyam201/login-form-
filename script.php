<?php
// PHP কোড উদাহরণ: স্বয়ংক্রিয় পোস্ট প্রকাশ
$title = "Auto Published Post Title";
$content = "এটি স্বয়ংক্রিয়ভাবে প্রকাশিত পোস্টের কন্টেন্ট।";
$publish_time = date('Y-m-d H:i:s', strtotime('+1 second')); // 1 সেকেন্ড পর প্রকাশ

$targetDir = "uploads/"; // আপলোড ডিরেক্টরি

// ডাটাবেস কানেকশন
$conn = new mysqli('fdb30.awardspace.net', '4577600_login', '2@4sun8QV@h3gH4 ', '4577600_login');

// কানেকশন চেক
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// পোস্ট ডাটাবেসে যোগ করা
$sql = "INSERT INTO posts (title, content, publish_time) VALUES ('$title', '$content', '$publish_time')";
if ($conn->query($sql) === TRUE) {
   
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
