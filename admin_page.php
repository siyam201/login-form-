<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>
   <link rel="icon" href="back.jpg"><!-- custom css file link  -->
   <link rel="stylesheet" href="ad.css">

</head>
<body>
<header>
<nav>
            <h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span>
             <span>admin </span></h1> 
            <ul>

                <li><button id="b"><a href="logout.php" class="b">logout</a> </button></li>
                
        </ul></nav>


</header>

    
   <p id="file">File sige 35mb</p>
<form action="video.php" method="POST" enctype="multipart/form-data">
    <label for="video_name">ভিডিওর নাম:</label>
    <input type="text" name="video_name" id="video_name" placeholder="ভিডিওর নাম লিখুন" required>
    <br><br>
    <label for="video">ভিডিও ফাইল:</label>
    <input type="file" name="video" id="video" accept="video/*" multiple required>
    <br><br>
    
    <input type="submit" value="ভিডিও আপলোড করুন" name="submit">
</form>

  



</body>
</html> 
  
