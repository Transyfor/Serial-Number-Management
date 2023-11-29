<?php
//This is the file that manages new accounts
//When someone submits a form on createAccount, the server goes to this file to find out what to do.
//All the information that was inputted in the form is sent as an array called $_POST which looks something like this:
//$_POST= ["create-username": (value given by user), "create-password": (value given by user), etc]

//We start by checking that the $_POST array has values for each
if(empty($_POST["create-username"])){
    //echo is php's term for printing. By saying echo, I'm just saying to print in the .php or the .html file what follows. If it's script, it'll excecute it.
    echo '<script>alert("Username is required");</script>';
    //Need to do exit(), as otherwise the php code will keep running even if the user goes to another page.
    exit();
}

if(empty($_POST["create-password"])){
    echo '<script>alert("Password is required"); </script>';
    exit();
}

if(empty($_POST["create-name"])){
    echo '<script>alert("Name is required"); </script>';
    exit();
}

if(empty($_POST["create-email"])){
    echo '<script>alert("Email is required"); </script>';
    exit();
}

if(empty($_POST["create-address"])){
    echo '<script>alert("Address is required"); </script>';
    exit();
}

//We can also check for a valid email. filter_var is a special php method that can check, given a String, if it passes a test. Here we gave the FILTER_VALIDATE_EMAIL test.
if (! filter_var($_POST["create-email"], FILTER_VALIDATE_EMAIL)) { //If it didn't pass our test, echo the following code.
    echo '<script>alert("Valid email is required"); </script>';
    exit();
}

//Next we need a variable that holds the info on how to connect to our database. I made a file for this already db_conn.php. This just accesses that and connectes to our database.
$mysqli = require __DIR__ ."/db_conn.php"; //This is a connection object

//Before we continue, let's check if the given username and password are not already taken
$username= $_POST["create-username"];
$email= $_POST["create-email"];

$sql="SELECT * FROM 'Users' WHERE (Username='$username' or Email='$email');";

      $res=mysqli_query($mysqli,$sql);

      if (mysqli_num_rows($res) > 0) {
        
        $row = mysqli_fetch_assoc($res);
        if($email==isset($row['Email']))
        {
            echo '<script>alert("Email is already taken"); ";</script>';
            exit();
        }
		if($username==isset($row['Username']))
		{
			echo '<script>alert("Username is required"); </script>';
            exit();
		}
}

	


//Now we've connected to the database! We can now enter a new record into the user table
//But there's a few more steps first
//First we make a statement which we'll use in our query
$sql = "INSERT INTO `Users` (`userID`, `Name`, `Username`, `Password`, `Email`, `Address`, `Payment Method`, `Account Type`, `Serial Numbers`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, '')";

$stmt= $mysqli->stmt_init(); //This initializes our connection object from before ($mysqli) so that it's ready to send information to the database.

//Now we have two things. $stmt which is an object that represents our connection to the database. 
//$sql which is a command we want to tell the database to do
//We want to now bring the two together and modify $stmt such that it now includes our command to the database ($sql)

if(!$stmt->prepare($sql)){ //Returns false is preperation fails.
    die("SQL error");
}

//In our $sql String (which has now been binded to $stmt), there were question marks for the values we want to replace. Let's replace the question marks with what we actually want to add to the database.
$stmt->bind_param("sssssss",$_POST["create-username"],$_POST["create-name"],$_POST["create-password"],$_POST["create-email"],$_POST["create-address"],$_POST["paymentMethod"],$_POST["accountType"]); //the first parameter the method takes is to tell it what type each value is. We're adding 7 strings to our table, so "sssssss", where each s represents one of the variables

//$stmt is now fully ready. It includes a command to tell the database, and also the information on connecting to the database. We can execute it!

if($stmt->execute()){ //Has to be if, as it returns a boolean whether it succeeded or not.
    header("Location: index.php"); //Header is an HTTP command. When php reads this, it'll say this exact command to HTTP. We said "Location: " which HTTP represents as making the user go somewhere.
    exit();
}
else{ //If it wasnt successful
    if($mysqli->errno === 1062) { //Special case if it's because email already taken
        echo '<script>alert("Given email or username is already taken"); window.location.href="/createAccount.html";</script>';
        exit();
    } 
    else {
    die($mysqli->error. " " . $mysqli->errno);
    }
}