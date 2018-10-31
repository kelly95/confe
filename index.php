<?php 
//
date_default_timezone_set('America/Lima');
//

	require_once('connection.php');

	if (isset($_GET['controller'])&&isset($_GET['action'])) {
		
		$controller=$_GET['controller'];
		$action=$_GET['action'];
	}else{
		$controller='Curso';
		$action='index';
	}
	require_once('Views/Layouts/layout.php');	
 ?>