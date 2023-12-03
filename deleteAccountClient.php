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
        <title>SP Delete Account</title>
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
                        <a href="loginChangeClient.php" id="password"
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
                        <a
                            class="active"
                            href="deleteAccountClient.php"
                            id="delete"
                            >Delete Account</a
                        >
                    </li>
                </ul>
            </div>

            <div class="bubbleStyle" id="deletediv">
                <form action="deleteAccountClientHandler.php" method="POST">
                    <h1 id="deletetitle">Delete Account</h1>
                    <label for="currentpassword" id="currentpassword"
                        >Enter Password:</label
                    >
                    <input
                        type="password"
                        id="currentpassword"
                        name="currentpassword"
                        class="inputBox"
                    />
                    <br />
                    <p id="deleteconfirmation">
                        *Enter your current password to confirm the deletion*
                    </p>
                    <input type="submit" value="Submit" id="submitdelete" />
                </form>
            </div>
        </div>

        <div id="popup-window">
            <h1 id="confirmQuestion">
                Are you sure you want to delete your account?
            </h1>
            <p id="deleteExplanation">
                You will be unable to recover your account afterwards.
            </p>
            <button
                id="confirmButton"
                onclick="window.location.href='index.php'"
            >
                Confirm
            </button>
            <button id="cancelButton">Cancel</button>
        </div>

        <script type="text/javascript" src="/api/script.js"></script>
    </body>

    <footer>&#0169; 2023 SSMS Corporation All Right Reserved</footer>
</html>
