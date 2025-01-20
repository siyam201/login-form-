<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>


<?php
// ভিডিও ফাইলগুলির ডিরেক্টরি

$dir = 'uploads/';

// ভিডিও ফাইল ফরম্যাটের একটি তালিকা (যেমন .mp4, .avi, .mov)
$allowedTypes = ['mp4', 'avi', 'mov'];

// ডিরেক্টরির মধ্যে ফাইলগুলো স্ক্যান করা
$files = scandir($dir);

// ভিডিও ফাইলগুলির তালিকা তৈরি করা
$videoFiles = [];
foreach ($files as $file) {
    $fileExtension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    if (in_array($fileExtension, $allowedTypes)) {
        $videoFiles[] = $file;
    }
}

// ভিডিও ফাইলগুলির তালিকা রিটার্ন
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user page</title>
   <link rel="icon" href="back.jpg">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="ad.css">

</head>
<body>
<header>
      
        <nav>
            <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span>
              <span></span></h1> 
            <ul>
                <li><button id="b"><a href="logout.php" class="b">logout</a> </button></li>
                <li> you have a problem <button id="report"><a  href="report.php">report</a></li>
                
            </ul>
        </nav>
    </header>

    
    
    

<?php
// ভিডিও ফাইলগুলির তালিকা থেকে ভিডিওগুলো প্লে করা
if (count($videoFiles) > 0) {
    foreach ($videoFiles as $video) {
        echo "<div style='margin-bottom: 20px;'>";
        echo "<h3>" . htmlspecialchars($video) . "</h3>";
        echo "<video width='600' controls>
                <source src='uploads/$video' type='video/mp4'>
                Your browser does not support the video tag.
              </video>";
        echo "</div>";
    }
} 
?>
    

</body>
</html>