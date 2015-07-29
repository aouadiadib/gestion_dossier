<?php 

require_once("header.php");

?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Ajouter Agent
           
          </h1>
          <br><br>
           
<form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
 <?php
 
  $passE=" * 6 chiffres";

  $nomE=$prenomE=$ncinE=$telE=$loginE=$rpassE="";
 
   if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
     
if( $controle->vide($_POST["ncin"])) 
{
  $ncinE=" * champ obligatoire";

} 

if( $controle->vide($_POST["nom"])) 
{
  $nomE=" * champ obligatoire";
}


if( $controle->vide($_POST["prenom"])) 
{
  $prenomE=" * champ obligatoire";
}


if( $controle->vide($_POST["tel"])) 
{
  $telE=" * champ obligatoire";
}

if( $controle->vide($_POST["login"])) 
{
  $loginE=" * champ obligatoire";
}

if( $controle->vide($_POST["pass"])) 
{
  $passE=" * champ obligatoire";
}

if( $controle->vide($_POST["rpass"])) 
{
  $rpassE=" * champ obligatoire";
}


if( ($controle->no_vide($_POST["ncin"])) && (strlen($_POST["ncin"])!=8) ) 
{
  $ncinE=" * NCIN incorrecte";

} 

if( ($controle->no_vide($_POST["tel"])) && (strlen($_POST["tel"])!=8) ) 
{
  $telE=" * Teléphone incorrecte";

} 

if( ($controle->no_vide($_POST["pass"])) && (strlen($_POST["pass"])!=6) ) 
{
  $passE=" * Mot de passe incorrecte";

} 

if( ($controle->no_vide($_POST["pass"])) && ($controle->no_vide($_POST["rpass"])) &&  ($_POST["pass"]!=$_POST["rpass"])) 
{
  $rpassE=" * Confirmation incorrecte";

} 

if($controle->no_vide($_POST["login"],
  $_POST["prenom"],$_POST["nom"],$_POST["ncin"],$_POST["tel"],$_POST["pass"],
  $_POST["rpass"])
   &&  (strlen($_POST["ncin"])==8)  && (strlen($_POST["tel"])==8)
    && (strlen($_POST["pass"])==6) && ($_POST["pass"]==$_POST["rpass"]))
{   




  
      $tel = $_POST['tel'];
      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
      $ncin = $_POST['ncin'];
      $login = $_POST['login'];
      $pass = $_POST['pass'];
      $rpass = $_POST['rpass'];
      $type = $_POST['type'];
      
       
      
      $pass = md5($pass);
      $ajout=$agent->ajouter_agent($ncin,$nom,$prenom,$tel,$type,$login,$pass);
      
      if($ajout)
      {
          $link='liste_agent.php?message=add';
          $user->location($link);
      }
    }}
  ?>  
   <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Type</label>
      <div class="col-sm-6">
         <select name="type" class="form-control">
          <option>poste</option>
          <option>ANCE</option>
         </select>
    </div>
     </div>
   <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">N C I N</label>
      <div class="col-sm-6">
         <input type="text" class="form-control" id="firstname" name="ncin" placeholder="">
      <span class="error"><?php echo $ncinE;?></span>
    </div>
     </div>
 <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Nom</label>
      <div class="col-sm-6">
         <input type="text" class="form-control" id="firstname" name="nom" placeholder="">
      <span class="error"><?php echo $nomE;?></span>
    </div>
     </div>
     
     <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Prénom</label>
      <div class="col-sm-6">
         <input type="text" class="form-control" id="firstname" name="prenom" placeholder="">
      <span class="error"><?php echo $prenomE;?></span>
    </div>
     </div>
     
    
       <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Teléphone</label>
      <div class="col-sm-6">
         <input type="text" class="form-control" id="firstname" name="tel" placeholder="">
      <span class="error"><?php echo $telE;?></span>
    </div>
     </div>   
    
     <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Login</label>
      <div class="col-sm-6">
         <input type="text" class="form-control" id="firstname" name="login" placeholder="">
      <span class="error"><?php echo $loginE;?></span>
    </div>
     </div>   
     
     <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Mot de passe</label>
      <div class="col-sm-6">
         <input type="password" class="form-control" id="firstname" name="pass" placeholder="">
      <span class="error"><?php echo $passE;?></span>
    </div>
     </div> 
  
     <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Confirmation</label>
      <div class="col-sm-6">
         <input type="password" class="form-control" id="firstname" name="rpass" placeholder="">
      <span class="error"><?php echo $rpassE;?></span>
    </div>
     </div> 
     
      
     <br><br>
      <div class="form-group">
      <label class="col-sm-2 control-label"></label>
    <input type="submit" value="Ajouter" class="btn btn-primary">
  
   </div>
   
</form>    
        
 
        </section>

        <!-- Main content -->
        <section class="content" style="">
          
          <!-- Small boxes (Stat box) -->
    
          <!-- Main row -->
          <div class="row">
            
           </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class='control-sidebar-bg'></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>    
    
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js" type="text/javascript"></script>    
    
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>