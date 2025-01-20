<?php
// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$report = $_POST['report'];

// Check if all required fields are filled
if (!empty($name) && !empty($email) && !empty($report)) {
    // Database credentials
    $servername = 'fdb30.awardspace.net';
    $username = '4577600_login';
    $password = '2@4sun8QV@h3gH4';
    $database = '4577600_login';    
    // Create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        // Check if email already exists
        $SELECT = "SELECT email FROM report WHERE email = ? LIMIT 1";
        $INSERT = "INSERT INTO report (name, email, report) VALUES (?, ?, ?)";

        // Prepare SELECT statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if ($rnum == 0) {
            $stmt->close();

            // Prepare INSERT statement
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sss", $name, $email, $report);
            $stmt->execute();
            echo "Report submitted successfully";
        } else {
            echo "Email already exists. Report not submitted.";
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    }
} else {
    echo "All fields are required";
    die();
}
?>
