<?php
 session_start(); //This makes it so that I can attribute variables to the current user

 //If a user gets here and doesn't already have an account, we need to redirect them out
if(!isset($_SESSION['Account Type'])){
    header("Location: index.php");
    exit();
}

?>
<!DOCTYPE html>
<html style="height: 94.5%;
padding-top: 0%;">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/projectstyles.css">
    <title> SP Redeem License Code </title>
</head>

<header class="heading">
    Simple Serial Management System
</header>

<body style="height: 800px; padding-top: 0%;" class="blueBackground">
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

        <div class="bubbleStyle" id="codediv">
            <form>
                <h1 id="psswtitle">Redeem License Code</h1>
                <label for="codeinput" id="code">Code:</label>
                <input type="text" id="codeinput" name="codeinput" class="inputBox" maxLength="6">
                <input type="submit" value="Submit" id="submitcode">
            </form>
        </div>
    </div>

    <script type="text/javascript" src="script.js"></script>
</body>

<footer> &copy 2023 SSMS Corporation All Right Reserved </footer>

</html>
