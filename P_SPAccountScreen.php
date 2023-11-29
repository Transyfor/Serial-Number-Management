<?php
session_start();

include("db_conn.php"); // Include the database connection file

// Check if the user is logged in 
if (!isset($_SESSION['Account Type'])) {
    header("Location: index.php");
    exit();
}

// Fetch data from the 'SerialNumbers' table
$query = "SELECT Code, Name, 'Date Of Creation', 'Expiration Date', Price, Redeemed, Paused, 'Attributed UserID, ProviderUserID FROM `Serial Numbers`";
$result = $mysqli->query($query);

if (!$result) {
    die("Error: " . $mysqli->error);
}

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="/projectstyles.css">
    <title>Service Provider Account Screen</title>
</head>

<header class="heading">
    List of Clients
    <?php echo 'Hello, ' . $_SESSION['Name'] . '!'; ?>
</header>

<body class="blueBackground">
    <div class="maindiv">
    <div class="navigation">
            <ul id="horizontalmenu">
                <li id="homepage"><a href="P_SPAccountScreen.php">Home</a></li>
                <li id="settings"><a href="/loginChangeProvider.php">Settings</a></li>
                <li id="logout" style="float:right">
                <a href="logout.php">
                <button>Log out</button>
                </a>
                </li>
            </ul>
        </div>
        <div>
            <table id="SPtHS-table" class="bubbleStyle">
                <tr height="50px">
                    <th>Code</th>
                    <th>Name</th>
                    <th>Date of Creation</th>
                    <th>Expiration Date</th>
                    <th>Price</th>
                    <th>Redeemed</th>
                    <th>Paused</th>
                    <th>Attributed userID</th>
                    <th>ProviderUSERID</th>
                </tr>

                <?php
                // Populate the table with data from the database
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['Code']}</td>";
                    echo "<td>{$row['Name']}</td>";
                    echo "<td>{$row['DateOfCreation']}</td>";
                    echo "<td>{$row['ExpirationDate']}</td>";
                    echo "<td>{$row['Price']}</td>";
                    echo "<td>{$row['Redeemed']}</td>";
                    echo "<td>{$row['Paused']}</td>";
                    echo "<td>{$row['AttributedUserID']}</td>";
                    echo "<td>{$row['ProviderUserID']}</td>";
                    echo "</tr>";
                }
                ?>

            </table>
        </div>
        <!-- ... any code ... -->
    </div>
    <script type="text/javascript" src="script.js"></script>

    <footer> &#0169; 2023 SSMS Corporation All Right Reserved </footer>
</body>

</html>