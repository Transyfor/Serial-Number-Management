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
        <form id="homePageLoginBox" action="/loginHandler.php" method="post">
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

    <script>
        let loginForm = document.getElementById("homePageLoginBox");
        let loginButton = document.getElementById("submitButtonHome");

        loginButton.addEventListener("click", (e) => {
            e.preventDefault();
            const username = loginForm.loginInfo.value;
            const password = loginForm.password.value;

            if (username == "user" && password == "123") {
                window.location.href = "P_ClientHomeScreen.html";
            } else if (username == "provider" && password == "123") {
                window.location.href = "P_SPAccountScreen.html";
            } else if (username == "" || password == "") {
                alert("Username and password required.")
            } else {
                alert("Please enter a valid username and password.");
            }
        })
    </script>
</body>

<footer> &copy 2023 SSMS Corporation All Right Reserved </footer>

</html>
