<?php
$category = $_POST['category'];

$con = mysqli_connect("localhost","root","root","shopvote");
if(mysqli_connect_errno())
echo "Failed" . mysqli_connect_error();
$result = mysqli_query($con,"INSERT INTO categories (categoryname) VALUES ('".$category. "')");

header("Location: admin_dashboard.php");

?>
