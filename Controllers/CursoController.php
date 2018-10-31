
<?php 
/**
* 
*/
class CursoController
{
	
	function __construct()
	{
		
	}

	function index(){
		require_once('Views/Curso/bienvenido.php');
	}

	function register(){
		require_once('Views/Curso/register.php');
	}

	function save(){

		$foto = $_FILES["foto"]["name"];
		$ruta = $_FILES["foto"]["tmp_name"];
		$destino = "fotos/".$foto;
		copy($ruta,$destino);





		if (!isset($_POST['estado'])) {
			$estado="of";
		}else{
			$estado="on";
		}
		$fechacreada=date("Y-m-d");
		
		$curso= new Curso(null, $_POST['titulo'],$_POST['descripcion'],$_POST['precio'],$_POST['horas'],$fechacreada,$destino,$estado);
		Curso::save($curso);
		$this->show();
	}

	function show(){
		$listaCurso=Curso::all();

		require_once('Views/Curso/show.php');
	}

	function updateshow(){
		$idCurso=$_GET['idCurso'];
		$curso=Curso::searchById($idCurso);
		require_once('Views/Curso/updateshow.php');
	}

	function update(){
		$foto = $_FILES["foto"]["name"];
		$ruta = $_FILES["foto"]["tmp_name"];
		$destino = "fotos/".$foto;
		copy($ruta,$destino);

		
		if (!isset($_POST['estado'])) {
			$estado="of";
		}else{
			$estado="on";
		}
		$curso = new Curso($_POST['idCurso'],$_POST['titulo'],$_POST['descripcion'],$_POST['precio'],$_POST['horas'],$_POST['fechacreada'],$destino,$estado);

		
		Curso::update($curso);
		$this->show();
	}
	function delete(){
		$idCurso=$_GET['idCurso'];
		Curso::delete($idCurso);
		$this->show();
	}

	function search(){
		if (!empty($_POST['idCurso'])) {
			$idCurso=$_POST['idCurso'];
			$curso=Curso::searchById($idCurso);
			$listaCurso[]=$curso;
			//var_dump($id);
			//die();
			require_once('Views/Curso/show.php');
		} else {
			$listaCurso=Curso::all();

			require_once('Views/Curso/show.php');
		}
		
		
	}

	function error(){
		require_once('Views/Curso/error.php');
	}

}

?>