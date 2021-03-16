
<?php

include("modules/View.php");
include("modules/Model.php");
include("modules/Controller.php");


$action = $_GET['action'];

if ( !$action )
	$action = "index";

$controller = new Controller();
$controller->$action();

?>

