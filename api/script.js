document.getElementById("homepage").onclick = function () {
  location.href = "P_ClientHomeScreen.html";
};

document.getElementById("settingsProvider").onclick = function () {
  location.href = "loginChangeProvider.html";
};

document.getElementById("loginchangeprovidermenu").onclick = function () {
  location.href = "loginChangeProvider.html";
};

// Pop up for deleting account
// Get the elements by their ID
var submitdelete = document.getElementById("submitdelete");
var popupWindow = document.getElementById("popup-window");
var confirmButton = document.getElementById("confirmButton");
var cancelButton = document.getElementById("cancelButton");

// Show the pop-up window when the link is clicked
submitdelete.addEventListener("click", function (event) {
  event.preventDefault();
  popupWindow.style.display = "block";
});

// Hide the pop-up window when the close button is clicked
confirmButton.addEventListener("click", function () {
  popupWindow.style.display = "none";
});
cancelButton.addEventListener("click", function () {
  popupWindow.style.display = "none";
});
// End of pop up code

//Log out function
function logout() {
  var reallyLogout = confirm("Do you really want to log out?");
  if (reallyLogout) {
    location.href = "homepage.html";
  }
}

var answer = document.getElementById("logout");
if (answer.addEventListener) {
  answer.addEventListener("click", logoutfunction, false);
} else {
  answer.attachEvent("onclick", logoutfunction);
}

/*$(document).ready(function(){
    $('.renewbtn').click(function(){
        $(this).html($(this).html() == 'edit' ? 'modify' : 'edit');});
});*/

//Random Number Generator (temporary) for Serial Number
function RandomSN() {
  var rnd = Math.floor(Math.random() * 1000000000);
  document.getElementById("tb").value = rnd;
}
