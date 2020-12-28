<!DOCTYPE html>
<html>
  <head>
    <!-- Open Graph Meta-->
    <title>ICE-CREAM</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  </head>
  <body>
    
    <section class="login-content">
     
      <div class="login-box">
        <form class="login-form" method="post" action="inc/login.php">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          <div class="form-group">
            <label class="control-label">USER ID</label>
            <input class="form-control" type="text" name="userId" placeholder="User Id" autofocus>
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" name="passID" placeholder="**********">
          </div>
          
          <div class="form-group">
            <div class="utility">
              <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Id ?</a></p>
            </div>
          </div>
          <div class="form-group btn-container">
            <?php
            session_start();
                if(isset($_SESSION['icebsjvca763rscMssg'])){
              ?>
                  <div align="center" style="color: red;">
                      <?php echo $_SESSION['icebsjvca763rscMssg']; ?>
                  </div>
            <?php
                  unset($_SESSION['icebsjvca763rscMssg']);
                }
            ?>
            <button class="btn btn-primary btn-block" type="submit" name="signInBtn"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
        </form>
        <form class="forget-form" method="post" action="4getpass.php">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Email">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" type="submit" name="resetBtn"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
          </div>
        </form>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>