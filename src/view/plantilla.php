<?php
  session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tienda Ululu</title>

  <link rel="icon" href="src/view/img/plantilla/icono-negro.png">

  <!------------------- PLUGINS DE CSS -------------------->

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="src/view/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="src/view/dist/css/adminlte.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="src/view/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="src/view/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="src/view/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Sweet -->
  <!------------------- PLUGINS DE JAVASCRIPT -------------------->

    <!-- Sweetalert -->
    <script src="src/view/plugins/sweetalert2/sweetalert2.all.min.js"></script>
  <!-- jQuery -->
  <script src="src/view/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="src/view/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="src/view/dist/js/adminlte.min.js"></script>

  

  <!-- DataTables  & Plugins -->
<script src="src/view/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="src/view/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="src/view/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="src/view/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="src/view/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="src/view/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="src/view/plugins/jszip/jszip.min.js"></script>
<script src="src/view/plugins/pdfmake/pdfmake.min.js"></script>
<script src="src/view/plugins/pdfmake/vfs_fonts.js"></script>
<script src="src/view/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="src/view/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="src/view/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>




</head>
<!--<body class="hold-transition sidebar-collapse sidebar-mini"> Se agrega el login-page -->
<!-- Site wrapper -->
<!-- aqui estaba  el wrapper antes del loggin -->
  <!-- Navbar -->
  <?php


 if(isset($_SESSION["iniciar"]) && $_SESSION["iniciar"] == "ok"){
  
  echo '<div class="wrapper">'; //inicio div echo
  // HEADER
  include "src/view/modules/header.php";

  // MENU
    include "src/view/modules/menu.php";
  
  // HOMEPAGE
    if(isset($_GET["ruta"])){
      if($_GET["ruta"] == "homepage"||
          $_GET["ruta"] == "user"||
          $_GET["ruta"] == "products"||
          $_GET["ruta"] == "category"||
          $_GET["ruta"] == "client"||
          $_GET["ruta"] == "buy"||
          $_GET["ruta"] == "create-purchase"||
          $_GET["ruta"] == "report"||
          $_GET["ruta"] == "login"||
          $_GET["ruta"] == "log-out"){
            
            include "src/view/modules/".$_GET["ruta"].".php";

    }else{
      include "src/view/modules/404.php";
    }

  }

  // FOOTER
  include "src/view/modules/footer.php";
  
  echo '</div>'; //fin del div echo

}else{
  if(isset($_SESSION["iniciar"]) && $_SESSION["iniciar"] == "ok"){
    include "src/view/modules/homepage.php";
    }else{
      include "src/view/modules/login.php";
    }
}

if(($_GET["ruta"] == "login")){
  echo '<body class="hold-transition sidebar-mini login-page">';
}else{
  echo '<body class="hold-transition sidebar-mini">';
}


  ?>
</div>
<!-- ./wrapper -->


<script src="src/view/js/plantilla.js"></script>
<script src="src/view/js/usuario.js"></script>



</body>
</html>
