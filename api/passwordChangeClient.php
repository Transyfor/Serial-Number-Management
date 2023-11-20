<!DOCTYPE html>
<html style="height: 94.5%; padding-top: 0%">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="/projectstyles.css" />
        <title>SP Change Password</title>
    </head>

    <header class="heading">Manage Account</header>

    <body style="height: 800px; padding-top: 0%" class="blueBackground">
        <div class="maindiv">
            <div class="navigation">
                <ul id="horizontalmenu">
                    <li id="homepage">
                        <a href="P_ClientHomeScreen.php">Home</a>
                    </li>
                    <li id="settings">
                        <a class="active" href="loginChangeClient.php"
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
                            href="loginChangeClient.php"
                            id="password"
                            >Change Login</a
                        >
                    </li>
                    <li>
                        <a href="addressChangeClient.php" id="address"
                            >Change Address</a
                        >
                    </li>
                    <li>
                        <a href="nameChangeClient.php" id="name"
                            >Change Name</a
                        >
                    </li>
                    <li>
                        <a href="paymentChangeClient.php" id="payment"
                            >Change Payment Method</a
                        >
                    </li>
                    <li>
                        <a href="deleteAccountClient.php" id="delete"
                            >Delete Account</a
                        >
                    </li>
                </ul>
            </div>

            <div class="bubbleStyle" id="psswproviderdiv">
                <form>
                    <h1 id="psswtitle">
                        <button
                            style="
                                border: none;
                                background-color: rgb(249, 249, 249);
                                font-size: larger;
                                cursor: pointer;
                            "
                            onclick="location.href = 'loginChangeClient.php'"
                            type="button"
                        >
                            &#8249;
                        </button>
                        Change Password
                    </h1>
                    <label for="oldpassword" id="pssw">Old Password:</label>
                    <input
                        type="password"
                        id="oldpassword"
                        name="oldpassword"
                        class="inputBox"
                    />
                    <br />
                    <br />
                    <label for="newpassword" id="pssw">New Password:</label>
                    <input
                        type="password"
                        id="newpassword"
                        name="newpassword"
                        class="inputBox"
                    />
                    <a href="#" id="popup-link"
                        ><input type="submit" value="Submit" id="submitpssw"
                    /></a>
                </form>
            </div>
        </div>

        <script type="text/javascript" src="/api/script.js"></script>
    </body>

    <footer>&#0169; 2023 SSMS Corporation All Right Reserved</footer>
</html>
