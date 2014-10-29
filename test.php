<?php

$json_url = "http://localhost/capstone/webservice/login.php";
$json = file_get_contents($json_url,0, null);
$obj = json_decode($json,true);
$val = $obj[0];
echo $obj;
//foreach($val as $n => $na)
	//echo $n . " " . $na . '<br>';
?>