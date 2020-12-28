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

	$Itemsname 		  = json_decode($_POST["Itemsname"]);
	$Itemsquantity 	= json_decode($_POST["Itemsquantity"]);
	$Itemsstaff 		  = json_decode($_POST["Itemsstaff"]);
	$Itemsbranch 	  = json_decode($_POST["Itemsbranch"]);

	for ($i = 0; $i < count($items); $i++) {
		if(($items[$i] != "")){
  			$date     =  date('d/m/Y');
  			$time     =  date('h:m:s a');
  			$create   = $user->itemsleft($branch[$i], $staff[$i], $date[$i], $time[$i], $items[$i], $quantity[$i]);
		    if ($create) {
		      print "successfully added left items";
		    }else{
		      print "having some issue adding Item";
		    }
  		}
  	}
?>