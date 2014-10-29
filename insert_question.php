<?php
$question = $_POST['question'];
$quest_cat = $_POST['quest_cat'];
$con = mysqli_connect("localhost","root","root","shopvote");
if(mysqli_connect_errno())
echo "Failed" . mysqli_connect_error();
$result = mysqli_query($con,"INSERT INTO questions(question,category) VALUES ('".$question. "'," .$quest_cat. ")");
header("Location: admin_dashboard.php");

?>
