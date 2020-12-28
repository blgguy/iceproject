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
  <button class="tablinks" onclick="openCity(event, 'items')">Print Report</button>
</div>

<div id="items" class="tabcontent">
<div class="table-responsive">
<table class="table">
  <thead class="thead-light">
    <tr>
    <th>Items</th>
                    <th>Recieved</th>
                    <th>Return</th>
                    <th>Different</th>
                    <th>Reason</th>
    </tr>
  </thead>
  <tr>
    <td><input type="text" value="Cups" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                   
    </tr>
    <tr>
    <td><input type="text" value="Cups" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                   
    </tr>
    <tr>
    <td><input type="text" value="Cups" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                   
    </tr>
    <tr>
    <td><input type="text" value="Cups" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                   
    </tr>
    <tr>
    <td><input type="text" value="Cups" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                   
    </tr>
    <tr>
    <td><input type="text" value="Cups" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                   
    </tr>
    <tr>
    <td><input type="text" value="Cups" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                   
    </tr>
    <tr>
    <td><input type="text" value="Cups" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                   
    </tr>
    <tr>
    <td><input type="text" value="Cups" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
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

<div id="cash" class="tabcontent">
<div class="table-responsive">
<table class="table">
  <thead class="thead-light">
  <tr>
                    <th>Cash end of the Day</th>
                    <th>Quantities</th>
                   </tr>
                </thead>
                <form action="" method="POST">
                <tbody>
                  <tr>
                    <td><input type="text" value="500X" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                   </tr>
                  <tr>
                    <td><input type="text" value="100X" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                   </tr>
                  <tr>
                    <td><input type="text" value="50X" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                    </tr>
                  <tr>
                    <td><input type="text" value="10X" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                   </tr>
                  <tr>
                    <td><input type="text" value="5X" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                    </tr>
                  <tr>
                    <td><input type="text" value="1X" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                    </tr>
                  <tr>
                    <td><input type="text" value="Total Exepenses" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                    </tr>
                  <tr>
                    <td><input type="text" value="Total Delivery" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                     </tr>
                  <tr>
                    <td><input type="text" value="Total Cash" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                     </tr>
                  <tr>
                    <td><input type="text" value="ATM" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                   </tr>
                  <tr>
                    <td><input type="text" value="Total Discount" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                    </tr>
                  <tr>
                    <td><input type="text" value="Total sales" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                    </tr>
                  <tr>
                    <td><input type="text" value="Sales In System" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" class="form-control" id="inputDefault"></td>
                   </tr>
                  <tr>
                    <td><input type="text" value="DIFFERENT" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
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


<div align="center">
  <h1>Under Maintainance</h1>
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