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
$logs = $user->view('logstable');
foreach ($details as $key) {
    $fName    = $key['firstName'];
    $lName    = $key['lastName'];
    $email    = $key['email'];
    $username = $key['username'];
    $role     = $key['codeKey'];
    $lName    = $key['dateJoined'];
}
if ($role === 'branch') {
  $user->rd('branch.php');
}elseif($role === 'kitchen'){
  $user->rd('kitchen.php');
}elseif($role === 'admin'){
?>
<html>
  <head>
    <title>ICE-CREAM</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
  <div class="container">


  <div class="topnav" id="myTopnav">
  <a href="#home" class="active">Dashboard</a>
  <a href="profile.php">profile</a>
  <a href="staff.php">Staff</a>
 
  <a href="signout.php">Sign Out</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>

<div style="padding-left:16px">
</div>

  <div class="tab">
  <button class="tablinks" onclick="openCity(event, 'items')">SignIn Logs</button>
  <a style="text-decoration: none;" href="rp/staffPrnt.php"><button class="tablinks">Print All Staff</button></a>
  <a style="text-decoration: none;" href="rp/allbrnch.php"><button class="tablinks">Print All Branch report</button></a>
  <a style="text-decoration: none;" href="rp/allkitchen.php"><button class="tablinks">Print All Kitchen report</button></a>
</div>

<div id="items" class="tabcontent">
<div class="table-responsive">
<table class="table">
  <thead class="thead-light">
    <a href="inc/logs.txt"><button class="btn btn-sucess" style="color: maroon; float: left; text-decoration: none;"> Download Logs </button></a>
    <tr>  
      <th>User Id</th>
      <th>Ip Address</th>
      <th>Date</th>
      <th>Time</th>
    </tr>
  </thead>
  <?php
    foreach ($logs as $log) {  
      $kyyy     = $log['userKey'];
      $Username = $log['username'];
      $datt     = $log['date'];
      $timm     = $log['time'];
      $ipAdd    = $log['ipAddress'];
    
  ?>
  <tr>
    <td><input type="text" class="form-control"  value="<?php echo $Username;?>" id="readOnlyInput" readonly=""></td>
    <td><input type="text" class="form-control"  value="<?php echo $ipAdd;?>" id="readOnlyInput" readonly=""></td>
    <td><input type="text" class="form-control"  value="<?php echo $datt;?>" id="readOnlyInput" readonly=""></td>
    <td><input type="text" class="form-control"  value="<?php echo $timm;?>" id="readOnlyInput" readonly=""></td>            
  </tr>
    <?php }?>
  </tbody>
</table>
</div>

</div>



  </div>
  <script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
  </body>
</html>
<?php } ?>