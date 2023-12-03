<?php
    session_start(); //This makes it so that I can attribute variables to the current user

    //If a user gets here and doesn't already have an account, we need to redirect them out
    if(!isset($_SESSION['Account Type'])){
        header("Location: index.php");
        exit();
    }
    
    //Next we need a variable that holds the info on how to connect to our database. I made a file for this already db_conn.php. This just accesses that and connectes to our database.
    $mysqli = require __DIR__ . "/db_conn.php"; // This is a connection object
    
    // Gets the provider's user ID
    $userID = $_SESSION['userID'];
    
    // Gets the Code and Redeemed columns from table to display based on the provider's user ID
    $providerSerialNumbersQuery = "SELECT `Code`, `Redeemed` FROM `Serial Numbers` WHERE `ProviderUSERID` = ?";
    if ($stmt = $mysqli->prepare($providerSerialNumbersQuery)) {
        $stmt->bind_param("s", $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $serialNumbers = [];
        $index = 0;
        
        // Loops through each row from $result from query
        while ($row = $result->fetch_assoc()) {
            // Adds it to the $serialNumbers array
            $serialNumbers[$index] = $row;
            $index++;
        }
        $stmt->close();
    }
    
    $mysqli->close();
?>

<!DOCTYPE html>
<html>

<head>
    <Link rel="stylesheet" type="text/css" href="projectstyles.css">
    </rel>
    <title>Service Provider Account Screen</title>
</head>
<header class="heading">
    Serial Numbers List
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
            <table id="SerialNumber-table" class="bubbleStyle">
                <!--<tr id="SNTable" height="50px">
                    <td rowspan = "2"> </td>
                    <th colspan = "3">Serial Numbers List</th>
                </tr>-->
                <tr height="50px">
                    <th width="50">No.</th>
                    <th width="150">Serial Number</th>
                    <th width="150">Redeemed</th>
                </tr>
                <?php
                // In order to list the SNs on the table from 1 to whoever many there are
                $counter = 1;
                // Iterates through $serialNumbers array
                foreach ($serialNumbers as $sn) {
                    echo "<tr>";
                    echo "<td>" . $counter . "</td>";
                    echo "<td>" . $sn['Code'] . "</td>";
                    echo "<td>" . ($sn['Redeemed'] ? "Yes" : "No") . "</td>";
                    echo "</tr>";
                    $counter++;
                }
                ?>
            </table>
        </div>
        </br></br>
        <div style="">
            <form name="rn" action="serialNumbersHandler.php" method="post">
                <input type="button" id="new-Serial-Number-button" name="SN" value="Generate a New Serial Number"
                    onclick="RandomSN();" />
                </br></br>
                <div class="inputContainer">
                    <form action="" method="POST">
                        <input id="submit-box" name="SerialNum" type="text" class="th" placeholder="Serial Number"/>
                        <input id="submit-box" name="price" type="text" class="th" placeholder="Software Price"/>
                        <input id="submit-box" name="Name" type="text" class="th" placeholder="Software Name"/>
                        </br>
                        <input id="submitSN" type="submit" value="Add New Software" />
                    </form>
                </div>
                </br></br></br></br>
            </form>
        </div>
        </br></br></br></br>
        <!--<a href="index.html">-->
        <!--<button id="client-logout-button" onclick="logout()" type="button">Log out</button>-->
        <!--</a>-->

        <script type="text/javascript" src="script.js"></script>

        <!-- function RandomSN() {
            var rnd = Math.floor(Math.random() * 1000000000);
            document.getElementById('tb').value = rnd;
        }

        /*function logoutFunction() {
        confirm("Are you sure you want to log out!");
        }*/

        function logout(){
        var reallyLogout=confirm("Do you really want to log out?");
        if(reallyLogout){
            location.href="index.html";
        }
        }
        var answer = document.getElementById("logout");
        if (answer.addEventListener) {
            answer.addEventListener("click", logoutfunction, false);
            } else {
                answer.attachEvent('onclick', logoutfunction);
            }  -->

</body>
<footer> &#0169; 2023 SSMS Corporation All Right Reserved </footer>

</html>
