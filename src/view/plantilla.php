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

  <!------------------- PLUGINS DE JAVASCRIPT -------------------->

  <!-- jQuery -->
  <script src="src/view/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="src/view/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="src/view/dist/js/adminlte.min.js"></script>



</head>
<body class="hold-transition sidebar-collapse sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?php
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
          $_GET["ruta"] == "log-out"){
            
        include "src/view/modules/".$_GET["ruta"].".php";
    }else{
      include "src/view/modules/404.php";
    }
  }else{
    include "src/view/modules/homepage.php";
  }


  
    //include "src/view/modules/homepage.php";
  
  // FOOTER
  include "src/view/modules/footer.php";
  ?>
</div>
<!-- ./wrapper -->

<script src = "src/view/js/plantilla.js"> </script>

</body>
</html>
