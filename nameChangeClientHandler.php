<?php

session_start(); // Start the session if not started already

if(empty($_POST["newname"])) {
    // saying to print in the .php or the .html file what follows. If it's script, it'll excecute it.
    echo '<script>alert("Must provide new name"); window.location.href="/nameChangeClient.php";</script>';
    //Need to do exit(), as otherwise the php code will keep running even if the user goes to another page.
    exit();
}

//Next we need a variable that holds the info on how to connect to our database. I made a file for this already db_conn.php. This just accesses that and connectes to our database.
$mysqli = require __DIR__ . "/db_conn.php"; // This is a connection object

$newname = $_POST['newname'];
$userID = $_SESSION['userID'];

// Use backticks for table and column names, and use prepared statements to prevent SQL injection
$sql = "UPDATE `Users` SET `Name` = ? WHERE `userID` = ?";
if ($stmt = $mysqli->prepare($sql)) {
    $stmt->bind_param("si", $newname, $userID);
    if ($stmt->execute()) {
        // Update session address if the query executed successfully
        $_SESSION['Name'] = $newname;
        
        $successMessage = "Record updated successfully";
        header("Location: /nameChangeClient.php?success=" . urlencode($successMessage));
        exit();
    } else {
        $errorMessage = "Error updating record: " . $mysqli->error;
        header("Location: /nameChangeClient.php?error=" . urlencode($errorMessage));
        exit();
    }
    $stmt->close();
} else {
    echo "Error in the prepared statement: " . $mysqli->error;
}

$mysqli->close();

?>
