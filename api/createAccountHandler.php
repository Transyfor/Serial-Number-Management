<?php
//This is the file that manages new accounts

//We start by checking that the $_POST array has values for each
if(empty($_POST["create-username"])){
    echo '<script>alert("Username is required"); window.location.href="CreateAccount.html";</script>';
    exit();
}

if(empty($_POST["create-password"])){
    echo '<script>alert("Password is required"); window.location.href="CreateAccount.html";</script>';
    exit();
}

if(empty($_POST["create-name"])){
    echo '<script>alert("Name is required"); window.location.href="CreateAccount.html";</script>';
    exit();
}

if(empty($_POST["create-email"])){
    echo '<script>alert("Email is required"); window.location.href="CreateAccount.html";</script>';
    exit();
}

if(empty($_POST["create-address"])){
    echo '<script>alert("Address is required"); window.location.href="CreateAccount.html";</script>';
    exit();
}

//We can also check for a valid email

if (! filter_var($_POST["create-email"], FILTER_VALIDATE_EMAIL)) {
    echo '<script>alert("Valid email is required"); window.location.href="CreateAccount.html";</script>';
    exit();
}

$mysqli = require __DIR__ ."/db_conn.php"; //This is a connection object

//Now we've connected to the database! We can now enter a new record into the user table

//First we make a statement which we'll use in our query
$sql = "INSERT INTO `Users` (`userID`, `Name`, `Username`, `Password`, `Email`, `Address`, `Payment Method`, `Account Type`, `Serial Numbers`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, '')";
//Then we create a new prepared statement object by calling the statement init method on the mysqli connect object.
$stmt= $mysqli->stmt_init();

//Next we prepare the $sql statement for executution by calling the prepare method on the stmt object using our prewritten $sql string
//This checks if our statement is well written or not, and if theres an error it'll return false!
if(!$stmt->prepare($sql)){
    die("SQL error");
}

//In our $sql (which is now $stmt) String, there are question marks for the values we need to add. Let's replace the question marks with what we want to add now
$stmt->bind_param("sssssss",$_POST["create-username"],$_POST["create-password"],$_POST["create-name"],$_POST["create-email"],$_POST["create-address"],$_POST["paymentMethod"],$_POST["accountType"]); //the first parameter the method takes is to tell it what type each value is. We're adding 7 strings to our table, so "sssssss", where each s represents one of the variables
if($stmt->execute()){ //If appending was successful
    header("Location: /api/index.php");
    exit();
}
else{ //If it wasnt successful
    if($mysqli->errno === 1062) { //Special case if it's because email already taken
        echo '<script>alert("Given email or username is already taken"); window.location.href="CreateAccount.html";</script>';
        exit();
    } 
    else {
    die($mysqli->error. " " . $mysqli->errno);
    }
}