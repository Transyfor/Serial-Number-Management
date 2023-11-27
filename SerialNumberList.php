<?php
 session_start(); //This makes it so that I can attribute variables to the current user

 //If a user gets here and doesn't already have an account, we need to redirect them out
if(!isset($_SESSION['Account Type'])){
    header("Location: index.php");
    exit();
}

?>
<!DOCTYPE html>
<html>

<head>
    <Link rel="stylesheet" type="text/css" href="projectstyles.css">
    </rel>
    <title>Service Provider Account Screen</title>
</head>
<header class="heading">
    Serial Numbers List
</header>

<body class="blueBackground">
    <div class="maindiv">
        <div class="navigation">
            <ul id="horizontalmenu">
                <li id="homepage"><a href="P_SPAccountScreen.html">Home</a></li>
                <li id="logout" style="float:right">
                <a href="logout.php">
                <button>Log out</button>
                </a>
                </li>
            </ul>
        </div>

        <div>
            <table id="SerialNumber-table" class="bubbleStyle">
                <!--<tr id="SNTable" height="50px">
                    <td rowspan = "2"> </td>
                    <th colspan = "3">Serial Numbers List</th>
                </tr>-->
                <tr height="50px">
                    <th width="50">No.</th>
                    <th width="150">Serial Number</th>
                    <th width="150">Redeemed</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>6355889699</td>
                    <td>Yes</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>9048193061</td>
                    <td>Yes</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>2818186387</td>
                    <td>No</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>8151499694</td>
                    <td>Yes</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>9761690838</td>
                    <td>No</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>6510642069</td>
                    <td>No</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>2232341414</td>
                    <td>No</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>6414193177</td>
                    <td>No</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>8112049524</td>
                    <td>Yes</td>
                </tr>
            </table>
        </div>
        </br></br>
        <form name="rn" action="" method="post">
            <input type="button" id="new-Serial-Number-button" name="SN" value="Generate a New Serial Number"
                onclick="RandomSN();" />
            </br></br>
            <input name="SerialNum" type="text" id="tb" class="inputBox" placeholder="Serial Number"/>
            <input name="price "type="text" id="tb" class="inputBox" placeholder="Price"/>
            <input name="Name" type="text" id="tb" class="inputBox" placeholder="Name"/>
            <br>
            <input type="submit" value="Submit" />
        </form>
        </br></br></br></br>
        <!--<a href="index.html">-->
        <!--<button id="client-logout-button" onclick="logout()" type="button">Log out</button>-->
        <!--</a>-->

        <script type="text/javascript" src="script.js"></script>

        <!-- function RandomSN() {
            var rnd = Math.floor(Math.random() * 1000000000);
            document.getElementById('tb').value = rnd;
        }

        /*function logoutFunction() {
        confirm("Are you sure you want to log out!");
        }*/

        function logout(){
        var reallyLogout=confirm("Do you really want to log out?");
        if(reallyLogout){
            location.href="index.html";
        }
        }
        var answer = document.getElementById("logout");
        if (answer.addEventListener) {
            answer.addEventListener("click", logoutfunction, false);
            } else {
                answer.attachEvent('onclick', logoutfunction);
            }  -->

</body>
<footer> &#0169; 2023 SSMS Corporation All Right Reserved </footer>

</html>
