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

/**
$nameArr = json_decode($_POST["name"]);
$emailArr = json_decode($_POST["quantity"]);
$staffArr = json_decode($_POST["staff"]);
$branchArr = json_decode($_POST["branch"]);
$con=mysqli_connect("localhost","root","","central_db");
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
for ($i = 0; $i < count($nameArr); $i++) {
if(($nameArr[$i] != "")){ // not allowing empty values and the row which has been removed.
$sql="INSERT INTO enofthedaycash (`name`, `quantity`, `staff`, `branch`,  `date`)
VALUES
('$nameArr[$i]','$emailArr[$i]','$staffArr[$i]','$branchArr[$i]', NOW() )";
if (!mysqli_query($con,$sql))
{
die('Error: ' . mysqli_error($con));
}
}
}
Print "Data added Successfully !";
mysqli_close($con);
**/

	$items 		= json_decode($_POST["name"]);
	$quantity 	= json_decode($_POST["quantity"]);
	$staff 		= json_decode($_POST["staff"]);
	$branch 	= json_decode($_POST["branch"]);
	$reason 	= json_decode($_POST["reason"]);
	$difference = json_decode($_POST["difference"]);

	for ($i = 0; $i < count($items); $i++) {
		if(($items[$i] != "")){
  			$date     =  date('d/m/Y');
  			$time     =  date('h:m:s a');
  			$create   = $user->itemsReturn($items[$i], $quantity[$i], $staff[$i], $branch[$i], $reason[$i], $difference[$i], $date, $time);
		    if ($create) {
		      print "successfully added return Item";
		    }else{
		      print "having some issue adding Item";
		    }
  		}
  	}

/**
	//Print "Data added Successfully !";
// mysqli_close($con);


  if (empty($title)) {
    echo "<script> alert('you cannot submit empty field'); </script>";
  }else{
  $create     = $user->addItems($items, $quantity, $staff, $branch, $reason, $difference, $date, $time);
    if ($create) {
      echo "<script> alert('successfully added new Item'); </script>";
    }else{
      echo "<script> alert('having some issue adding Item'); </script>";
    }
  }

}
**/
?>