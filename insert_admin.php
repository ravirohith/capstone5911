<?php
$admin_uname = $_POST['username'];
$admin_pwd = md5(sha1($_POST['password']));

$con = mysqli_connect("localhost","root","root","shopvote");
if(mysqli_connect_errno())
echo "Failed" . mysqli_connect_error();
$result = mysqli_query($con,"INSERT INTO admin(username,password) VALUES ('".$admin_uname. "','" .$admin_pwd. "')");

header("Location: admin_dashboard.php");

?>
