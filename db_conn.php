<?php
//This file holds all the info to connect to our database. These variables can  be refered everywhere in our website, 
// as long as "include "db_conn.php";" is written.

    $sname="sql5.freemysqlhosting.net";
    $uname="sql5662727";
    $password="MfjT51DTl3";
    $db_name="sql5662727";

    $mysqli= new mysqli(hostname: $sname, username: $uname, password: $password, database: $db_name);

    if($mysqli->connect_errno){
        die("Connection error: " . $mysqli->connect_error);
    }

    return $mysqli;

?>