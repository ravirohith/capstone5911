<?php
session_start();
if(!isset($_SESSION['user'])){
echo '
<html>
<head>
<title>ShopVote</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="header">
<a href="dashboard.php"><div id="logo">
</div></a>
<div id="signin">
<form action="login.php" method="POST" id="signin_form">

<input type="text" name="username" id="uname" placeholder="Username" required></input>&nbsp;&nbsp;

<input type="password" name="password" id="pwd" placeholder="Password" required></input>
<input type="submit" value="login" id="sin_submit" style="width:100px;background:#619AE8;border:none;"></input>
</form>
</div>
</div>
<div id="content">
<div id="about">
<div id="ab_content">
<span style="font-size:40px;">About</span>
<br><br>
<iframe width="700" height="450" src="http://www.youtube.com/embed/w2itwFJCgFQ" frameborder="0" allowfullscreen></iframe>
</div>
</div>
<div id="signup">
<form id="signup_form" action="signup.php" method="POST">
<table id="sup_table">
<th colspan="2" style="font-size:40px;">Sign Up</th>
<tr>
<td><input type="text" name="fname" id="f_name" placeholder="First Name" required style="width:165px"></input></td>
<td><input type="text" name="lname" id="l_name" placeholder="Last Name" required style="width:165px"></input></td></tr><tr>
<td colspan="2"><input type="text" name="iusername" id="iuname" placeholder="Username" required></input></td></tr><tr>
<td colspan="2"><input type="text" name="irusername" id="iruname" placeholder="Re-enter Username" required onkeyup="checkUname(this)"></input></td></tr><tr>
<td colspan="2"><input type="password" name="ipassword" id="ipwd" placeholder="Password" required></input></td></tr><tr>
<td colspan="2"><input type="password" name="irpassword" id="irpwd" placeholder="Re-enter Password" required onkeyup="checkPwd(this)"></input></td></tr>
<tr><td colspan="2"><input type="text" name="ad1" id="address1" placeholder="Street Address 1" required></input></td></tr>
<tr><td colspan="2"><input type="text" name="ad2" id="address2" placeholder="Street Address 2" required></input></td></tr>
<tr><td colspan="2"><input type="text" name="city" id="incity" placeholder="City" required></input></td></tr>
<tr><td colspan="2"><input type="text" name="state" id="instate" placeholder="State" required></input></td></tr>
<tr><td colspan="2"><input type="number" min="0" name="zip" id="inzip" placeholder="Zipcode" required></input></td></tr>
<tr style="font-size:20px;"><td colspan="2" style="padding-top:10px;">Female<input type="radio" name="gender" id="irpwd" value="female"  required></input>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Male<input type="radio" name="gender" id="irpwd" value="male"  required></input></td></tr>
</table>
<input type="submit" id="sup_submit"></input>
</form>
</div>
</div>
<script language="javascript" type="text/javascript">
function checkPwd(input) {
if (input.value != document.getElementById("ipwd").value) {
input.setCustomValidity("Password Must be Matching.");
document.getElementById("irpwd").style.borderColor= "red";
document.getElementById("irpwd").style.transitionDuration="1s";
document.getElementById("irpwd").style.transform="skewX(-10deg)";
} else {
document.getElementById("irpwd").style.borderColor= "transparent";
document.getElementById("irpwd").style.transform="skewX(0deg)";
input.setCustomValidity("");
}
}
function checkUname(input) {
if (input.value != document.getElementById("iuname").value) {
input.setCustomValidity("Password Must be Matching.");
document.getElementById("iruname").style.borderColor= "red";
document.getElementById("iruname").style.transitionDuration="1s";
document.getElementById("iruname").style.transform="skewX(-10deg)";
} else {
document.getElementById("iruname").style.borderColor= "transparent";
document.getElementById("iruname").style.transform="skewX(0deg)";
input.setCustomValidity("");
}
}
</script>
<!--<a href="test.php"><input type="button" value="Webservice"></input></a>-->
</body>
</html>';}
else
header("Location: dashboard.php");
?>