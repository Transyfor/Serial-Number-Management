<!DOCTYPE html>
<html style="height: 94.5%; padding-top: 0%">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="./projectstyles.css" />
        <title>SP Change Payment Method</title>
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
                        <a class="active" href="./passwordChangeClient.html"
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
                        <a href="./addressChangeClient.html" id="address"
                            >Change Address</a
                        >
                    </li>
                    <li>
                        <a href="./nameChangeClient.html" id="name"
                            >Change Name</a
                        >
                    </li>
                    <li>
                        <a
                            class="active"
                            href="./paymentChangeClient.html"
                            id="payment"
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

            <div class="bubbleStyle" id="paymentdiv">
                <form>
                    <h1 id="paymenttitle">Change Payment<br />Method</h1>
                    <p id="oldpaymentmethodtag">Current Payment Method:</p>
                    <p id="oldpaymentmethod">
                        <em><strong>Credit</strong></em>
                    </p>
                    <label for="newpayment" id="enterpayment"
                        >New Payment Method:</label
                    >
                    <input
                        type="text"
                        id="newpayment"
                        name="newpayment"
                        class="inputBox"
                    />
                    <input type="submit" value="Submit" id="submitpayment" />
                </form>
            </div>
        </div>

        <script type="text/javascript" src="script.js"></script>
    </body>

    <footer>&#0169; 2023 SSMS Corporation All Right Reserved</footer>
</html>
