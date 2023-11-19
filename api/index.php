<?php

//We will deal with the login up here. No need to make another .php file to handle it.
    if($_SERVER["REQUEST_METHOD"]=== "POST"){ //So if the form below posts, this catches it
        //We start by connecting to the database by requiring our db_conn file
        $mysqli= require __DIR__ ."/db_conn.php";

        //Then we write the sql to select a record based on the email address
        $sql= sprintf("SELECT * FROM Users WHERE Username = '%s'",$mysli->real_escape_string($_POST["user"])); //The sprintf function replaces the %s in our string with the the second parameter, which is the given username in this case.
//We could've not written the real_escape_string part and just wrote $_POST["user"] directly, but real_escape_string protects us from attackers.
        $result= $mysqli->query($sql); //This just fetches the row in our table which has the username we want. 
        $user= $result->fetch_assoc(); //This converts the row of our table into an array
        //Now we check if the given password was correct
        if ($user){ //This part only runs if there IS a user
            if(password_verify($_POST['password'],$user['Password'])){ //php has a built in password checker!
                session_start(); //This makes it so that I can attribute variables to the current user
                $_SESSION['userID']=$user['userID'];
                $_SESSION['Name']=$user['Name'];
                $_SESSION['Username']=$user['Username'];
                $_SESSION['Password']=$user['Password'];
                $_SESSION['Email']=$user['Email'];
                $_SESSION['Address']=$user['Address'];
                $_SESSION['Payment Method']=$user['Payment Method'];
                $_SESSION['Account Type']=$user['Account Type'];
                $_SESSION['Serial Numbers']=$user['Serial Numbers'];
                //And then send them to the right page afterwards
                if($_SESSION['Account Type']=="Client"){
                header("Location: P_ClientHomeScreen.php");
                exit();
                }
                if($_SESSION['Account Type']=="SP"){
                    header("Location: P_SPAccountScreen.php");
                    exit();
                }
            }
        }
        else{
        echo '<script>alert("Login is invalid")</script>'; 
        header("Location: /index.php");
        exit();
        }

    }

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="projectstyles.css">
    <title> Home Page </title>
    <style>
        header {
            margin: 5%;
            margin-top: 1%;
            scale: 95%;
        }

        #inputBox {
            margin-left: 10%;
            padding-top: 4%;
            width: 20%;
            height: 200px;
            scale: 1.3;
            text-align: center;
            position: absolute;
            top: 52.3%;
            display: inline-block;
            position: absolute;
            bottom: 23%;
        }

        #bubbleText {
            width: 50%;
            height: 350px;
            text-align: left;
            display: inline-block;
            position: absolute;
            right: 7%;
            top: 47%;
            font-size: 20px;
        }

        h1 {
            font-size: 20px;
        }

        section {
            margin-top: -80px;
        }

        #logo {
            width: 170px;
            position: absolute;
            bottom: 55%;
            left: 15%;
            z-index: 9;
        }

        #submitButtonHome {
            position: absolute;
            left: 5%;
            top: 80%;
            bottom: -10%;
        }

        #createButtonHome {
            position: absolute;
            right: 5%;
            top: 80%;
            bottom: -10%;
        }
    </style>

</head>

<body class="blueBackground" style="scrollbar-width: none;overflow-y: scroll; overflow: hidden;">
    <header class="heading">Welcome to Simple Serial Management System</header><br>
    <img src="Logo-01.png" alt="Our Logo" id="logo">
    <section id="inputBox" class="bubbleStyle">
        <form id="homePageLoginBox" method="post"> 
            <label>Username:</label><br>
            <input type="text" id="loginInfo" name="user" class="inputBox"><br><br>
            <label>Password:</label><br>
            <input type="password" id="password" name="password" class="inputBox"><br>
            <input id="submitButtonHome" type="submit" value="Login">
        </form>
        <button id="createButtonHome" onclick="location.href = 'CreateAccount.html';">Create Account</button>

    </section>
    <section class="bubbleStyle" id="bubbleText">
        <h1 style="font-size: 30px; padding-top: 0%;">About Us</h1>
        <text>Hello and welcome to the homepage of Simple Serial Management System, we are a company that will meet your
            managment needs!
            <br><br>
            Please login to be redirected to your personal managment portal, from there you can configure your account
            however you would like; and software managers can manage users.
            <br><br>
            For your viewing pleasure, please view all webpages in a maximized window or else browsers may move
            elements, thank you.
        </text>

    </section>
</body>

<footer> &copy 2023 SSMS Corporation All Right Reserved </footer>

</html>
