<?php 

require_once("header.php");

?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Modifier Clients
           
          </h1>
          <br><br>
           
          <?php 
            $id = $_GET['id'];
    $liste = $agent->select_agent($id);

    foreach($liste as $row) {
      $nom = $row["nom"];
      $prenom = $row["prenom"];
      $ncin = $row["ncin"];
      $tel = $row["tel"];


          ?>


<form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']."?id=".$_GET['id'];  ?>">
 <?php
 
 $ncinE=$nomE=$prenomE=$telE="";
 
   if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
      $erreur = true ; 
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

if( ($controle->no_vide($_POST["ncin"])) && (strlen($_POST["ncin"])!=8) ) 
{
  $ncinE=" * NCIN incorrecte";

} 

if( ($controle->no_vide($_POST["tel"])) && (strlen($_POST["tel"])!=8) ) 
{
  $telE=" * Teléphone incorrecte";

} 


if($controle->no_vide($_POST["prenom"],$_POST["nom"],$_POST["ncin"],$_POST["tel"]) &&  (strlen($_POST["ncin"])==8)  && (strlen($_POST["tel"])==8) )
{   


  
      $tel = $_POST['tel'];
      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
      $ncin = $_POST['ncin'];
      $id = $_POST['id'];
       
      
      
      $ajout=$client->modifier_client($id,$ncin,$nom,$prenom,$tel);
      
      if($ajout)
      {
          $link='liste_client.php?message=update';
          $user->location($link);
      }
    }}
  ?>  
    <input type="hidden" name="id" value="<?php echo $id; ?>">
   <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">N C I N</label>
      <div class="col-sm-6">
         <input type="text" value="<?php echo $ncin; ?>" class="form-control" id="firstname" name="ncin" placeholder="">
      <span class="error"><?php echo $ncinE;?></span>
    </div>
     </div>
 <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Nom</label>
      <div class="col-sm-6">
         <input type="text" value="<?php echo $nom; ?>"  class="form-control" id="firstname" name="nom" placeholder=""> 
      <span class="error"><?php echo $nomE;?></span>
    </div>
     </div>
     
     <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Prénom</label>
      <div class="col-sm-6">
         <input type="text" value="<?php echo $prenom; ?>" class="form-control" id="firstname" name="prenom" placeholder="">
      <span class="error"><?php echo $prenomE;?></span>
    </div>
     </div>
     
    
       <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Teléphone</label>
      <div class="col-sm-6">
         <input type="text" value="<?php echo $tel; ?>" class="form-control" id="firstname" name="tel" placeholder="">
      <span class="error"><?php echo $telE;?></span>
    </div>
     </div>   
    
     
     
    
  
    
     
      
     <br><br>
      <div class="form-group">
      <label class="col-sm-2 control-label"></label>
    <input type="submit" value="Modifier" class="btn btn-primary">
  
   </div>
   
</form>    
      <?php 
    }
      ?>  
 
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