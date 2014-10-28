<?php
session_start();
if(isset($_SESSION['user'])){
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
<form action="logout.php" method="POST" id="signin_form">
<input type="submit" value="logout" id="sout_submit" style="width:100px;background:#619AE8;border:none;"></input>
</form>
</div>
</div>
<div id="left-menu">
<a href="questions.php">Questions</a>
</div>
<div id="d-cont">
</div>
</body>
</html>
';
}
else{
session_destroy();
header("Location: index.php");
}
?>