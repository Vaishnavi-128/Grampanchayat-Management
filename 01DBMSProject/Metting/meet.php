<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "meeting";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
$title= $_POST['title'];
$date = $_POST['date'];
$time = $_POST['time'];
$location=$_POST['location'];
$agenda = $_POST['agenda'];

    // Insert meeting into database
    $sql = "INSERT INTO schedule (title,date1,time1,location,agenda) VALUES ('$title', '$date','$time','$location','$agenda')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index2.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


$conn->close();
?>
