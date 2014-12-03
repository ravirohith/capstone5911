<?php
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$uname = $_POST['iusername'];
$runame = $_POST['irusername'];
$pwd = $_POST['ipassword'];
$rpwd = $_POST['irpassword'];
$gender = $_POST['gender'];
$st1 = $_POST['ad1'];
$st2 = $_POST['ad2'];
$city = $_POST['city'];
$state = $_POST['state'];
$zipcode = $_POST['zip'];
$con = mysqli_connect("localhost","root","root","shopvote");
if(mysqli_connect_errno())
echo "Failed" . mysqli_connect_error();
mysqli_query($con,"INSERT INTO usersdb(fname,lname,username,password,gender,address1,address2,state,city,zipcode,active) VALUES('" .$fname. "','" .$lname. "','" .$uname. "','" .$pwd. "','" .$gender. "','" .$st1. "','" .$st2. "','" .$city. "','" .$state. "'," .$zipcode. ",'1')");
mysqli_close($con);
?>
