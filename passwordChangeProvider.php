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
                        <a href="P_SPAccountScreen.php">Home</a>
                    </li>
                    <li id="settingsProvider">
                        <a class="active" href="loginChangeProvider.php"
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
                            href="loginChangeProvider.php"
                            id="loginchangeprovidermenu"
                            >Change Login</a
                        >
                    </li>
                    <li>
                        <a href="nameChangeProvider.php" id="nameProvider"
                            >Change Name</a
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
                            onclick="location.href = 'loginChangeProvider.php'"
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

        <script type="text/javascript" src="script.js"></script>
    </body>

    <footer>&#0169; 2023 SSMS Corporation All Right Reserved</footer>
</html>
