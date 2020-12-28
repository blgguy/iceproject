<?php

//start session
session_start();
// include class file.
require_once('inc/engine.class.php');
// call the class obj
$user = new engine();
//redirect if not logged in

if (!$user->im_logIn() || (trim ($user->session()) == '')) {
  $user->rd('signout.php');
}

$ky = $user->session();
$details = $user->viewById('mem74fi4rdh', $ky);
$staffs = $user->viewNoAdmin();
foreach ($details as $key) {
    $role     = $key['codeKey'];
}
$branchs = $user->branch();

if($role !== 'admin'){
  $user->rd('dashboard.php');
}

if (isset($_POST['saveStaffBtn'])) {

  $firstname  =  esc($_POST['fname']);
  $lasttname  =  esc($_POST['lname']);
  $email      =  esc($_POST['email']);
  $passwd     =  esc($_POST['pass']);
  //$usernm     =  esc($_POST['username']);
  $rol        =  esc($_POST['admns']);
  
  $brnch      =  esc($_POST['branch']);
  if ($rol === 'kitchen') {
    $brnch = 'nill';
  }
/**
  $str = str_replace(' ', '', $brnch);
  $brn = substr($str, 0, 2);
  $brn = strtoupper($brn);
  $rdd = rand(34567, 45432);
  $dtt = date('y');
  $randm = $dtt.'/'.$brn.'/'.$rdd;

**/
  $dtt = '0987654321';
  $dtt = str_shuffle($dtt);
  $dtt = substr($dtt, 0, 3);
  if ($brnch == 'Diplomatic Quarter'){
      $check = 'DQ';
      $usernm = 'STF/'.$check.'/'.$dtt;
    }elseif($brnch == 'Riyard Front'){
      $check = 'RF';
      $usernm = 'STF/'.$check.'/'.$dtt;
    }elseif($brnch == 'Riyard Park'){
      $check = 'RP';
      $usernm = 'STF/'.$check.'/'.$dtt;
    }else{
      $usernm = 'STF/KTC/'.$dtt;
    }

if (empty($firstname) || empty($lasttname) || empty($email) || empty($passwd) || empty($rol)) {
    echo "<script> alert('you can not leave empty field'); </script>";
  }else{
    $passs  = $user->PassHash($passwd);
    $create = $user->addStaff($firstname, $lasttname, $email, $passs, $usernm, $rol, $brnch);
    if ($create) {
      echo "<script> alert('successfully added new staff'); </script>";
    }else{
      echo "<script> alert('having some issue'); </script>";
    }
  }

}
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
  <a href="dashboard.php" class="active">Dashboard</a>
  <a href="kitchen.php">Kitchen</a>
  <a href="profile.php">profile</a>
  <a href="staff.php" class="active">Staff</a>
 
  <a href="signout.php">Sign Out</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>

<div style="padding-left:16px">
</div>

  <div class="tab">
    <button class="tablinks" onclick="openCity(event, 'userr')">Add Users</button>
    <button class="tablinks" onclick="openCity(event, 'userrView')">view User</button>
    <?php
        if(isset($_SESSION['icebsjvca763rscMssg'])){
      ?>
        <?php echo "<script> alert('".$_SESSION['icebsjvca763rscMssg']."'); </script>"; ?>
    <?php
          unset($_SESSION['icebsjvca763rscMssg']);
        }
    ?>
  </div>

<div id="userr" class="tabcontent">
<div class="table-responsive">
<table class="table">
  <thead class="thead-light">
    <p>Add staff details</p><span style="color: red;">if the user is branch staff please do check his branch </span>
  </thead>
  <tbody>
    <form method="post">
    <tr>
      <td>Name</td>
      <td><input type="text" name="fname" class="form-control" id="inputDefault" placeholder="first name"></td>
      <td><input type="text" name="lname" class="form-control" id="inputDefault" placeholder="last name"></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="email" name="email" class="form-control" id="inputDefault" placeholder="email"></td>
      <td><input type="password" name="pass" class="form-control" id="inputDefault" placeholder="password"></td>
    </tr>
    
    <tr>
      <td>Admin Role</td> 
      <td>Branch 
        <input type="radio" id="admns" name="admns" checked="" value="branch"> 
        <b> | </b> Kitchen
        <input type="radio" id="admns" name="admns" value="kitchen">
      </td>
      <td>
        <select name="branch" class="form-control" required>
          <option value="Diplomatic Quarter">Diplomatic Quarter</option>
          <option value="Riyard Front">Riyard Front</option>
          <option value="Riyard Park">Riyard Park</option>
        </select> 
      </td>
    </tr>
    <input type="text" hidden name="username" value="<?php echo $randm; ?>" class="form-control" id="readOnlyInput" type="text" readonly="">
    
      <tr>
      <td><input type="submit" name="saveStaffBtn" value="Save"  class="form-control btn btn-dark"></td>
      </tr>
    </form>
  </tbody>
</table>
</div>

</div>

<div id="userrView" class="tabcontent">
<div class="table-responsive">
<table class="table">
  <thead class="thead-light">
  <tr>
    <th>Name</th>
    <th>Username</th>
    <th>Branch</th>
    <th>role</th>
    <th>Action</th>
   </tr>
      </thead>
      <tbody>
        <?php
          foreach ($staffs as $stffss) {
            $Name     = $stffss['firstName'].' '.$stffss['lastName'];
            $Username = $stffss['username'];
            $Branch   = $stffss['branch'];
            $role     = $stffss['codeKey'];
            $uniKeyy  = $stffss['id'];
          
        ?>
        <tr>
          <td><input type="text" value="<?php echo $Name; ?>" class="form-control" id="readOnlyInput" type="text" readonly=""></td>
          <td><input type="text" value="<?php echo $Username; ?>" class="form-control" id="readOnlyInput" type="text" readonly=""></td>
          <td><input type="text" value="<?php echo $Branch; ?>" class="form-control" id="readOnlyInput" type="text" readonly=""></td>
          <td><input type="text" value="<?php echo $role; ?>" class="form-control" id="readOnlyInput" type="text" readonly=""></td>
          <td><a style="text-decoration: none;cursor: pointer;" href="inc/del.php?del=<?php echo $uniKeyy; ?>"><input type="submit" value="Delete"  class="form-control btn-danger" id="readOnlyInput"></a></td>
        </tr>
      <?php }?>
  </tbody>
</table>
</div>
</div>

<div id="sign" class="tabcontent">
<div class="table-responsive">
<table class="table">
  <thead class="thead-light">
  <tr>
                    <th>NAME</th>
                    <th></th>
                   </tr>
                </thead>
                <form action="" method="POST">
                <tbody>
                  <tr>
                    <td><input type="text" value="Cups" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                    </tr>
                  <tr>
                    <td><input type="text" value="Cups" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                    </tr>
                  <tr>
                    <td><input type="text" value="Cups" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                    </tr>
                  <tr>
                    <td><input type="text" value="Cups" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                   </tr>
                  <tr>
                    <td><input type="text" value="Cups" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                    </tr>
                  <tr>
                    <td><input type="text" value="Cups" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                   </tr>
                  <tr>
                    <td><input type="text" value="Cups" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                   </tr>
                  <tr>
                    <td><input type="text" value="Cups" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                    </tr>
                  <tr>
                    <td><input type="text" value="Cups" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                     </tr>
                  <tr>
                    <td><input type="text" value="Cups" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                  </tr>
    <tr>
    <td>
      <input type="submit" value="Save"  class="form-control btn" id="readOnlyInput"></td>
                     </tr>
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