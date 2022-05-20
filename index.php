<?php
require_once "src/controllers/plantilla.controller.php";
require_once "src/controllers/user.controller.php";



require_once "src/models/user.model.php"; 
$plantilla = new ControllerPlantilla();
$plantilla -> ctrPlantilla();