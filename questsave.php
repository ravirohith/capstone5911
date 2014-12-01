<?php
session_start();
if(isset($_SESSION['user'])){
$con = mysqli_connect("localhost","root","root","shopvote");
if(mysqli_connect_errno())
echo "Failed" . mysqli_connect_error();
$result = mysqli_query($con,"SELECT * FROM questions");
while($row = mysqli_fetch_array($result)) {
     //echo $row['q_id'] . " " . $_POST[$row['q_id']] . "<br>";
/*	if($_POST[$row['q_id']]==1){
  mysqli_query($con,"REPLACE INTO preferences VALUES ('".$_SESSION['user']."',".$row['q_id'].")");
	//echo $_SESSION['user'] . " " . $row['q_id'];
	}
	else{
	mysqli_query($con,"DELETE FROM preferences WHERE uid='" .$_SESSION['user']. "' and qid=".$row['q_id']."");
	}*/
	
	mysqli_query($con,"REPLACE INTO preferences VALUES('".$_SESSION['user']."',".$row['q_id'].",".$_POST[$row['q_id']].")");
	}

	}
else{
session_destroy();
header("Location: index.php");
}
header("Location: questions.php");
?>
