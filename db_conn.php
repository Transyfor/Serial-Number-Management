<?php
//This file holds all the info to connect to our database. These variables can  be refered everywhere in our website, 
// as long as "include "db_conn.php";" is written.

    $sname="sql5.freemysqlhosting.net";
    $unmae="sql5662727";
    $password="MfjT51DTl3";
    $db_name="sql5662727";

    $conn =mysqli_connect("$sname","$unmae","$password","$db_name");

    if(!$conn){
        echo "Connection Failed.";
    }
?>