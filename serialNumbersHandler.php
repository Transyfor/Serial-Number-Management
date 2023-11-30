<?php

session_start(); // Start the session if not started already

if(empty($_POST["SerialNum"])) {
    // saying to print in the .php or the .html file what follows. If it's script, it'll excecute it.
    echo '<script>alert("Must provide a serial number"); window.location.href="/SerialNumberList.php";</script>';
    //Need to do exit(), as otherwise the php code will keep running even if the user goes to another page.
    exit();
}

if(empty($_POST["price"])) {
    // saying to print in the .php or the .html file what follows. If it's script, it'll excecute it.
    echo '<script>alert("Must provide a price"); window.location.href="/SerialNumberList.php";</script>';
    //Need to do exit(), as otherwise the php code will keep running even if the user goes to another page.
    exit();
}

if(empty($_POST["Name"])) {
    // saying to print in the .php or the .html file what follows. If it's script, it'll excecute it.
    echo '<script>alert("Must provide a name"); window.location.href="/SerialNumberList.php";</script>';
    //Need to do exit(), as otherwise the php code will keep running even if the user goes to another page.
    exit();
}

//Next we need a variable that holds the info on how to connect to our database. I made a file for this already db_conn.php. This just accesses that and connectes to our database.
$mysqli = require __DIR__ . "/db_conn.php"; // This is a connection object

$serialNumber = $_POST['SerialNum'];
$price = $_POST['price'];
$name = $_POST['Name'];
$userID = $_SESSION['userID'];

// Check if the serial number already exists in the database
$checkSerialQuery = "SELECT * FROM `Serial Numbers` WHERE `Code` = ?";
$stmt = $mysqli->prepare($checkSerialQuery);
$stmt->bind_param("s", $serialNumber);
$stmt->execute();
$result = $stmt->get_result();

// If the serial number exists, alert the user and redirect
if ($result->num_rows > 0) {
    echo '<script>alert("Serial number already exists. Please enter a different serial number."); window.location.href="/SerialNumberList.php";</script>';
    exit();
} else {
    // Serial number is unique, insert it into the table
    $insertQuery = "INSERT INTO `Serial Numbers` (`Code`, `Price`, `Name`, `ProviderUSERID`) VALUES (?, ?, ?, ?)";
    $insertStmt = $mysqli->prepare($insertQuery);
    $insertStmt->bind_param("sssi", $serialNumber, $price, $name, $userID);
    $insertStmt->execute();

    // Redirect back to the page
    header("Location: /SerialNumberList.php");
    exit();
}

$stmt->close();
$mysqli->close();
?>
