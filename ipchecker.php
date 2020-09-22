<?php 
// check for ip address shared internet
if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
	# code...
	$IP = $_SERVER["HTTP_CLIENT_IP"];
}elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
	# code...
	//check for ip address proxy server
	$IP = $_SERVER["HTTP_X_FORWARDED_FOR"];
}else{
	$IP = $_SERVER["REMOTE_ADDR"];
}
// echo "$IP";
 