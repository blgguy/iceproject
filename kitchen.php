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
foreach ($details as $key) {
    $role     = $key['codeKey'];
    $staffId  = $key['username'];
}
$itms = $user->view('items78fyu');
$returnItems  = $user->view('itemsreturn');

if($role !== 'kitchen'){
  $user->rd('dashboard.php');
}
if (isset($_POST['addItems'])) {

  $title  =  esc($_POST['items']);
  if (empty($title)) {
    echo "<script> alert('you cannot submit empty field'); </script>";
  }else{
  $create     = $user->addItems($title);
    if ($create) {
      echo "<script> alert('successfully added new Item'); </script>";
    }else{
      echo "<script> alert('having some issue adding Item'); </script>";
    }
  }

}


if (isset($_POST['sendItems'])) {
  $itemsi    =  esc($_POST['items']);
  $quantityi =  esc($_POST['quantity']);
  $branchi   =  esc($_POST['branch']);
  $datei     = date('d/m/Y');
  $timei     = date('h:m: a');
  if (empty($quantityi) || empty($branchi)) {
    echo "<script> alert('you cannot submit empty field'); </script>";
  }else{
  $create     = $user->addBranchItems($itemsi, $quantityi, $branchi, $datei, $timei);
    if ($create) {
      echo "<script> alert('successfully added new Item'); </script>";
    }else{
      echo "<script> alert('having some issue adding Item'); </script>";
    }
  }

}
?>
<!DOCTYPE html>
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: transparent;
    height:auto;
    margin:0 auto;
}

/* Style the buttons inside the tab */
.tab button {
  font-weight: bold;
  background: transparent;
  
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 15px;
  font-family: Georgia, 'Times New Roman', Times, serif;
}

/* Change background color of buttons on hover */
.tab button:hover {
  color:#ff7846;
}

