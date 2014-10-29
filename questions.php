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
<div id="d-cont"><form method="POST" action="questsave.php">';
$con = mysqli_connect("localhost","root","root","shopvote");
if(mysqli_connect_errno())
echo "Failed" . mysqli_connect_error();
$result_main = mysqli_query($con,"SELECT * FROM categories");
while($row_main = mysqli_fetch_array($result_main)){
echo "<br><br>" . $row_main['categoryname'] . "<br>";
$result = mysqli_query($con,"SELECT * FROM questions WHERE category=" .$row_main['categoryid']."");
while($row = mysqli_fetch_array($result)) {
     $cresult = mysqli_query($con,"SELECT COUNT(uid) AS total FROM preferences WHERE qid=".$row['q_id']."");
	 $data = mysqli_fetch_assoc($cresult);
	 $count = $data['total'];
	 if($count==1){
  echo  '<br><input type="checkbox" name='.$row["q_id"].' value="1" checked></input>' . $row['question'];}
     else
	echo '<br><input type="checkbox" name='.$row["q_id"].' value="1"></input>' . $row['question']; 
}
/*	 if($count==1){
  echo $row['question'] . '<br><br><input type="radio" name='.$row["q_id"].' value="1" checked="checked">Yes</input><input type="radio" name='.$row["q_id"].' value="0">No</input><br><br>';}
     else
	echo $row['question'] . '<br><br><input type="radio" name='.$row["q_id"].' value="1">Yes</input><input type="radio" name='.$row["q_id"].' value="0" checked="checked">No</input><br><br>'; 
}*/
}
	echo '<br><br><input type="submit"></submit></form></div>
</body>
</html>
';
}
else{
session_destroy();
header("Location: index.php");
}
?>
