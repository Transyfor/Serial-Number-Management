<?php
    ob_start();
    session_start(); //This makes it so that I can attribute variables to the current user
?>
<?php
    //This is so users that are already logged in can't get here.
    if(isset($_SESSION['Account Type'])){
        if($_SESSION['Account Type']=="Client"){
            header("Location: P_ClientHomeScreen.php");
            exit();
            }
        if($_SESSION['Account Type']=="SP"){
            header("Location: P_SPAccountScreen.php");
            exit();
         }
    }

    //We will deal with the login up here. No need to make another .php file to handle it.
    if($_SERVER["REQUEST_METHOD"]=== "POST"){ //So if the form below posts, this catches it
        if(empty($_POST["confirmEmail"])){
            echo '<script>alert("Valid email is required"); 
            window.location.href="/index.php";</script>';           
             exit();
        }
        if(empty($_POST["confirmnewpassword"]) || empty($_POST["confirmnewpassword"])){
            echo '<script>alert("New password is required");
            window.location.href="/index.php";</script>';     
             exit();
        }
        //We start by connecting to the database by requiring our db_conn file
        $mysqli= require __DIR__ ."/db_conn.php";
        
        // Verifies that both passwords provided are the same
        if ($_POST["newpassword"] == $_POST["confirmnewpassword"]) {
            $confirmEmail = $_POST["confirmEmail"];
            $newPassword = $_POST["newpassword"];
            
            // SQL to update the password for the provided email
            $updatePasswordSql = "UPDATE Users SET Password = ? WHERE Email = ?";
            $updateStmt = $mysqli->prepare($updatePasswordSql);
            
            if ($updateStmt) {
                $updateStmt->bind_param("ss", $newPassword, $confirmEmail);
                if ($updateStmt->execute()) {
                    echo '<script>alert("Password updated successfully if user with provided email exists"); window.location.href="/index.php";</script>';
                    exit();
                } else {
                    echo '<script>alert("Error updating password: ' . $mysqli->error . '"); window.location.href="/forgotPassword.php";</script>';
                    exit();
                }
            } else {
                echo '<script>alert("Error in password update statement: ' . $mysqli->error . '"); window.location.href="/forgotPassword.php";</script>';
                exit();
            }
        } else {
            echo '<script>alert("Passwords do not match"); window.location.href="/forgotPassword.php";</script>';
            exit();
        }

    }
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/projectstyles.css">
    <title> Home Page </title>
</head>

<body class="blueBackground" style="scrollbar-width: none;overflow-y: scroll; overflow: hidden;">
    <header class="heading">Welcome to Simple Serial Management System</header><br>
    <section id="inputBox" class="bubbleStyle" style="width: 30%; margin: 0 auto;">
        <form id="homePageLoginBox" method="post"> 
            <h1 id="psswtitle">
                <button
                    style="
                        border: none;
                        background-color: rgb(249, 249, 249);
                        font-size: larger;
                        cursor: pointer;
                    "
                    onclick="location.href = './index.php'"
                    type="button"
                >
                    &#8249;
                </button>
                Forgot Password
            </h1>
            <label for="confirmEmail" id="email">Confirm Email:</label>
            <input
                type="text"
                id="confirmEmail"
                name="confirmEmail"
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
            <br />
            <br />
            <label for="confirmnewpassword" id="pssw">Confirm Password:</label>
            <input
                type="password"
                id="confirmnewpassword"
                name="confirmnewpassword"
                class="inputBox"
            />
            <a href="#" id="popup-link"
                ><input type="submit" value="Submit" id="submitnewpssw"/></a>
        </form>
    </section>
</body>

<footer> &copy 2023 SSMS Corporation All Right Reserved </footer>

</html>