/* Create an active/current tablink class */
.tab button.active {
  color:#ff7846;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}


.topnav {
  overflow: hidden;
  background-color: transparent;
}

.topnav a {
  float: left;
  display: block;
  color: #ff7846;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.active {
  background-color: transparent;
  color: #ff7846;
}

.topnav .icon {
  display: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 17px;    
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.topnav a:hover, .dropdown:hover .dropbtn {
  background-color: #555;
  color: white;
}

.dropdown-content a:hover {
  background-color: #ddd;
  color: black;
}

.dropdown:hover .dropdown-content {
  display: block;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}
    </style>
  </head>
  <body>
  <div class="container">


  <div class="topnav" id="myTopnav">
  <a href="#home" class="active">Dashboard</a>
  <a href="profile.php">Profiles</a>
 
  <a href="signout.php">Sign Out</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>

<div style="padding-left:16px">
</div>

  <div class="tab">
  <button class="tablinks" onclick="openCity(event, 'items')">ADD ITEMS</button>
  <button class="tablinks" onclick="openCity(event, 'cash')">SEND ITEMS TO BRANCH</button>
  <button class="tablinks" onclick="openCity(event, 'returns')">RETURNS ITEMS</button>
  <button class="tablinks" onclick="openCity(event, 'requested')">ITEMS REQUESTED</button>
  <a style="text-decoration: none; color: #000;" href="rp/ktchprnt.php"><button class="tablinks">Print report for today's <?php echo date('l');?></button></a>
</div>

<!-- ADD ITEMS -->
<div id="items" class="tabcontent">
<div class="table-responsive">
<table class="table">
  <thead class="thead-light">
    <p>Add Items to your kitchen</p>
   
  </thead>
  <tbody>
  <form method="post">
      <tr>
      <td><input type="text" value="ITEMS" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
      <td><input type="text" name="items" class="form-control" id="inputDefault"></td>
                     
      </tr>
      <tr>
      <td><input type="submit" name="addItems" value="Save"  class="form-control btn btn-dark" id="readOnlyInput"></td>
      </tr>
    </form>
    </tbody>
</table>
</div>
</div>
<!--END-->

<!--RETURNS ITEMS-->
<div id="returns" class="tabcontent">
<div class="table-responsive">
<table class="table">
  <thead class="thead-light">
    <p>Returned Items from branch</p>
  </thead>
  <tbody>
    <form method="post">
    <tr>
      <td> 
        <select name="branch" id="branch" class="form-control" required>
            <option value="Diplomatic Quarter">Diplomatic Quarter</option>
            <option value="Riyard Front">Riyard Front</option>
            <option value="Riyard Park">Riyard Park</option>
        </select> </td>
      <td><input type="submit" name="itemsReturn" value="View"  class="form-control btn btn-dark" id="readOnlyInput"></td>
    </tr>
  </form>
  </tbody>
</table>
<?php
if (isset($_POST['itemsReturn'])) {
  $brnchh = $_POST['branch'];
  if ($brnchh == 'Riyard Park') {
      $branchView   = $user->viewByBranch('itemsreturn', $brnchh);
    }elseif($brnchh == 'Diplomatic Quarter'){
      $branchView   = $user->viewByBranch('itemsreturn', $brnchh);
    }elseif($brnchh == 'Riyard Front'){
      $branchView   = $user->viewByBranch('itemsreturn', $brnchh);
    }
//**
    if (!$branchView) {
     echo "Having some issues on our system today".date('l');
    }
//
    foreach ($branchView as $keyyy) {
       $vvdateee    = $keyyy['date'];
       $currentDate = date('d/m/Y');
    }
  
    if ($vvdateee !== $currentDate) {
            echo "No Items Return Today ".date('l');
          }else{
    ?>

  <table class="table">
  <thead class="thead-light">
    <p>Branch Returned Items</p>
    <tr>
      <td><input type="text" value="ITEMS" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
      <td><input type="text" value="QUANTITY" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
      <td><input type="text" value="STAFF" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
      <td><input type="text" value="BRANCH" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
      <td><input type="text" value="DIFFERNCE" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
      <td><input type="text" value="REASON" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($branchView as $vv) {
      $vvuniqKey = $vv['uniqKey'];
      $vvitems = $vv['items'];
      $vvquantity = $vv['quantity'];
      $vvstaff = $vv['staff'];
      $vvbranch = $vv['branch'];
      $vvreason = $vv['reason'];
      $vvdifference = $vv['difference'];
      $vvdate = $vv['date'];
?>

  <tr>
    <td><?php echo $vvitems; ?></td>
    <td><?php echo $vvquantity; ?></td>
    <td><?php echo $vvstaff; ?></td>
    <td><?php echo $vvbranch; ?></td>
    <td><?php echo $vvreason; ?></td>
    <td><?php echo $vvdifference; ?></td>
  </tr>
  <?php
    }
  }
}
?>
</tbody>
</table>
</div>
</div>
<!--END-->

<!--ITEMS REQUESTED-->

<div id="requested" class="tabcontent">
<div class="table-responsive">
<table class="table">
  <thead class="thead-light">
    <p>Requested Items from branch</p>
  </thead>
  <tbody>
    <form method="post">
    <tr>
      <td> 
        <select name="branch" id="branch" class="form-control" required>
            <option value="Diplomatic Quarter">Diplomatic Quarter</option>
            <option value="Riyard Front">Riyard Front</option>
            <option value="Riyard Park">Riyard Park</option>
        </select> </td>
      <td><input type="submit" name="itemsRequseted" value="View"  class="form-control btn btn-dark" id="readOnlyInput"></td>
    </tr>
  </form>
  </tbody>
</table>
<?php
if (isset($_POST['itemsRequseted'])) {
  $brnchh = $_POST['branch'];
  $dateeee = date('d/m/Y');
  if ($brnchh == 'Riyard Park') {
      $branchView   = $user->viewByDate('requestitems', $dateeee, $brnchh);
    }elseif($brnchh == 'Diplomatic Quarter'){
      $branchView   = $user->viewByDate('requestitems', $dateeee, $brnchh);
    }elseif($brnchh == 'Riyard Front'){
      $branchView   = $user->viewByDate('requestitems', $dateeee, $brnchh);
    }
//**
    if (!$branchView) {
     echo "Having some issues on our system today".date('l');
    }
//
    foreach ($branchView as $keyyy) {
       $vvdateee    = $keyyy['date'];
    }
  
    if ($vvdateee !== $dateeee) {
            echo "No Items Return Today ".date('l');
          }else{
    ?>

  <table class="table">
  <thead class="thead-light">
    <p>Branch Requested Items</p>
    <tr>
      <td><input type="text" value="ITEMS" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
      <td><input type="text" value="QUANTITY" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
      <td><input type="text" value="STAFF" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
      <td><input type="text" value="BRANCH" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($branchView as $vv) {
      $vvuniqKey  = $vv['uniqKey'];
      $vvitems    = $vv['items'];
      $vvquantity = $vv['quantity'];
      $vvstaff    = $vv['staff'];
      $vvbranch   = $vv['branch'];
      $vvdate     = $vv['date'];
?>

  <tr>
    <td><?php echo $vvitems; ?></td>
    <td><?php echo $vvquantity; ?></td>
    <td><?php echo $vvstaff; ?></td>
    <td><?php echo $vvbranch; ?></td>
  </tr>
  <?php
    }
  }
}
?>
</tbody>
</table>
</div>
</div>
<!--END ITEMS REQUESTED-->

<div id="cash" class="tabcontent">
<div class="table-responsive">
<table class="table">
  <thead class="thead-light">
  <tr>
    <th>Items</th>
    <th>Quantities</th>
    <th>Branch</th>
  </tr>
  </thead>
  <form action="" method="post">
  <tbody>
    <tr>
       <td> <select name="name" class="form-control" id="name" required>
          <?php foreach ($itms as $itm) { $list = $itm['title'];?>
              <option type="text" value="<?php echo $list;?>" class="form-control"><?php echo $list;?></option>
          <?php }?>
        </select> </td>
      <td><input type="text" name="quantity" id="quantity" class="form-control" id="inputDefault" required=""></td>
      <td><input type="text" hidden name="staff" id="staff" value="<?php echo $staffId; ?>" class="form-control" id="inputDefault"></td>
       <td> 
        <select name="branchii" id="branchii" class="form-control" required>
            <option value="Diplomatic Quarter">Diplomatic Quarter</option>
            <option value="Riyard Front">Riyard Front</option>
            <option value="Riyard Park">Riyard Park</option>
        </select> </td>
    </tr>
  </tbody>
</table>
<div class="form-group">
      <input type="button" name="send" class="btn btn-primary" value="add data" id="sendItems">
      <input type="button" name="itemsSends" class="btn btn-primary" value="Save to database" id="itemsSend">
    </div>

    <table id="table" name="table" class="table table-bordered" >
      <tbody>
      <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Quantity</th>
      <th>Branch</th>
      <th>Action</th>
      </tbody>
    </table>

</div>
</div>
</div>

<script>
$(document).ready(function() {
var id = 1; 
/*Assigning id and class for tr and td tags for separation.*/
$("#sendItems").click(function() {
var newid = id++; 
$("#table").append('<tr valign="top" id="'+newid+'">\n\
<td width="100px" >' + newid + '</td>\n\
<td width="100px" class="name'+newid+'">' + $("#name").val() + '</td>\n\
<td width="100px" class="quantity'+newid+'">' + $("#quantity").val() + '</td>\n\
<td width="100px" class="branchii'+newid+'">' + $("#branchii").val() + '</td>\n\
<td width="100px" hidden class="staff'+newid+'">' + $("#staff").val() + '</td>\n\
<td width="100px"><a href="javascript:void(0);" class="remCF">Remove</a></td>\n\ </tr>');

});
$("#table").on('click', '.remCF', function() {
$(this).parent().parent().remove();
});
/*crating new click event for save button*/
$("#itemsSend").click(function() {
var lastRowId = $('#table tr:last').attr("id"); /*finds id of the last row inside table*/
var name = new Array(); 
var quantity = new Array();
var branchii = new Array();
var staff = new Array();
for ( var i = 1; i <= lastRowId; i++) {
name.push($("#"+i+" .name"+i).html()); /*pushing all the names listed in the table*/
quantity.push($("#"+i+" .quantity"+i).html());
branchii.push($("#"+i+" .branchii"+i).html()); /*pushing all the emails listed in the table*/
staff.push($("#"+i+" .staff"+i).html()); /*pushing all the emails listed in the table*/
}
var sendName = JSON.stringify(name); 
var sendQuantity = JSON.stringify(quantity);
var sendBranch = JSON.stringify(branchii);
var sendStaff = JSON.stringify(staff);
$.ajax({
url: "inc/data-send.php",
type: "post",
data: {name : sendName , quantity : sendQuantity , branchii : sendBranch, staff : sendStaff},
success : function(data){
alert(data); /* alerts the response from php.*/
}
});
});
});
</script>

<!-- another secript-->
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
