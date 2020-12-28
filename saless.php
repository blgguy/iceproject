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
    $branch   = $key['branch'];
}
$itms = $user->items();
if($role !== 'branch'){
  $user->rd('dashboard.php');
}
if (isset($_POST['addSalesRp'])) {

  $date                 = date('d/m/Y');
  $time                 = date('h:m:s a');
  $delivery             =esc($_POST['delivery']);
  $diesel               =esc($_POST['diesel']);
  $carPetrol            =esc($_POST['carPetrol']);
  $otherExpensive       =esc($_POST['otherExpensive']);
  $discount             =esc($_POST['discount']);
  $totalExpensive       =esc($_POST['totalExpnsv']);
  $totalsum             =esc($_POST['totalSum']);
  $ATM                  =esc($_POST['ATM']);
  $totalSales           =esc($_POST['totalSale']);
  $salesInSystem        =esc($_POST['salesInSys']);
  $diffrences           =esc($_POST['diffrent']);
  $signature            = esc($_POST['signature']);
  $branch               = esc($_POST['brnch']);
  if (empty($delivery) || empty($diesel) || empty($carPetrol) || empty($otherExpensive) || empty($totalsum) || empty($totalSales) || empty($diffrences)) {
    echo "<script> alert('you cannot submit empty field'); </script>";
  }else{
    
    $create     = $user->salesReport($date, $time, $delivery, $diesel, $carPetrol, $otherExpensive, $discount, $totalExpensive, $totalsum, $ATM, $totalSales, $salesInSystem, $diffrences, $signature, $branch);
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
   
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
  <a href="dashboard.php" class="active">Dashboard</a>
  <a href="profile.php">Profiles</a>
  <a href="signout.php">Sign Out</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>

  <div class="tab">
  <button class="tablinks" onclick="openCity(event, 'items')">SALES REPORT</button>
  <a style="text-decoration: none;" href="rp/brnchrprt.php"><button class="tablinks">Print report</button></a>
</div>

<div id="items" class="tabcontent">
<div class="table-responsive">
<table class="table">
  <thead class="thead-light">
    <tr>
   
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
    <td><input type="text" value="DELIVERY" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" name="delivery" class="form-control" id="inputDefault"></td>
                   
    </tr>
    <tr>
    <td><input type="text" value="DIESEL" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" name="diesel" class="form-control" id="inputDefault"></td>
                             
    </tr>
    <tr>
    <td><input type="text" value="CAR PETROL" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" name="carPetrol" class="form-control" id="inputDefault"></td>
                   
    </tr>
    <tr>
    <td><input type="text" value="OTHER EXPENSES" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" name="otherExpensive" class="form-control" id="inputDefault"></td>
                   
    </tr>
    <tr>
    <td><input type="text" value="DISCOUNT" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" name="discount" class="form-control" id="inputDefault"></td>
                   
    </tr>
    <tr>
    <td><input type="text" value="TOTAL EXPENSES" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" name="totalExpnsv" class="form-control" id="inputDefault"></td>
                  
    </tr>
    <tr>
    <td><input type="text" value="TOTAL SUM" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" name="totalSum" class="form-control" id="inputDefault"></td>
                   
    </tr>
    <tr>
    <td><input type="text" value="ATM" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                    <td><input type="text" name="ATM" class="form-control" id="inputDefault"></td>
                  
    </tr>
    <tr>
        <td><input type="text" value="TOTAL SALES" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                        <td><input type="text" name="totalSale" class="form-control" id="inputDefault"></td>
                      
        </tr>
        <tr>
        <td><input type="text" value="SALES IN SYSTEM" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                        <td><input type="text" name="salesInSys" class="form-control" id="inputDefault"></td>
                       
        </tr>
        <tr>
            <td><input type="text" value="DIFFERENCE" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
                            <td><input type="text" name="diffrent" class="form-control" id="inputDefault"></td>
                               
            </tr>
            <tr>
            <td><input type="text" value="EMPLOYEE NAME(SIGNATURE)" class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly=""></td>
            <td><input type="text" name="signature" value="<?php echo $Name; ?>" class="form-control" id="readOnlyInput" readonly=""></td>

            </tr>
            <tr>
              <td><input type="text" name="brnch" value="<?php echo $branch; ?>" class="form-control" id="readOnlyInput" hidden readonly=""></td>
            </tr>
            <tr>
    <td><input type="submit" value="Save" name="addSalesRp"  class="form-control btn" id="readOnlyInput"></td>
   </tr>
    </form>
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
