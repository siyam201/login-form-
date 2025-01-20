<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Report Submission Form</title>
  <link rel="icon" href="back.jpg">
  <link rel="stylesheet" href="report.css">
 
</head>
<body>
  <h2>Report Submission Form</h2>
  <form action="redata.php" method="post">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" required><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="report">Report:</label><br>
    <textarea id="report" name="report" rows="20" cols="50" required></textarea><br><br>

    <button type="submit">Submit</button>
  </form>
</body>
</html>
