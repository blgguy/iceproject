<?php
//start session
session_start();
// include class file.
require_once('inc/engine.class.php');
// call the class obj
$user = new Engine();
//redirect if not logged in
if (!$user->im_logIn() || (trim ($user->session()) == '')) {
  $user->rd('signout.php');
}
$ky = $user->session();
$details = $user->viewById('mem74fi4rdh', $ky);
foreach ($details as $key) {
    $fName    = $key['firstName'];
    $lName    = $key['lastName'];
    $email    = $key['email'];
    $username = $key['username'];
    $role     = $key['codeKey'];
    $lName    = $key['branch'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>profile | <?php echo $fName; ?></title>
</head>
<body>
<div align="center">
  <h1>WORKING ON PROFILE</h1>
</div>
<?php
if ($role === 'branch') {
  echo 'welcome Branch';
  echo "<a href='dashboard.php'>Back</a>";
}elseif($role === 'kitchen'){
  echo 'welcome Kitchen';
  echo "<a href='dashboard.php'>Back</a>";
}elseif($role === 'admin'){
echo 'welcome to Main Admin';
echo "<a href='dashboard.php'>Back</a>";
}
?>
</body>
</html>
