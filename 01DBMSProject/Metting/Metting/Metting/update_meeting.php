<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Meeting</title>
    <style>
        body {
            background-color: #c7c5f0;
            font-family: 'Times New Roman', Times, serif;
        }
        h2 {
            color: #643b9f;
            font-family: "Monotype Corsiva";
            font-size: 50px;
            text-align: center;
            margin: 50px 40px;
        }
        form {
            color: #643b9f;
            background-color: white;
            max-width: 500px;
            margin: auto;
            padding: 50px 50px;
            border: 3px solid #643b9f;
            border-radius: 5px;
        }
        label {
            font-size: 20px;
            display: block;
            margin-bottom: 5px;
        }
        input[type="date"],
        input[type="time"],
        input[type="text"],
        input[type="text"],
        textarea {
            font-size: 20px;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #643b9f;
            border-radius: 3px;
        }
        input[type="submit"] {
            background-color: #643b9f;
            color: #fff;
            float: right;
            font-size: 16px;
            padding: 10px 20px;
            border: none;
            border-radius: 3px #643b9f;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #643b9f;
        }
    </style>
</head>
<body>
    <h2>Update Meeting</h2>
    <?php
    // Database connection parameters
    $host = "localhost";
    $username = "root";
    $password = ""; // Assuming no password is set
    $database = "meeting";

    // Create connection
    $mysqli = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Check if meeting ID is provided in the POST parameters
    if(isset($_POST['update_id'])) {
        // Retrieve the value of the 'update_id' parameter
        $update_id = $_POST['update_id'];

        // Fetch meeting details from the database
        $sql = "SELECT * FROM schedule WHERE id='$update_id'";
        $result = $mysqli->query($sql);

        // Check if there are rows returned from the database query
        if ($result->num_rows > 0) {
            // Fetch the first row
            $row = $result->fetch_assoc();

            // Display meeting details
            echo "<form action='update_meeting_table.php' method='post'>";
            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
            echo "<label for='title'>Title:</label><br>";
            echo "<input type='text' id='title' name='title' value='" . $row['title'] . "'><br>";
            echo "<label for='date'>Date:</label><br>";
            echo "<input type='date' id='date' name='date' value='" . $row['date1'] . "'><br>";
            echo "<label for='time'>Time:</label><br>";
            echo "<input type='time' id='time' name='time' value='" . $row['time1'] . "'><br>";
            echo "<label for='location'>Location:</label><br>";
            echo "<input type='text' id='location' name='location' value='" . $row['location'] . "'><br>";
            echo "<label for='agenda'>Agenda:</label><br>";
            echo "<textarea id='agenda' name='agenda'>" . $row['agenda'] . "</textarea><br>";
            echo "<label for='status'>Status:</label><br>";
            echo "<input type='text' id='status' name='status' value='" . $row['Status'] . "'><br><br>";
            echo "<input type='submit' value='Update'>";
            echo "</form>";
        } else {
            echo "No meeting found with ID: $update_id";
        }
    } else {
        echo "Meeting ID not provided.";
    }

    // Close database connection
    $mysqli->close();
    ?>
</body>
</html>
