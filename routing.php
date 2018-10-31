<?php 


$controllers=array(
	'Curso'=>['index','register','save','show','updateshow','update','delete','search','error']
);

if (array_key_exists($controller,  $controllers)) {
	if (in_array($action, $controllers[$controller])) {
		call($controller, $action);
	}
	else{
		call('Curso','error');
	}		
}else{
	call('Curso','error');
}

function call($controller, $action){
	require_once('Controllers/'.$controller.'Controller.php');

	switch ($controller) {
		case 'Curso':
		require_once('Model/Curso.php');
		$controller= new CursoController();
		break;			
		default:
				# code...
		break;
	}
	$controller->{$action}();
}

?>