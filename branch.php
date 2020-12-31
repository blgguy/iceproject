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
    $Name     = $key['firstName'].' '.$key['lastName'];
    $branchh   = $key['branch'];
}
$itms = $user->view('sentitems', $branchh);
$allItms = $user->view('items78fyu');
if($role !== 'branch'){
  $user->rd('dashboard.php');
}


if (isset($_POST['addSignature'])) {

  $date                 = date('d/m/Y');
  $time                 = date('h:m:s a');
  $CarDiesel            = esc($_POST['CarDiesel']);
  $DeliveryCharges      = esc($_POST['DeliveryCharges']);
  $DeliveryOrder        = esc($_POST['DeliveryOrder']);
  $ATM                  = esc($_POST['ATM']);
  $Cash                 = esc($_POST['Cash']);
  $Transfer             = esc($_POST['Transfer']);
  $TotalExpemses        = esc($_POST['TotalExpemses']);
  $TotalDiscount        = esc($_POST['TotalDiscount']);
  $salesSystem          = esc($_POST['salesSystem']);
  $signature            = esc($_POST['signature']);
  $branch               = esc($_POST['brnch']);

  if (empty($CarDiesel) || empty($DeliveryCharges) || empty($DeliveryOrder) || empty($ATM) || empty($Cash) || empty($Transfer) || empty($TotalExpemses) || empty($TotalDiscount) || empty($salesSystem)) {
    echo "<script> alert('you cannot submit empty field'); </script>";
  }else{
    
    $create     = $user->addSignature($date, $time, $CarDiesel, $DeliveryCharges, $DeliveryOrder, $ATM, $Cash, $Transfer, $TotalExpemses, $TotalDiscount, $salesSystem, $signature, $branch);
    if ($create) {
      echo "<script> alert('successfully added new Item'); </script>";
    }else{
      echo "<script> alert('having some issue adding Item'); </script>";
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
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
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
    font-size: 12px;
    
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
  <a href="profile.php">Profile</a>
  <a href="saless.php">Sales Report</a>
  <a href="signout.php">LogOut</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>


<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'items')">ITEMS RECIEVED</button>
  <button class="tablinks" onclick="openCity(event, 'ItemsRequest')"> REQUEST ITEMS </button>
  <button class="tablinks" onclick="openCity(event, 'returnItems')"> ITEMS RETURN </button>
  <button class="tablinks" onclick="openCity(event, 'cash')">CASH END OF THE DAY</button>
  <button class="tablinks" onclick="openCity(event, 'sign')">SIGNATURE</button>
</div>
<?php
$dateee = date('d/m/Y');
$branchView     = $user->branchReport('sentitems', $branchh);
$branchViewDate = $user->viewByDate('sentitems', $dateee, $branchh);
?>
<div id="items" class="tabcontent">
<div class="table-responsive">
<?php
  if (!$branchView) {
     echo "Having some issues on our system today".date('l');
    }
//
    foreach ($branchView as $keyyy) {
       $vvdateee    = $keyyy['date'];
    }
    if ($vvdateee !== $dateee) {
            echo "No Items Sent Today ".date('l');
    }else{
?>
  <table class="table">
    <thead class="thead-light">
      <tr>
      <th>Items</th>
      <th>Quantity</th>
      <th>FROM</th>
      <th>DATE</th>
      <th>TIME</th>
      </tr>
    </thead>
    <tbody>
      <tr>
          <?php 
            //$branchV = $user->viewByBranch('sentitems', $branchh);
            foreach ($branchViewDate as $dtt) {
              $keyyy      = $dtt['uniqKey'];
              $itmss      = $dtt['items'];
              $quantity   = $dtt['quantity'];
              $branchhh   = $dtt['staff'];
              $dateet     = $dtt['date'];
              $timeem     = $dtt['time'];
            
          ?>
        <td><input type="text"  value="<?php echo $itmss; ?>" class="form-control" id="inputDefault" readonly=""></td>
        <td><input type="text"  value="<?php echo $quantity; ?>" class="form-control" id="inputDefault" readonly=""></td>
        <td><input type="text"  value="<?php echo $branchhh; ?>" class="form-control" id="inputDefault" readonly=""></td>
        <td><input type="text"  value="<?php echo $dateet; ?>" class="form-control" id="readOnlyInput" readonly=""></td>
        <td><input type="text"  value="<?php echo $timeem; ?>" class="form-control" id="readOnlyInput" readonly=""></td>
      </tr>
    <?php } ?>
  </tbody>
</table>
<?php } ?>
</div>
</div>


<!-- return tabled-->

<div id="returnItems" class="tabcontent">
<div class="table-responsive">
  
<?php
  if (!$branchView) {
     echo "Having some issues on our system today".date('l');
    }
//
    foreach ($branchView as $keyyyyE) {
       $vvdateeeeE    = $keyyyyE['date'];
    }
    if ($vvdateeeeE !== $dateee) {
            echo "no item recieved today, so no item to be return";
    }else{
?>

<form id="form1" name="form1" method="post">

<label for="email">Items:</label>
<select name="name" class="form-control" id="name">
  <?php foreach ($itms as $itm) { $list = $itm['items'];?>
      <option type="text" value="<?php echo $list;?>" class="form-control"><?php echo $list;?></option>
      <?php }?>
</select>


<div class="form-group">
<label for="pwd">quantity:</label>
<input type="text" name="quantity" class="form-control" id="quantity">
</div>
<div class="form-group">
<input type="text" name="staff" value="<?php echo $Name;?>" hidden class="form-control" id="staff">
</div>
<div class="form-group">
<input type="text" name="branch" value="<?php echo $branchh;?>" hidden class="form-control" id="branch">
</div>
<div class="form-group">
<label for="pwd">reasons</label>
<textarea name="reason" class="form-control" id="reason"></textarea>
<!--input type="text" name="branch" class="form-control" id="branch"-->
</div>
<div class="form-group">
<label for="pwd">difference</label>
<input type="text" name="difference" class="form-control" id="difference">
</div>
<div class="form-group">
<input type="button" name="send" class="btn btn-primary" value="add data" id="butsend">
<input type="button" name="itemsReturn" class="btn btn-primary" value="Save to database" id="butsave">
</div>
</form>

<table id="table1" name="table1" class="table table-bordered" >
<tbody>
<tr>
<th>ID</th>
<th>Name</th>
<th></th>
<th>reson</th>
<th>Difference</th>
<th>Action</th>
</tbody>
</table>
<?php }?>
</div>
</div>

<!------ end ---->

<!------ cash of the day ---->

<div id="cash" class="tabcontent">
<div class="table-responsive">

<?php
  if (!$branchView) {
     echo "Having some issues on our system today".date('l');
    }
//
    foreach ($branchView as $keyyyy) {
       $vvdateeee    = $keyyyy['date'];
    }
    if ($vvdateeee !== $dateee) {
            echo "<option>no item recieved today, so no cash of the day to be add.</option>";
    }else{
?>

<form id="form2" name="form2" method="post">

<label for="email">Name:</label>
<select name="sname" class="form-control" id="Cashname">
<option>500X</option>
<option>100X</option>
<option>50X</option>
<option>10X</option>
<option>Total Expenses</option>
<option>Total Delivery</option>
<option>Total Cash</option>
<option>Atm</option>
<option>Total Discount</option>
<option>sales in System</option>
<option>Differents</option>
</select>


<div class="form-group">
<label for="pwd">quantity:</label>
<input type="text" name="quantity" class="form-control" id="Cashquantity">
</div>
<div class="form-group">
<input type="text" name="staff" value="<?php echo $Name;?>" hidden="" class="form-control" id="Cashstaff">
</div>
<div class="form-group">
<input type="text" name="branch" value="<?php echo $branchh;?>" hidden="" class="form-control" id="Cashbranch">
</div>
<input type="button" name="sendcas" class="btn btn-primary" value="add data" id="butcash">
<input type="button" name="savecas" class="btn btn-primary" value="Save to database" id="savecash">
</form>
<table id="table" name="table" class="table table-bordered" >
<tbody>
<tr>
<th>ID</th>
<th>Name</th>
<th></th>
<th>Action</th>
<tr>
</tbody>
</table>
<?php }?>
</div>
</div>

<!-- end save-->

<!------ start items request---->

<div id="ItemsRequest" class="tabcontent">
<div class="table-responsive">
                
<form id="form4" name="form4" method="post">

<label for="email">Items:</label>
<select name="Itemssname" class="form-control" id="ItemsnameR">
  <?php foreach ($allItms as $itmR) { $listR = $itmR['title'];?>
      <option type="text" value="<?php echo $listR;?>" class="form-control"><?php echo $listR;?></option>
  <?php }?>
</select>


<div class="form-group">
<label for="pwd">quantity:</label>
<input type="text" name="Itemsquantity" class="form-control" id="ItemsquantityR">
</div>
<div class="form-group">
<input type="text" name="Itemsstaff" value="<?php echo $Name;?>" hidden="" class="form-control" id="ItemsstaffR">
</div>
<div class="form-group">
<input type="text" name="Itemsbranch" value="<?php echo $branchh;?>" hidden="" class="form-control" id="ItemsbranchR">
</div>
<input type="button" name="Itemssendcas" class="btn btn-primary" value="add data" id="ItemsbutcashR">
<input type="button" name="Itemssavecas" class="btn btn-primary" value="Save to database" id="ItemssavecashR">
</form>
<table id="tableeR" name="tableeR" class="table table-bordered" >
<tbody>
<tr>
<th>ID</th>
<th>Name</th>
<th>Quantity</th>
<th>Action</th>
<tr>
</tbody>
</table>
</div>
</div>

<!-- end Items request-->

<!-- signature -->

<div id="sign" class="tabcontent">
<div class="table-responsive">
<table class="table">
  <thead class="thead-light">
    <tr>
<?php
  if (!$branchView) {
     echo "Having some issues on our system today".date('l');
    }
//
    foreach ($branchView as $keyyyy) {
       $vvdateeee    = $keyyyy['date'];
    }
    if ($vvdateeee !== $dateee) {
            echo "<option>no item recieved today, so no signature to be add.</option>";
    }else{
?>
    </tr>
  </thead>
  <tbody>
  <form method="post">
  <tr>
    <td><input type="text" value="DATE" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
    <td><input type="text" value="<?php echo date('d/m/Y h:m a')?>" class="form-control" id="readOnlyInput"
readonly=""></td>
                   
  </tr>
  <tr>
    <td><input type="text" value="Car Diesel" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
    <td><input type="text" name="CarDiesel" class="form-control" id="inputDefault"></td>
                   
  </tr>
  <tr>
    <td><input type="text" value="Delivery Charges" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" name="DeliveryCharges" class="form-control" id="inputDefault"></td>
                             
  </tr>
  <tr>
    <td><input type="text" value="Delivery Order" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
    <td><input type="text" name="DeliveryOrder" class="form-control" id="inputDefault"></td>
                   
  </tr>
    
  <tr>
    <td><input type="text" value="ATM" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
    <td><input type="text" name="ATM" class="form-control" id="inputDefault"></td>
                  
  </tr>
  <tr>
    <td><input type="text" value="Cash" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
    <td><input type="text" name="Cash" class="form-control" id="inputDefault"></td>
                      
  </tr>
  <tr>
    <td><input type="text" value="Transfer" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
    <td><input type="text" name="Transfer" class="form-control" id="inputDefault"></td>
                       
  </tr>
  <tr>
    <td><input type="text" value="Total Expemses" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
    <td><input type="text" name="TotalExpemses" class="form-control" id="inputDefault"></td>
                   
  </tr>
  <tr>
    <td><input type="text" value="Total Discount" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
    <td><input type="text" name="TotalDiscount" class="form-control" id="inputDefault"></td>
                  
  </tr>
  <tr>
    <td><input type="text" value="sales in System" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
    <td><input type="text" name="salesSystem" class="form-control" id="inputDefault"></td>
                   
  </tr>
  <tr>
    <td><input type="text" value="EMPLOYEE NAME(SIGNATURE)" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
    <td><input type="text" name="signature" value="<?php echo $Name; ?>" class="form-control" id="readOnlyInput" readonly=""></td>

  </tr>
  <tr>
    <td><input type="text" name="brnch" value="<?php echo $branchh; ?>" class="form-control" id="readOnlyInput" hidden readonly=""></td>
  </tr>
  <tr>
    <td><input type="submit" value="Save" name="addSignature"  class="form-control btn" id="readOnlyInput"></td>
  </tr>
  </form>
  </tbody>
</table>
<?php } ?>
</div>
</div>


<!-- END SIGATURE //// -->





<script>
$(document).ready(function() {
var id = 1; 
/*Assigning id and class for tr and td tags for separation.*/
$("#butsend").click(function() {
var newid = id++; 
$("#table1").append('<tr valign="top" id="'+newid+'">\n\
<td width="100px" >' + newid + '</td>\n\
<td width="100px" class="name'+newid+'">' + $("#name").val() + '</td>\n\
<td width="100px" class="quantity'+newid+'">' + $("#quantity").val() + '</td>\n\
<td width="100px" hidden class="staff'+newid+'">' + $("#staff").val() + '</td>\n\
<td width="100px" hidden class="branch'+newid+'">' + $("#branch").val() + '</td>\n\
<td width="100px" class="reason'+newid+'">' + $("#reason").val() + '</td>\n\
<td width="100px" class="difference'+newid+'">' + $("#difference").val() + '</td>\n\
<td width="100px"><a href="javascript:void(0);" class="remCF">Remove</a></td>\n\ </tr>');

});
$("#table1").on('click', '.remCF', function() {
$(this).parent().parent().remove();
});
/*crating new click event for save button*/
$("#butsave").click(function() {
var lastRowId = $('#table1 tr:last').attr("id"); /*finds id of the last row inside table*/
var name = new Array(); 
var quantity = new Array();
var staff = new Array();
var branch = new Array();
var reason = new Array();
var difference = new Array();
for ( var i = 1; i <= lastRowId; i++) {
name.push($("#"+i+" .name"+i).html()); /*pushing all the names listed in the table*/
quantity.push($("#"+i+" .quantity"+i).html());
staff.push($("#"+i+" .staff"+i).html());
reason.push($("#"+i+" .reason"+i).html());
difference.push($("#"+i+" .difference"+i).html());
branch.push($("#"+i+" .branch"+i).html()); /*pushing all the emails listed in the table*/
}
var sendName = JSON.stringify(name); 
var sendQuantity = JSON.stringify(quantity);
var sendStaff = JSON.stringify(staff);
var sendBranch = JSON.stringify(branch);
var sendReason = JSON.stringify(reason);
var sendDifference = JSON.stringify(difference);
$.ajax({
url: "inc/data.php",
type: "post",
data: {name : sendName , quantity : sendQuantity , staff : sendStaff , branch : sendBranch , reason : sendReason , difference : sendDifference},
success : function(data){
alert(data); /* alerts the response from php.*/
}
});
});
});
</script>

<!-- another secript-->

<!-- cash end of the day-->

<script>
$(document).ready(function() {
var Cashid = 1; 
/*Assigning id and class for tr and td tags for separation.*/
$("#butcash").click(function() {
var Cashnewid = Cashid++; 
$("#table").append('<tr valign="top" id="'+Cashnewid+'">\n\
<td width="100px" >' + Cashnewid + '</td>\n\
<td width="100px" class="Cashname'+Cashnewid+'">' + $("#Cashname").val() + '</td>\n\
<td width="100px" class="Cashquantity'+Cashnewid+'">' + $("#Cashquantity").val() + '</td>\n\
<td width="100px" hidden class="Cashstaff'+Cashnewid+'">' + $("#Cashstaff").val() + '</td>\n\
<td width="100px" hidden class="Cashbranch'+Cashnewid+'">' + $("#Cashbranch").val() + '</td>\n\
<td width="100px"><a href="javascript:void(0);" class="remCF">Remove</a></td>\n\ </tr>');

});
$("#table").on('click', '.remCF', function() {
$(this).parent().parent().remove();
});
/*crating new click event for save button*/
$("#savecash").click(function() {
var CashlastRowId = $('#table tr:last').attr("id"); /*finds id of the last row inside table*/
var Cashname = new Array(); 
var Cashquantity = new Array();
var Cashstaff = new Array();
var Cashbranch = new Array();
for ( var i = 1; i <= CashlastRowId; i++) {
Cashname.push($("#"+i+" .Cashname"+i).html()); /*pushing all the names listed in the table*/
Cashquantity.push($("#"+i+" .Cashquantity"+i).html());
Cashstaff.push($("#"+i+" .Cashstaff"+i).html());
Cashbranch.push($("#"+i+" .Cashbranch"+i).html()); /*pushing all the emails listed in the table*/
}
var sendCashName = JSON.stringify(Cashname); 
var sendCashQuantity = JSON.stringify(Cashquantity);
var sendCashStaff = JSON.stringify(Cashstaff);
var sendCashBranch = JSON.stringify(Cashbranch);
$.ajax({
url: "inc/data1.php",
type: "post",
data: {Cashname : sendCashName , Cashquantity : sendCashQuantity , Cashstaff : sendCashStaff , Cashbranch : sendCashBranch},
success : function(data){
alert(data); /* alerts the response from php.*/
}
});
});
});
</script>
<!----->

<!--Items request-->

<script>
$(document).ready(function() {
var Itemlid = 1; 
/*Assigning id and class for tr and td tags for separation.*/
$("#ItemsbutcashR").click(function() {
var Itemslfnewid = Itemlid++; 
$("#tableeR").append('<tr valign="top" id="'+Itemslfnewid+'">\n\
<td width="100px" >' + Itemslfnewid + '</td>\n\
<td width="100px" class="ItemsnameR'+Itemslfnewid+'">' + $("#ItemsnameR").val() + '</td>\n\
<td width="100px" class="ItemsquantityR'+Itemslfnewid+'">' + $("#ItemsquantityR").val() + '</td>\n\
<td width="100px" hidden class="ItemsstaffR'+Itemslfnewid+'">' + $("#ItemsstaffR").val() + '</td>\n\
<td width="100px" hidden class="ItemsbranchR'+Itemslfnewid+'">' + $("#ItemsbranchR").val() + '</td>\n\
<td width="100px"><a href="javascript:void(0);" class="remCF">Remove</a></td>\n\ </tr>');

});
$("#tableeR").on('click', '.remCF', function() {
$(this).parent().parent().remove();
});
/*crating new click event for save button*/
$("#ItemssavecashR").click(function() {
var ItemsRequestlastRowIdR = $('#tableeR tr:last').attr("id"); /*finds id of the last row inside table*/
var ItemsnameR = new Array(); 
var ItemsquantityR = new Array();
var ItemsstaffR = new Array();
var ItemsbranchR = new Array();
for ( var i = 1; i <= ItemsRequestlastRowIdR; i++) {
ItemsnameR.push($("#"+i+" .ItemsnameR"+i).html()); /*pushing all the names listed in the table*/
ItemsquantityR.push($("#"+i+" .ItemsquantityR"+i).html());
ItemsstaffR.push($("#"+i+" .ItemsstaffR"+i).html());
ItemsbranchR.push($("#"+i+" .ItemsbranchR"+i).html()); /*pushing all the emails listed in the table*/
}
var sendItemsnameR     = JSON.stringify(ItemsnameR); 
var sendItemsquantityR = JSON.stringify(ItemsquantityR);
var sendItemsstaffR    = JSON.stringify(ItemsstaffR);
var sendItemsbranchR   = JSON.stringify(ItemsbranchR);
$.ajax({
url: "inc/data-request.php",
type: "post",
data: {ItemsstaffR : sendItemsstaffR , ItemsbranchR : sendItemsbranchR , ItemsnameR : sendItemsnameR , ItemsquantityR : sendItemsquantityR},
success : function(data){
alert(data); /* alerts the response from php.*/
}
});
});
});
</script>
<!----->


<!--end items request-->

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