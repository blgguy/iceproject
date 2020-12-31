<?php
//start session
session_start();
// include class file.
require_once('engine.class.php');
// call the class obj
$user = new engine();
//redirect if logged in
if ($user->im_logIn()) {
	$user->rd('../dashboard.php');
}
if(isset($_POST['signInBtn'])){
	$username = esc($_POST['userId']);
	$password = esc($_POST['passID']);
	$ppp = md5($password);
    //$pass = md5($password);

	$auth = $user->admLogin($username, $ppp);
	if(!$auth){
		$_SESSION['icebsjvca763rscMssg'] = 'Invalid login details';
		$user->rd('../index.php');
	}else{
	// Log file...
		$address[] = "Email: $username";
		$address[] = "Date: ".date('d/m/Y');
		$address[] = "Time: ".date('h:m:s a');
		$address[] = "System: ".$_SERVER['HTTP_USER_AGENT'];
		$fh = fopen("logs.txt","a");
		$c = count($address);
		for ($i=0;$i<$c;$i++)
		{
		fwrite($fh,$address[$i]."\n");

		} 
		fwrite($fh," 0 ---------------------- 1 "."\n");
		fclose($fh);
	// end log file...

		$_SESSION['icejkbcd87ryhsdcv386easbcdfg8732rhscve8wwe'] = $auth;
		$dt = date('d/m/Y');
		$tm = date('h:m:s a');
		$ip = $_SERVER['REMOTE_ADDR'];
		$user->signInLog($auth, $username, $dt, $tm, $ip);
		$user->rd('../dashboard.php');
	}
}

/**
*inside isset()
$passHashed = $user->PassHash($password.'k');
	$passVerify = $user->PassVer($password, $passHashed);
	echo "<h2>".$_SESSION['icebsjvca763rscMssg'] = $passVerify."</h2>";
	if (!$passVerify) {
		$_SESSION['icebsjvca763rscMssg'] = 'Invalid password';
		$user->rd('../index.php');
	}else{
		$auth = $user->admLogin($username, $password);
		if(!$auth){
			//$_SESSION['icebsjvca763rscMssg'] = 'Invalid username';
			$user->rd('../index.php');
		}
		else{
			$_SESSION['icejkbcd87ryhsdcv386easbcdfg8732rhscve8wwe'] = $auth;
			$user->rd('../dashboard.php');
		}
	}
**/
?>
