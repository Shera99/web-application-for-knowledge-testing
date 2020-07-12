<?php
session_start();
define("ROOT", $_SERVER["DOCUMENT_ROOT"]);
define("CONTROLLER_PATH", ROOT. "/admin/controllers/");
define("MODEL_PATH", ROOT. "/admin/models/");
define("VIEW_PATH", ROOT. "/admin/views/");
define("INCLUDE_PATH", ROOT. "/admin/include/");

require_once("connect.php");
require_once("route.php");
require_once CONTROLLER_PATH. 'Controller.php';
require_once MODEL_PATH. 'Model.php';
require_once VIEW_PATH. 'View.php';

Routing::buildRoute();

?>