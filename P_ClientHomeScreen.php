<?php
 session_start(); //This makes it so that I can attribute variables to the current user

 //If a user gets here and doesn't already have an account, we need to redirect them out
if(!isset($_SESSION['Account Type'])){
    header("Location: index.php");
    exit();
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
                    <th width="150">Software</th>
                    <th width="150">Serial Number</th>
                    <th width="160">Subscription Date</th>
                    <th width="160">Expiration Date</th>
                    <th width="170">Subscription Fee ($)</th>
                    <th width="130">Status</th>
                    <!-- <th width="120">Renew/</br>Cancel</th> -->
                </tr>
                <tr>
                    <td>Software1</td>
                    <td>sw1!859646</td>
                    <td>07/10/2022</td>
                    <td>06/11/2023</td>
                    <td>19.99</td>
                    <td>Active</td>
                    <!-- <td><button class="Renewbtn">Cancel</button></td> -->
                </tr>
                <tr>
                    <td>Software2</td>
                    <td>sw2!745118</td>
                    <td>17/02/2022</td>
                    <td>16/02/2024</td>
                    <td>189.99</td>
                    <td>Active</td>
                    <!-- <td><button class="Renewbtn">Cancel</button></td> -->
                </tr>
                <tr>
                    <td>Software3</td>
                    <td>sw3!748569</td>
                    <td>02/10/2023</td>
                    <td>01/10/2024</td>
                    <td>49.99</td>
                    <td>Active</td>
                    <!-- <td><button class="Renewbtn">Cancel</button></td> -->
                </tr>
                <tr>
                    <td>Software4</td>
                    <td>sw4!78769</td>
                    <td>30/11/2023</td>
                    <td>29/11/2024</td>
                    <td>79.99</td>
                    <td>Expired</td>
                    <!-- <td><button class="Renewbtn">Renew</button></td> -->
                </tr>
                <tr>
                    <td>Software5</td>
                    <td>sw5!111562</td>
                    <td>13/12/2023</td>
                    <td>12/12/2025</td>
                    <td>99.99</td>
                    <td>Active</td>
                    <!-- <td><button class="Renewbtn">Cancel</button></td> -->
                </tr>
                <tr>
                    <td>Software6</td>
                    <td>sw5!5543672</td>
                    <td>06/12/2021</td>
                    <td>05/12/2022</td>
                    <td>69.99</td>
                    <td>Expired</td>
                    <!-- <td><button class="Renewbtn">Renew</button></td> -->
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
