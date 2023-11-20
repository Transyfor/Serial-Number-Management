<!DOCTYPE html>
<html style="height: 94.5%; padding-top: 0%">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="/projectstyles.css" />
        <title>SP Change Login</title>
    </head>

    <header class="heading">Manage Account</header>

    <body style="height: 800px; padding-top: 0%" class="blueBackground">
        <div class="maindiv">
            <div class="navigation">
                <ul id="horizontalmenu">
                    <li id="homepage">
                        <a href="./P_ClientHomeScreen.php">Home</a>
                    </li>
                    <li id="settings">
                        <a class="active" href="./loginChangeClient.php"
                            >Settings</a
                        >
                    </li>
                    <li id="logout" style="float: right">
                        <button onclick="logout()">Log out</button>
                    </li>
                </ul>
            </div>

            <div class="subdiv1">
                <ul class="manageacctmenu">
                    <li>
                        <a
                            class="active"
                            href="./loginChangeClient.php"
                            id="password"
                            >Change Login</a
                        >
                    </li>
                    <li>
                        <a href="./addressChangeClient.php" id="address"
                            >Change Address</a
                        >
                    </li>
                    <li>
                        <a href="./nameChangeClient.php" id="name"
                            >Change Name</a
                        >
                    </li>
                    <li>
                        <a href="./paymentChangeClient.php" id="payment"
                            >Change Payment Method</a
                        >
                    </li>
                    <li>
                        <a href="./deleteAccountClient.php" id="delete"
                            >Delete Account</a
                        >
                    </li>
                </ul>
            </div>

            <div class="bubbleStyle" id="loginproviderdiv">
                <form>
                    <h1 id="logintitle">Change Login</h1>
                    <div style="text-align: center">
                        <button
                            id="emailChange"
                            onclick="location.href = './emailChangeClient.php'"
                            type="button"
                        >
                            Change Email
                        </button>
                    </div>
                    <br />
                    <div style="text-align: center">
                        <button
                            id="passwordChange"
                            onclick="location.href = './passwordChangeClient.php'"
                            type="button"
                        >
                            Change Password
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <script type="text/javascript" src="script.js"></script>
    </body>

    <footer>&#0169; 2023 SSMS Corporation All Right Reserved</footer>
</html>
