<?php

$json_url = "http://nimit.me/code/ravi";
$json = file_get_contents($json_url,0, null);
$obj = json_decode($json,true);
$val = $obj[0];
foreach($val as $n => $na)
	echo $n . " " . $na . '<br>';
?>