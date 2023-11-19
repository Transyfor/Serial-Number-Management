<?php
//This file handles the login info.
//We start our session, as the session hold all necessary elements for the subsequent files
session_start();

include "db_conn.php"; //This means to include variables from the db.conn.php file. This is mostly just for connection info

//This means: if name, password has been posted and sent to us, we define a validation function (to protect us from attacks)
if (isset($_POST["user"]) && (isset($_POST["password"]))) {

    function validate($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return data;
    }
}

//We run the validation functions
$user = validate($_POST['user']);
$password = validate($_POST['password']);

//We send any possible errors
if ($user == ''|| $password == '') {
    header ("Location: index.php?error= One of the fields was blank");
    exit();
}

//Finally we make wring a string which is what we want to ask mysql for

$sql= "SELECT * FROM Users where Username='$user' AND Password='$password'";

//We ask mysql using the String we wrote above and store the result in $result
$result = mysqli_query($conn,$sql);

//Now that we have the row which has the username and password we want, we can work with this.
if(mysqli_num_rows($result)==1){
    $row= mysqli_fetch_assoc($result);
    if($row["Username"] === $user && $row['Password']===$password){
        echo "Logged In!";
        //Now that we've landed on the row in the table with the correct username and password, we want to transfer all the information from that row to the current session, so all other pages will have access to it.
        $_SESSION['Username'] = $row['Username'];
        $_SESSION[‘Name’] = $row[‘Name’];
        $_SESSION['Password'] = $row['Password'];
        $_SESSION['Email'] = $row['Email'];
        $_SESSION['Address'] = $row['Address'];
        $_SESSION['Payment_Method']=$row['Payment_Method'];
        $_SESSION['Account_Type'] = $row['Account_Type'];
        $_SESSION['Serial_Numbers'] = $row['Serial_Numbers'];
        //Now that we've added these things to the current session, we can let the user proceed to their page with these variables attributed to them.
        if($_SESSION['Acount_Type'] == "Client"){
        header("Location: P_ClientHomeScreen.php");
        }
        else{
            header("Location: P_SPAccountScreen.php");
        }
        exit();
    }
    else{
        header("Location: index.php?error=Incorrect username or password");
        exit();
    }
}
else{
    header("Location:index.php");
}
