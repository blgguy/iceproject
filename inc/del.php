<?php
//start session
session_start();
// include class file.
require_once('engine.class.php');
// call the class obj
$user = new engine();
//redirect if not logged in
if (!$user->im_logIn() || (trim ($user->session()) == '')) {
  $user->rd('signout.php');
}
$ky = $_GET['del'];

$del = $user->dataDel('mem74fi4rdh', $ky);
if ($del) {
	$_SESSION['icebsjvca763rscMssg'] = 'Successfully deleted a Staff';
	$user->rd('../staff.php');
}else{
	$_SESSION['icebsjvca763rscMssg'] = 'Having some issues';
	$user->rd('../staff.php');
}
