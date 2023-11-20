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
                        <a href="P_SPAccountScreen.php">Home</a>
                    </li>
                    <li id="settings">
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

            <div class="bubbleStyle" id="loginproviderdiv">
                <form>
                    <h1 id="logintitle">Change Login</h1>
                    <div style="text-align: center">
                        <button
                            id="emailChange"
                            onclick="location.href = 'emailChangeProvider.php'"
                            type="button"
                        >
                            Change Email
                        </button>
                    </div>
                    <br />
                    <div style="text-align: center">
                        <button
                            id="passwordChange"
                            onclick="location.href = 'passwordChangeProvider.php'"
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
