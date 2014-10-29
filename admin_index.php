
<html>
<head>
<title>ShopVote</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="header">
<a href="admin_dash.php"><div id="logo">
</div></a>
<div id="signin">
<form action="admin_login.php" method="POST" id="signin_form">

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
<iframe width="700" height="450" src="http://www.youtube.com/watch?v=w2itwFJCgFQ"></iframe>
</div>
</div>
<div id="signup">

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
</html>