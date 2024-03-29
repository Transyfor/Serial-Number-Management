<?php

session_start(); // Start the session if not started already

if(empty($_POST["codeinput"])) {
    // saying to print in the .php or the .html file what follows. If it's script, it'll excecute it.
    echo '<script>alert("Must provide a serial number"); window.location.href="/license.php";</script>';
    //Need to do exit(), as otherwise the php code will keep running even if the user goes to another page.
    exit();
}

//Next we need a variable that holds the info on how to connect to our database. I made a file for this already db_conn.php. This just accesses that and connectes to our database.
$mysqli = require __DIR__ . "/db_conn.php"; // This is a connection object

$license = $_POST['codeinput'];
$userID = $_SESSION['userID'];

// Check if the serial number exists and the 'Attributed userID' is null
$sql = "SELECT * FROM `Serial Numbers` WHERE `Code` = ? AND `Attributed userID` = 0";
if ($stmt = $mysqli->prepare($sql)) {
    $stmt->bind_param("s", $license);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $updateSql = "UPDATE `Serial Numbers` SET `Attributed userID` = ? WHERE `Code` = ?";
        if ($updateStmt = $mysqli->prepare($updateSql)) {
            $updateStmt->bind_param("ss", $userID, $license);
            if ($updateStmt->execute()) {
                // Update the session variable after successful update
                $_SESSION['Attributed userID'] = $userID;
                // Update 'Redeemed' column to 1
                $updateRedeemedSql = "UPDATE `Serial Numbers` SET `Redeemed` = 1 WHERE `Code` = ?";
                $updateRedeemedStmt = $mysqli->prepare($updateRedeemedSql);
                $updateRedeemedStmt->bind_param("s", $license);
                if ($updateRedeemedStmt->execute()) {
                    // Update 'Expiration Date' column to 1 year after the current date
                    $updateExpirationSql = "UPDATE `Serial Numbers` SET `Expiration Date` = DATE_ADD(CURDATE(), INTERVAL 1 YEAR) WHERE `Code` = ?";
                    $updateExpirationStmt = $mysqli->prepare($updateExpirationSql);
                    $updateExpirationStmt->bind_param("s", $license);
                    if ($updateExpirationStmt->execute()) {
                        // Successful update of 'Expiration Date'
                        echo '<script>alert("Attributed userID, Redeemed, and Expiration Date updated successfully for Serial Number: ' . $license . '"); window.location.href="/license.php";</script>';
                    } else {
                        // Handle 'Expiration Date' update failure
                        echo '<script>alert("Error updating \'Expiration Date\': ' . $mysqli->error . '"); window.location.href="/license.php";</script>';
                    }
                    $updateExpirationStmt->close();
                } else {
                    // Handle 'Redeemed' update failure
                    echo '<script>alert("Error updating \'Redeemed\': ' . $mysqli->error . '"); window.location.href="/license.php";</script>';
                }
                $updateRedeemedStmt->close();
            } else {
                // Handle update failure
                echo '<script>alert("Error updating \'Attributed userID\': ' . $mysqli->error . '"); window.location.href="/license.php";</script>';
            }
            $updateStmt->close();
        } else {
            // Handle update statement preparation error
            echo '<script>alert("Error in the update prepared statement: ' . $mysqli->error . '"); window.location.href="/license.php";</script>';
        }
    } else {
        // Alert if serial number not found or already attributed
        echo '<script>alert("Serial number not found or already attributed."); window.location.href="/license.php";</script>';
    }

    $stmt->close();
} else {
    // Handle main query preparation error
    echo '<script>alert("Error in the prepared statement: ' . $mysqli->error . '"); window.location.href="/license.php";</script>';
}

$mysqli->close();
?>
