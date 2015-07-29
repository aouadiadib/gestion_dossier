<!DOCTYPE html>
<?php 

require 'class/class.php';

?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Poste | Tunisie</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      
      <div class="login-box-body">
       
        <center>
        <img src="img/logo.jpg" width="260">
      </center>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
          <div class="form-group has-feedback">
            <input type="text" name="login" class="form-control" placeholder="Email"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="pass" class="form-control" placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>

       


          <div class="row">
            <div class="col-xs-8">    
                                    
            </div><!-- /.col -->
           
          </div>
       

        <div class="social-auth-links text-center">
 
          <input type="submit"  value="CONNECTER" class="btn btn-block btn-social btn-facebook btn-flat">
            <input type="reset"  value="Annuler" class="btn btn-block btn-social btn-google-plus btn-flat">
              <?php 


    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
              
              $login=$_POST["login"];
              $pass=$_POST["pass"];
              $type="poste";

      
        if($controle->vide($login) || $controle->vide($pass)  ) 
        {
            echo '<br><strong>Ecrire votre login et mot de passe</strong>';
        }
        
        else
        {
          $pass=md5($pass);
          $user->login($login,$pass,$type);
                
              }
              
    }
              
            
            
          

          ?>
             </form>

          </a>
        </div><!-- /.social-auth-links -->

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="../../plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>