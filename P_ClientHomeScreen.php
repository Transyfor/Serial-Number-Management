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

?>

<!DOCTYPE html>
<html>

<head>
    <Link rel="stylesheet" type="text/css" href="/projectstyles.css">
    </rel>
    <title>Client Home Screen</title>
</head>
<header class="heading">
    
    <?php echo 'Hello, ' . $_SESSION['Name'] . '!';
?>
Here are Your Licences
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
                    <th width="150">Serial Number</th>
                    <th width="160">Subscription Date</th>
                    <th width="160">Expiration Date</th>
                    <th width="170">Subscription Fee ($)</th>
                    <th width="170">Redeemed</th>
                    <th width="130">Status</th>
                </tr>
                <tr>
                <?php
                // Loop through the results and populate the table
                while ($row = $result->fetch_assoc()) {
                    // Only display the infor if the current user has the same ID as in the serial number table
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

                    echo "</tr>";
                }
                ?>
                </tr>
                
            </table>
        </div>
        </br></br>
        <div>
            <a href="loginChangeClient.php">
                <button id="move-between-pages-button" type="button">Manage Account</button>
            </a>
            </br></br>

            <a href="license.php">
                <button id="move-between-pages-button" type="button">Redeem Licence</button>
            </a>
            </br>
            <div style="text-align: center;">
                </br>
                    <form action="" method="">
                        <input type="text" placeholder="Renew Serial Number">
                        <input type="button" value="Renew">
                    </form>
                </br></br></br>
            </div>
        </div>
        <script type="text/javascript" src="script.js"></script>

</body>
<footer> &#0169; 2023 SSMS Corporation All Right Reserved </footer>

</html>
?>
