<?php
session_start();
require_once('config.php');


$email = $_POST['email'];
$password = sha1($_POST['password']);


$sql = "SELECT id FROM users WHERE email = ? AND password = ? LIMIT 1";
$stmtselect  = $db->prepare($sql);
$result = $stmtselect->execute([$email, $password]);

if($result){
	$user = $stmtselect->fetch(PDO::FETCH_ASSOC);
	if($stmtselect->rowCount() > 0){
		$_SESSION['userlogin'] = $user;
		echo '1';
	}else{
		echo '0';		
	}
}else{
	echo 'There were errors while connecting to database.';
}