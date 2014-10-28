<?php
$uname = $_POST['username'];
$pwd = $_POST['password'];
$con = mysqli_connect("localhost","root","","shopvote");
if(mysqli_connect_errno())
echo "Failed" . mysqli_connect_error();
$result = mysqli_query($con,"SELECT * FROM usersdb WHERE username='" . $uname . "' AND password='" . $pwd . "'");
while($row = mysqli_fetch_array($result)) {
  $output[] = $row;
}
$count = mysqli_num_rows($result);
if($count==1){
$outputV = "Successful";
}
else{
$outputV = "Invalid";
}
$json_output = json_encode($output);
$json_dec = json_decode($json_output);
$json_dec['status'] = $outputV;
$json_output = json_encode($json_dec);
echo $json_output;
mysqli_close($con);
?>