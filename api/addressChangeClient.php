<!DOCTYPE html>
<html style="height: 94.5%; padding-top: 0%">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="/projectstyles.css" />
        <title>SP Change Address</title>
    </head>

    <header class="heading">Manage Account</header>

    <body style="height: 800px; padding-top: 0%" class="blueBackground">
        <div class="maindiv">
            <div class="navigation">
                <ul id="horizontalmenu">
                    <li id="homepage">
                        <a href="./P_ClientHomeScreen.html">Home</a>
                    </li>
                    <li id="settings">
                        <a class="active" href="./loginChangeClient.html"
                            >Settings</a
                        >
                    </li>
                    <li id="logout" style="float: right">
                        <button onclick="logout()">Log out</button>
                    </li>
                </ul>
            </div>

            <div class="subdiv1">
                <ul class="manageacctmenu">
                    <li>
                        <a href="./loginChangeClient.html" id="password"
                            >Change Login</a
                        >
                    </li>
                    <li>
                        <a
                            class="active"
                            href="./addressChangeClient.html"
                            id="address"
                            >Change Address</a
                        >
                    </li>
                    <li>
                        <a href="./nameChangeClient.html" id="name"
                            >Change Name</a
                        >
                    </li>
                    <li>
                        <a href="./paymentChangeClient.html" id="payment"
                            >Change Payment Method</a
                        >
                    </li>
                    <li>
                        <a href="./deleteAccountClient.html" id="delete"
                            >Delete Account</a
                        >
                    </li>
                </ul>
            </div>

            <div class="bubbleStyle" id="addressdiv">
                <form>
                    <h1 id="addresstitle">Change Address</h1>
                    <p id="oldaddresstag">Old address:</p>
                    <p id="oldaddress">
                        <em
                            ><strong
                                >123 Main Street<br />Montreal, Quebec, A1A
                                1A1<br />Canada</strong
                            ></em
                        >
                    </p>
                    <label for="streetaddress" id="streetaddress"
                        >New Address:</label
                    >
                    <input
                        type="text"
                        id="streetaddress"
                        name="streetaddress"
                        class="inputBox"
                        autocomplete="off"
                    />
                    <input type="submit" value="Submit" id="submitaddress" />
                </form>
            </div>
        </div>

        <script type="text/javascript" src="script.js"></script>
    </body>

    <footer>&#0169; 2023 SSMS Corporation All Right Reserved</footer>
</html>