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
$ky = $user->session();
$details = $user->viewById('mem74fi4rdh', $ky);
foreach ($details as $key) {
    $role     = $key['codeKey'];
    $Name     = $key['firstName'].' '.$key['lastName'];
    $branch   = $key['branch'];
}
$itms = $user->items();
if($role !== 'branch'){
  $user->rd('dashboard.php');
}

	$items 		= json_decode($_POST["ItemsnameR"]);
	$quantity 	= json_decode($_POST["ItemsquantityR"]);
	$staff 		= json_decode($_POST["ItemsstaffR"]);
	$branch 	= json_decode($_POST["ItemsbranchR"]);

	for ($i = 0; $i < count($items); $i++) {
		if(($items[$i] != "")){
  			$date     =  date('d/m/Y');
  			$time     =  date('h:m:s a');
  			$create   = $user->itemsRequest($items[$i], $quantity[$i], $staff[$i], $branch[$i], $date, $time);
		    if ($create) {
		      echo "successfully added sent Items";
		    }else{
		      print "having some issue adding Item";
		    }
  		}
  	}
?>