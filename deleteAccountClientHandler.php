<?php

session_start(); // Start the session if not started already

//Checks to make sure that the user inputs aren't empty
if(empty($_POST["currentpassword"])) {
    // saying to print in the .php or the .html file what follows. If it's script, it'll excecute it.
    echo '<script>alert("Must provide current password"); window.location.href="/deleteAccountClient.php";</script>';
    //Need to do exit(), as otherwise the php code will keep running even if the user goes to another page.
    exit();
}


//Next we need a variable that holds the info on how to connect to our database. I made a file for this already db_conn.php. This just accesses that and connectes to our database.
$mysqli = require __DIR__ . "/db_conn.php"; // This is a connection object

$password = $_POST['currentpassword'];
$userID = $_SESSION['userID'];

if($password == $_SESSION['Password']) {
    // Use backticks for table and column names, and use prepared statements to prevent SQL injection
    $sql = "UPDATE `Users` SET `Password` = ? WHERE `userID` = ?";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("si", $newpassword, $userID);
        if ($stmt->execute()) {
            // Update session address if the query executed successfully
            $_SESSION['Password'] = $newpassword;
            
            $successMessage = "Record updated successfully";
            header("Location: /passwordChangeClient.php?success=" . urlencode($successMessage));
            exit();
        } else {
            $errorMessage = "Error updating record: " . $mysqli->error;
            header("Location: /passwordChangeClient.php?error=" . urlencode($errorMessage));
            exit();
        }
        $stmt->close();
    } else {
        echo "Error in the prepared statement: " . $mysqli->error;
    }

    $mysqli->close();
}

else {
    echo '<script>alert("Incorect Old Password"); window.location.href="/AccountDeleteClient.php";</script>';
    exit();
}

?>
