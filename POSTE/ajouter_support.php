<?php 

require_once("header.php");

?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Ajouter Clients
           
          </h1>
          <br><br>
           
<form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
 <?php
 

 
   if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
    

      $client = $_POST['client'];
      $type = $_POST['type'];
      $num = $_POST['num'];
      $marque = $_POST['marque'];
      
       
      
      
      $ajout=$support->ajouter_support($client,$type,$num,$marque);
      
      if($ajout)
      {
          $link='liste_support.php?message=add';
          $user->location($link);
      }
    }
  ?>  
     <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Client</label>
      <div class="col-sm-6">
        <select name="client" class="form-control">
         <?php 

         $client->option_client();

         ?>
        </select>
    </div>
     </div>
     <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Type</label>
      <div class="col-sm-6">
        <select name="type" class="form-control">
          <option>Carte électronique</option>
           <option>Clé </option>
        </select>

    </div>
  </div>

   <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Numéro</label>
      <div class="col-sm-6">
         <input type="number" class="form-control" id="firstname" name="num" placeholder="">
      
    </div>
     </div>
 <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Marque</label>
      <div class="col-sm-6">
         <input type="text" class="form-control" id="firstname" name="marque" placeholder="">

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