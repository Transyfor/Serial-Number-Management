<?php
 session_start(); //This makes it so that I can attribute variables to the current user

 //If a user gets here and doesn't already have an account, we need to redirect them out
if(!isset($_SESSION['Account Type'])){
    header("Location: index.php");
    exit();
}

?>
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
                    <li id="logout" style="float:right">
                <a href="logout.php">
                <button>Log out</button>
                </a>
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

            <div class="bubbleStyle" id="emailproviderdiv">
                <form action="emailChangeProviderHandler.php" method="POST">
                    <h1 id="emailtitle">
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
