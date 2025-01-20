<?php
// টার্গেট ডিরেক্টরি
@include 'script.php';
$targetDir = "uploads/";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ডিরেক্টরি তৈরি
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    // ফাইল এবং নাম চেক করুন
    if (isset($_POST['video_name']) && isset($_FILES['video'])) {
        $videoName = trim($_POST['video_name']);
        $videoFile = $_FILES['video'];

        // ফাইল সাইজ চেক (200MB এর পরিবর্তে 2GB পর্যন্ত)
        if ($videoFile['size'] > 2 * 1024 * 1024 * 1024) { // 2GB এর সীমা
            echo "ভিডিওটি খুব বড়। সর্বোচ্চ অনুমোদিত আকার 2GB।";
            exit;
        }

        // ফাইল চেক
        if ($videoFile['error'] === 0) {
            $fileName = basename($videoFile['name']);
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $allowedExtensions = ['mp4', 'avi', 'mov', 'mkv'];

            if (in_array($fileExtension, $allowedExtensions)) {
                $newFileName = $videoName . '.' . $fileExtension;
                $targetFilePath = $targetDir . $newFileName;

                // ফাইল আপলোড
                if (move_uploaded_file($videoFile['tmp_name'], $targetFilePath)) {
                    echo "ভিডিওটি সফলভাবে আপলোড হয়েছে: " . htmlspecialchars($newFileName);
                } else {
                    echo "ফাইল আপলোড ব্যর্থ হয়েছে।";
                }
            } else {
                echo "এই ফাইল ফরম্যাট অনুমোদিত নয়।";
            }
        } else {
            echo "ফাইল আপলোডের সময় একটি সমস্যা হয়েছে।";
        }
    } else {
        echo "ভিডিওর নাম বা ফাইল সঠিকভাবে প্রদান করা হয়নি।";
    }
} else {
    echo "অনুগ্রহ করে ফর্মটি পূরণ করুন।";
}
?>
