<?php
 session_start(); //This makes it so that I can attribute variables to the current user

 include("db_conn.php"); // Include the database connection file


 //If a user gets here and doesn't already have an account, we need to redirect them out
if(!isset($_SESSION['Account Type'])){
    header("Location: index.php");
    exit();
}

// Fetch serial numbers from the database
$query = "SELECT `Code`, `Name`, `Date of Creation` AS DateOfCreation, `Expiration Date` AS ExpirationDate, `Price`, `Redeemed`, `Paused`, `Attributed userID` AS AttributedUserID, `ProviderUSERID` FROM `Serial Numbers`";
$result = $mysqli->query($query);


// Check if the query was successful
if (!$result) {
    die("Error in query: " . $mysqli->error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["renewSerial"])) {
    $serialToRenew = $_POST["renewSerial"];

    if (empty($serialToRenew)) {
        $message = "Please enter a serial number to renew!";
    } else {
        $serialToRenew = $mysqli->real_escape_string($serialToRenew);
        $checkQuery = "SELECT * FROM `Serial Numbers` WHERE `Code` = '$serialToRenew'";
        $checkResult = $mysqli->query($checkQuery);

        if ($checkResult->num_rows == 0) {
            $message = "Please provide a valid Serial Number!";
        } else {
            $updateQuery = "UPDATE `Serial Numbers` SET `Expiration Date` = DATE_ADD(`Expiration Date`, INTERVAL 1 YEAR) WHERE `Code` = '$serialToRenew'";
            $updateResult = $mysqli->query($updateQuery);

            if ($updateResult) {
                // Set a session variable for the success message because it needs to redirect then
                $_SESSION['successMessage'] = "Serial number renewed successfully.";
                // Redirect to the same page
                header("Location: P_SPAccountScreen.php");
                exit();
            } else {
                $message = "Error renewing serial number.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <Link rel="stylesheet" type="text/css" href="/projectstyles.css">
    </rel>
    <title>Client Home Screen</title>
</head>
<header class="heading">
    
    <?php echo 'Hello, ' . $_SESSION['Name'] . '! ';
?>
</br>
Here is the list of your Licences!
</header>

<body class="blueBackground">
    <div class="maindiv">
        <div class="navigation">
            <ul id="horizontalmenu">
                <li id="homepage"><a class="active" href="P_ClientHomeScreen.php">Home</a></li>
                <li id="settings"><a href="loginChangeClient.php">Settings</a></li>
                <li id="logout" style="float:right">
                <a href="logout.php">
                <button>Log out</button>
                </a>
                </li>
            </ul>
        </div>
        <div>
            <table id="clientHS-table" class="bubbleStyle">
                <tr height="50px">
                    <th width="150">Product</th>
                    <th width="180">Serial Number</th>
                    <th width="180">Subscription Date</th>
                    <th width="180">Expiration Date</th>
                    <th width="180">Subscription Fee ($)</th>
                    <th width="170">Redeemed</th>
                    <th width="130">Status</th>
                    <th width="150">Provider</th> <!--try-->
                </tr>
                <tr>
                <?php
                // Loop through the results and populate the table
                while ($row = $result->fetch_assoc()) {
                    // Only display the info for the user with the same ID as in the serial number table
                    if ($_SESSION['userID'] != $row['AttributedUserID']) {
                        continue;
                    }

                    echo "<tr>";
                    echo "<td>" . $row['Name'] . "</td>";
                    echo "<td>" . $row['Code'] . "</td>";
                    echo "<td>" . $row['DateOfCreation'] . "</td>";
                    echo "<td>" . $row['ExpirationDate'] . "</td>";
                    echo "<td>" . $row['Price'] . "</td>";                 
                    // Check Paused and Redeemed values and display accordingly
                    echo "<td>" . ($row['Redeemed'] == 0 ? 'Not Redeemed Yet' : 'Yes') . "</td>";
                    echo "<td>" . ($row['Paused'] == 0 ? 'Active' : 'Paused') . "</td>";
                    $mysqli = require __DIR__ ."/db_conn.php"; //This is a connection object
                    $currentID= $row['AttributedUserID']; //I store the userID on this row in a variable
                    $sql="SELECT * FROM Users WHERE userID='$currentID'"; //I search the Users table for the User with this ID
                    $res=mysqli_query($mysqli,$sql); //I send this query to mySQL
                    $UsersRow = mysqli_fetch_assoc($res); //I transform their reply into an array
                    echo "<td>{$UsersRow['Name']}</td>"; //I display the 'Name' variable on the row they gave me
                    echo "</tr>";
                }
                ?>
                </tr>
                
            </table>
        </div>
        </br></br>
        <div>
            <!--<a href="loginChangeClient.php">
                <button id="move-between-pages-button" type="button">Manage Account</button>
            </a>-->
            </br></br>

            <a href="license.php">
                <button id="move-between-pages-button" type="button">Redeem Licence</button>
            </a>
            </br>
            <div style="text-align: center;">
                <br>
                <!-- Form for renewing serial numbers -->
                <form action="" method="POST">
                    <input type="text" name="renewSerial" placeholder="Renew Serial Number">
                    <input type="submit" value="Renew">
                </form>
                <!-- Display error message -->
                <p id="error-message"><?php echo isset($message) ? $message : ""; ?></p>
                <!-- Display success message -->
                <p id="success-message"><?php echo isset($_SESSION['successMessage']) ? $_SESSION['successMessage'] : ""; ?></p>

                <?php unset($_SESSION['successMessage']); ?> <!--to unset the success message we added to session, so it does not go to other pages-->
                <br><br><br>
            </div>
        </div>
        <script type="text/javascript" src="script.js"></script>

</body>
<footer> &#0169; 2023 SSMS Corporation All Right Reserved </footer>

</html>
?>
