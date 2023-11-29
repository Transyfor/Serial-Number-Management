<?php
session_start();

include("db_conn.php"); // Include the database connection file

// Check if the user is logged in 
if (!isset($_SESSION['Account Type'])) {
    header("Location: index.php");
    exit();
}

// Fetch data from the 'SerialNumbers' table
$query = "SELECT Code, Name, DateOfCreation, ExpirationDate, Price, Redeemed, Paused, AttributedUserID, ProviderUserID FROM SerialNumbers";
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
        <!-- ... other codes ... -->
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
        <!-- ... any other code ... -->
    </div>

    <footer> &#0169; 2023 SSMS Corporation All Right Reserved </footer>
</body>

</html>