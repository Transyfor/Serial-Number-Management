<?php
session_start(); //This makes it so that any variables attributed to the current session will still be present on this page.
?>
<!DOCTYPE html>
<html>

<head>
    <Link rel="stylesheet" type="text/css" href="/projectstyles.css">
    </rel>
    <title>Service Provider Account Screen</title>
</head>
<header class="heading">
    List of Clients
    Hello <?php echo "Hello, ". $_SESSION['Name'] . " !" ?>
</header>

<body class="blueBackground">
    <div class="maindiv">
        <div class="navigation">
            <ul id="horizontalmenu">
                <li id="homepage"><a href="P_SPAccountScreen.php">Home</a></li>
                <li id="settings"><a href="/loginChangeProvider.php">Settings</a></li>
                <li id="logout" style="float:right"><button onclick="logout()">Log out</button></li>
            </ul>
        </div>
        <div>
            <table id="SPtHS-table" class="bubbleStyle">
                <tr height="50px">
                    <th width="120">Client</th>
                    <th width="150">Serial Number</th>
                    <th width="120">Status</th>
                    <th width="150">Subscription Date</th>
                    <th width="160">Expiration Date</th>
                    <th width="120">Payment Method</th>
                    <th width="120">Lock/</br>Unlock</th>
                </tr>
                <tr>
                    <td>Client1</td>
                    <td>sw1!859646</td>
                    <td>Active</td>
                    <td>07/10/2022</td>
                    <td>06/11/2023</td>
                    <td>PayPal</td>
                    <td><button class="Renewbtn">Lock</button></td>
                </tr>
                <tr>
                    <td>Client1</td>
                    <td>sw43!908563</td>
                    <td>Active</td>
                    <td>17/02/2022</td>
                    <td>16/02/2024</td>
                    <td>Credit</td>
                    <td><button class="Renewbtn">Lock</button></td>
                </tr>
                <tr>
                    <td>Client2</td>
                    <td>sw2!745118</td>
                    <td>Active</td>
                    <td>02/10/2023</td>
                    <td>01/10/2024</td>
                    <td>Credit</td>
                    <td><button class="Renewbtn">Lock</button></td>
                </tr>
                <tr>
                    <td>Client3</td>
                    <td>sw3!748569</td>
                    <td>Deactive</td>
                    <td>30/01/2022</td>
                    <td>29/01/2023</td>
                    <td>Credit</td>
                    <td><button class="Renewbtn">Unlock</button></td>
                </tr>
                <tr>
                    <td>Client3</td>
                    <td>sw21!7434269</td>
                    <td>Active</td>
                    <td>13/12/2023</td>
                    <td>12/12/2025</td>
                    <td>Credit</td>
                    <td><button class="Renewbtn">Lock</button></td>
                </tr>
                <tr>
                    <td>Client3</td>
                    <td>sw19!679232</td>
                    <td>Active</td>
                    <td>07/05/2022</td>
                    <td>06/05/2023</td>
                    <td>PayPal</td>
                    <td><button class="Renewbtn">Lock</button></td>
                </tr>
                <tr>
                    <td>Client4</td>
                    <td>sw4!78769</td>
                    <td>Deactive</td>
                    <td>06/12/2021</td>
                    <td>05/12/2022</td>
                    <td>Debit</td>
                    <td><button class="Renewbtn">Unlock</button></td>
                </tr>
                <tr>
                    <td>Client5</td>
                    <td>sw5!111562</td>
                    <td>Deactive</td>
                    <td>07/10/2020</td>
                    <td>06/11/2021</td>
                    <td>Credit</td>
                    <td><button class="Renewbtn">Unlock</button></td>
                </tr>
                <tr>
                    <td>Client6</td>
                    <td>sw5!5543672</td>
                    <td>Active</td>
                    <td>30/11/2023</td>
                    <td>29/11/2024</td>
                    <td>Credit</td>
                    <td><button class="Renewbtn">Lock</button></td>
                </tr>
            </table>
        </div>
        <a href="SerialNumberList.php">
            <button id="Serial-Number-list-button" type="button">Serial Numbers List</button>
        </a>

        </br></br></br></br></br></br></br>

        <!--<button id="client-logout-button" onclick="logout()" type="button">Log out</button>-->

        <script type="text/javascript" src="script.js"></script>

</body>
<footer> &#0169; 2023 SSMS Corporation All Right Reserved </footer>

</html>
