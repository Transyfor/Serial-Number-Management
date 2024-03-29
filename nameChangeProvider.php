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
        <title>SP Change Name</title>
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
                            href="loginChangeProvider.php"
                            id="loginchangeprovidermenu"
                            >Change Login</a
                        >
                    </li>
                    <li>
                        <a
                            class="active"
                            href="nameChangeProvider.php"
                            id="nameProvider"
                            >Change Name</a
                        >
                    </li>
                </ul>
            </div>

            <div class="bubbleStyle" id="psswproviderdiv">
                <form action="nameChangeProviderHandler.php" method="POST">
                    <h1 id="nametitle">Change Name</h1>
                    <p id="oldname">
                        <em><strong>
                            <?php echo $_SESSION['Name'];?>
                        </strong></em>
                    </p>
                    <label for="newname" id="entername">New Name:</label>
                    <input
                        type="text"
                        id="newname"
                        name="newname"
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
