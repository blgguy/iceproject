<?php
//start session
session_start();
// include class file.
require_once('inc/engine.class.php');
// call the class obj
$user = new Engine();
/**

public function passCheck($password){

    public function passUpdate($pass, $key)

    **/
//redirect if not logged in
if (!$user->im_logIn() || (trim ($user->session()) == '')) {
  $user->rd('signout.php');
}
$ky = $user->session();
$details = $user->viewById('mem74fi4rdh', $ky);
foreach ($details as $key) {
    $fName    = $key['firstName'];
    $lName    = $key['lastName'];
    $emailD    = $key['email'];
    $username = $key['username'];
    $role     = $key['codeKey'];
    $branch   = $key['branch'];
    $Keyy     = $key['uniqKey'];
}

$errMsg = $successMsg = $errMsg2 = $successMsg2 = '';
if (isset($_POST['saveBtn'])) {
  if (empty($_POST['oldPass'])) {
    $errMsg = 'old password require';
  }elseif ( empty($_POST['newPass']) || empty($_POST['cormfirm']) ) {
    $errMsg = 'field require';
  }elseif ($_POST['newPass'] !== $_POST['cormfirm']) {
   $errMsg = 'password not match.';
  }else{
    $successMsg = 'normal';
    $oldChck = $user->passCheck(md5($_POST['oldPass']));
    if (!$oldChck) {
      $errMsg = 'Old password not correct.';
    }else{
      $update = $user->passUpdate(md5($_POST['newPass']), $Keyy);
      if (!$update) {
        $errMsg = 'error; password updated denied.';
      }else{
        $successMsg = 'password updated successfully.';
      }
    }

  }
}

// edit personal details
if (isset($_POST['editBtn'])) {
  $fname  = $_POST['firstName'];
  $lname  = $_POST['lastName'];
  $email  = $_POST['email'];
  if ( empty($fname) || empty($lname) || empty($email) ) {
    $errMsg2 = 'field require';
  }elseif ($fname === $fName && $lname === $lName && $email === $emailD) {
    $errMsg2 = "you haven't make any changes";
  }else{
    $updatee = $user->userUpdate($fname, $lname, $email, $Keyy);
    if (!$updatee) {
      $errMsg2 = 'error; editing your data was denied.';
    }else{
      $successMsg2 = 'data edited successfully.';
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="../../cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
*{
  margin: 2px;
}
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
</style>
<title>profile | <?php echo $fName; ?></title>
</head>
<body class="w3-light-grey">
<!-- Page Container -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-md 3" align="center">
        <a href="dashboard.php"><button style="float: left; text-decoration: none;"> Back</button></a>
        <img src="st/img/avatar.png" style="width:100px; border-radius: 50%; border: 2px solid green;" alt="Avatar">
          <div class="w3-display-bottomleft w3-container w3-text-black">
            <h2><?php echo $fName.' '.$lName; ?></h2>
          </div>
          <div class="w3-container">
            <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $role; ?></p>
            <?php if ($branch == 'nill') {
              //
            }else{ ?>
            <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo '<b>Branch: </b>'.$branch; ?></p>
            <?php }?>
            <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo '<b>Username: </b>'.$username; ?></p>
            <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo '<b>Email: </b>'.$emailD; ?></p><hr>
          </div>
      </div>
      <div class="col-md 6" align="center">
        <p><?php echo "<h6 style='color: red;'>$errMsg</h6>"?></p>
        <p><?php echo "<h6 style='color: green;'>$successMsg</h6>"?></p>
        <form method="post" action="" class="form-control">
          <label class="form-label">You can change your Password</label><br>
          <label for="oldPass" class="col-form-label">Old Password:</label>
          <input type="password" name="oldPass" class="form-control" id="oldPass">
          <label for="newPass" class="col-form-label">New password:</label>
          <input type="password" name="newPass" class="form-control" id="newPass">
          <label for="cormfirm" class="col-form-label">Cormfirm new password:</label>
          <input type="password" name="cormfirm" class="form-control" id="cormfirm">
          <button type="submit" name="saveBtn" class="btn btn-success">Save</button>
        </form>
      </div>
      <div class="col-md 3" align="center">
        <p><?php echo "<h6 style='color: red;'>$errMsg2</h6>"?></p>
        <p><?php echo "<h6 style='color: green;'>$successMsg2</h6>"?></p>
        <form method="post" action="" class="form-control">
          <label class="form-label">You can Edit your profile details</label><br>
          <label for="firstName" class="col-form-label">First Name:</label>
          <input type="text" name="firstName" value="<?php echo $fName;?>" class="form-control" id="firstName">
          <label for="lastName" class="col-form-label">Last NAme:</label>
          <input type="text" name="lastName" value="<?php echo $lName;?>" class="form-control" id="lastName">
          <label for="email" class="col-form-label">Email:</label>
          <input type="email" name="email" value="<?php echo $emailD;?>" class="form-control" id="email">
          <button type="submit" name="editBtn" class="btn btn-success">Save</button>
        </form>
      </div>
    </div>
  </div>

<!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>
</html>

