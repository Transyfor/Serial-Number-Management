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

            <div class="bubbleStyle" id="emailproviderdiv">
                <form>
                    <h1 id="emailtitle">
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
                        Change Email
                    </h1>
                    <label for="oldemail" id="email">Old Email:</label>
                    <input
                        type="text"
                        id="oldemail"
                        name="oldemail"
                        class="inputBox"
                    />
                    <br />
                    <br />
                    <label for="newemail" id="email">New Email:</label>
                    <input
                        type="text"
                        id="newemail"
                        name="newemail"
                        class="inputBox"
                    />
                    <a href="#" id="popup-link"
                        ><input type="submit" value="Submit" id="submitpssw"
                    /></a>
                </form>
            </div>
        </div>

        <script type="text/javascript" src="script.js"></script>
    </body>

    <footer>&#0169; 2023 SSMS Corporation All Right Reserved</footer>
</html>
