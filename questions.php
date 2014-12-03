<?php
session_start();
if(isset($_SESSION['user'])){
echo '
<html>
<head>
<title>ShopVote</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body onload="checkCb()">
<div id="header">
<a href="dashboard.php"><div id="logo">
</div></a>
<div id="welcome">Welcome,' .$_SESSION['user']. '</div>
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
echo '<br><br><span class="cat_name"><h2>' . $row_main['categoryname'] . '</h2></span><br>';
$result = mysqli_query($con,"SELECT * FROM questions WHERE category=" .$row_main['categoryid']."");
while($row = mysqli_fetch_array($result)) {
     //$cresult = mysqli_query($con,"SELECT COUNT(uid) AS total FROM preferences WHERE qid=".$row['q_id']."");
	 $cresult = mysqli_query($con,"SELECT * FROM preferences WHERE qid=".$row['q_id']." AND uid='".$_SESSION['user']."'");
	 $cyes = mysqli_query($con,"SELECT COUNT(uid) AS totalyes FROM preferences WHERE qid=".$row['q_id']." AND response=1");
	 $cneu = mysqli_query($con,"SELECT COUNT(uid) AS totalneu FROM preferences WHERE qid=".$row['q_id']." AND response=0");
	 $cno = mysqli_query($con,"SELECT COUNT(uid) AS totalno FROM preferences WHERE qid=".$row['q_id']." AND response=-1");
	 $data = mysqli_fetch_array($cresult);
	 $data_yes = mysqli_fetch_array($cyes);
	 $count_yes = $data_yes['totalyes'];
	 $data_neu = mysqli_fetch_array($cneu);
	 $count_neu = $data_neu['totalneu'];
	 $data_no = mysqli_fetch_array($cno);
	 $count_no = $data_no['totalno'];
	 $total_count =$count_yes + $count_neu + $count_no;
	 $yes_width = ($count_yes/$total_count)*100;
	 $neu_width = ($count_neu/$total_count)*100;
	 $no_width = ($count_no/$total_count)*100;
	 //$count = $data['total'];
/*	 if($count==1){
  echo  '<br><input type="checkbox" name='.$row["q_id"].' value="1" checked></input>' . $row['question'];}
     else
	echo '<br><input type="checkbox" name='.$row["q_id"].' value="1"></input>' . $row['question']; 
}*/
/*	 if($count==1){
  echo $row['question'] . '<br><br><input type="radio" name='.$row["q_id"].' value="1" checked="checked">Yes</input><input type="radio" name='.$row["q_id"].' value="0">Neutral</input><input type="radio" name='.$row["q_id"].' value="-1">No</input><br><br>';}
     else
	echo $row['question'] . '<br><br><input type="radio" name='.$row["q_id"].' value="1">Yes</input><input type="radio" name='.$row["q_id"].' value="0" checked="checked">No</input><br><br>'; 
	*/
	echo '<div class="quest">'. $row['question'] . '</div><div class="stat_bar"><div class="yes" style="width:'.$yes_width.'%;"></div><div class="neutral" style="width:'.$neu_width.'%;"></div><div class="no" style="width:'.$no_width.'%;"></div></div>';
	if($row_main['categoryname']=="Political Contribution"){
	 if($data['response']==1)
		echo '<br><br><input type="radio" name='.$row["q_id"].' id="'.$row["q_id"].'1" value="1" checked="checked">
								<label for="'.$row["q_id"].'1"><span class="yes_rad"></span>Democrat</label>
								<input type="radio" name='.$row["q_id"].' id="'.$row["q_id"].'0" value="0">
								<label for="'.$row["q_id"].'0"><span class="neu_rad"></span>Neutral</label>
								<input type="radio" name='.$row["q_id"].' id="'.$row["q_id"].'-1" value="-1">
								<label for="'.$row["q_id"].'-1"><span class="no_rad"></span>Republican</label><br><br>';
	else if($data['response']==-1)
		echo  '<br><br><input type="radio" name='.$row["q_id"].' id="'.$row["q_id"].'1" value="1">
								<label for="'.$row["q_id"].'1"><span class="yes_rad"></span>Democrat</label>
								<input type="radio" name='.$row["q_id"].' id="'.$row["q_id"].'0" value="0">
								<label for="'.$row["q_id"].'0"><span class="neu_rad"></span>Neutral</label>
								<input type="radio" name='.$row["q_id"].' id="'.$row["q_id"].'-1" value="-1" checked="checked">
								<label for="'.$row["q_id"].'-1"><span class="no_rad"></span>Republican</label><br><br>';
	else
				echo  '<br><br><input type="radio" name='.$row["q_id"].' id="'.$row["q_id"].'1" value="1">
								<label for="'.$row["q_id"].'1"><span class="yes_rad"></span>Democrat</label>
								<input type="radio" name='.$row["q_id"].' id="'.$row["q_id"].'0" value="0" checked="checked">
								<label for="'.$row["q_id"].'0"><span class="neu_rad"></span>Neutral</label>
								<input type="radio" name='.$row["q_id"].' id="'.$row["q_id"].'-1" value="-1">
								<label for="'.$row["q_id"].'-1"><span class="no_rad"></span>Republican</label><br><br>';
	}
	else{
	if($data['response']==1)
		echo '<br><br><input type="radio" name='.$row["q_id"].' id="'.$row["q_id"].'1" value="1" checked="checked">
								<label for="'.$row["q_id"].'1"><span class="yes_rad"></span>Yes</label>
								<input type="radio" name='.$row["q_id"].' id="'.$row["q_id"].'0" value="0">
								<label for="'.$row["q_id"].'0"><span class="neu_rad"></span>Neutral</label>
								<input type="radio" name='.$row["q_id"].' id="'.$row["q_id"].'-1" value="-1">
								<label for="'.$row["q_id"].'-1"><span class="no_rad"></span>No</label><br><br>';
	else if($data['response']==-1)
		echo  '<br><br><input type="radio" name='.$row["q_id"].' id="'.$row["q_id"].'1" value="1">
								<label for="'.$row["q_id"].'1"><span class="yes_rad"></span>Yes</label>
								<input type="radio" name='.$row["q_id"].' id="'.$row["q_id"].'0" value="0">
								<label for="'.$row["q_id"].'0"><span class="neu_rad"></span>Neutral</label>
								<input type="radio" name='.$row["q_id"].' id="'.$row["q_id"].'-1" value="-1" checked="checked">
								<label for="'.$row["q_id"].'-1"><span class="no_rad"></span>No</label><br><br>';
	else
				echo  '<br><br><input type="radio" name='.$row["q_id"].' id="'.$row["q_id"].'1" value="1">
								<label for="'.$row["q_id"].'1"><span class="yes_rad"></span>Yes</label>
								<input type="radio" name='.$row["q_id"].' id="'.$row["q_id"].'0" value="0" checked="checked">
								<label for="'.$row["q_id"].'0"><span class="neu_rad"></span>Neutral</label>
								<input type="radio" name='.$row["q_id"].' id="'.$row["q_id"].'-1" value="-1">
								<label for="'.$row["q_id"].'-1"><span class="no_rad"></span>No</label><br><br>';
								}
}
}
	echo '<br><br><input type="submit" value=""></submit></form></div>
	<script>
	function checkCb(){
	//document.getElementById("d-cont").style.background="black";
	}
	</script>
</body>
</html>
';
}
else{
session_destroy();
header("Location: index.php");
}
?>