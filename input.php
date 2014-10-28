<?php
$con = $con = mysql_connect("localhost","root","");
if (!$con){
  die('Could not connect: ' . mysql_error());
}
mysql_select_db("shopvote", $con);

$fname=$_POST["fname"];
$lname=$_POST["lname"];
$user=$_POST["iusername"];
$pass=$_POST["ipassword"];
$gender=$_POST["gender"];
$ad1=$_POST["ad1"];
$ad2=$_POST["ad2"];
$state=$_POST["state"];
$city=$_POST["city"];
$zip=$_POST["zip"];
$result = mysql_query("INSERT INTO usersdb (fname,lname,username,password,gender,address1,address2,state,city,zipcode) VALUES ('$fname','$lname','$user','$pass','$gender','$ad1','$ad2','$state','$city','$zip')");
mysql_close($con);
?>
		