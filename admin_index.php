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
<a href="index.php"><div id="logo">
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
<iframe width="700" height="450" src="http://www.youtube.com/embed/w2itwFJCgFQ" frameborder="0" allowfullscreen></iframe>
</div>
</div>
<div id="signup">

</div>
</div>
<script language="javascript" type="text/javascript">
</script>
<!--<a href="test.php"><input type="button" value="Webservice"></input></a>-->
</body>
</html>';}
else
header("Location: admin_dashboard.php");
?>