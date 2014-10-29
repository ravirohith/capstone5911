<?php
$uname = $_POST['username'];
$pwd = md5(sha1($_POST['password']));
$con = mysqli_connect("localhost","root","","shopvote");
if(mysqli_connect_errno())
echo "Failed" . mysqli_connect_error();
$result = mysqli_query($con,"SELECT * FROM admin WHERE username='" . $uname . "' AND password='" . $pwd . "'");
/*while($row = mysqli_fetch_array($result)) {
  echo $row['username'];
  echo "<br>";
}*/
$count = mysqli_num_rows($result);
if($count==1){
session_start();
$_SESSION['user']=$uname;
header("Location: admin_dashboard.php");
}
else{
echo "Invalid Login";
}
?>