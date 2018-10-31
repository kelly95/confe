<?php 
// setlocale(LC_TIME,"es_PE");
/**
* 
*/
class Curso	
{
	private $idCurso;
	private $titulo;
	private $descripcion;
	private $precio;
	private $horas;
	private $fechacreada;
	private $destino;
	private $estado;

	
	
	function __construct($idCurso, $titulo,$descripcion,$precio, $horas,$fechacreada,$foto,$estado)
	{

		$this->setIdCurso($idCurso);
		$this->setTitulo($titulo);
		$this->setDescripcion($descripcion);
		$this->setPrecio($precio);		
		$this->setHoras($horas);
		$this->setFechacreada($fechacreada);
		$this->setEstado($estado);
		$this->setFoto($foto);	
	}

	public function getIdCurso(){
		return $this->idCurso;
	}

	public function setIdCurso($idCurso){
		$this->idCurso = $idCurso;
	}

	public function getTitulo(){
		return $this->titulo;
	}

	public function setTitulo($titulo){
		$this->titulo = $titulo;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}
	public function getPrecio(){

		return $this->precio;
	}
	public function setPrecio($precio){
		$this->precio = $precio;
	}
	public function setHoras($horas){
		$this->horas = $horas;
	}
	public function getHoras(){

		return $this->horas;
	}	
	
	
	
	public function getFechacreada(){

		return $this->fechacreada;
	}
	public function setFechacreada($fechacreada){
		$this->fechacreada = $fechacreada;
	}

	public function getEstado(){

		return $this->estado;
	}

	public function setEstado($estado){
		if (strcmp($estado, 'on')==0) {
			$this->estado=1;
		} elseif(strcmp($estado, '1')==0) {
			$this->estado='checked';
		}elseif (strcmp($estado, '0')==0) {
			$this->estado='of';
		}else {
			$this->estado=0;
		}
	}
	public function getFoto(){

		return $this->foto;
	}	
	public function setFoto($foto){
		$this->foto = $foto;
	}

	
	//**************************************************************** */
//Modelo de Acceso a la Data

	public static function save($curso){
		$db=Db::getConnect();
		//var_dump($alumno);
		//die();
		

		$insert=$db->prepare('INSERT INTO curso VALUES (NULL, :titulo,:descripcion,:precio,:horas,:fechacreada,:foto,:estado)');
		$insert->bindValue('titulo',$curso->getTitulo());
		$insert->bindValue('descripcion',$curso->getDescripcion());
		$insert->bindValue('precio',$curso->getPrecio());
		$insert->bindValue('horas',$curso->getHoras());
		$insert->bindValue('fechacreada',$curso->getFechacreada());
		$insert->bindValue('foto',$curso->getFoto());
		$insert->bindValue('estado',$curso->getEstado());
		
		$insert->execute();
	}

	public static function all(){
		$db=Db::getConnect();
		$listaCursos=[];

		$select=$db->query('SELECT * FROM curso order by idCurso');

		foreach($select->fetchAll() as $curso){
			$listaCursos[]=new Curso($curso['idCurso'],$curso['titulo'],$curso['descripcion'],$curso['precio'],$curso['horas'],$curso['fechacreada'],$curso['foto'],$curso['estado']);
		}
		return $listaCursos;
	}

	public static function searchById($idCurso){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM curso WHERE idCurso=:idCurso');
		$select->bindValue('idCurso',$idCurso);
		$select->execute();

		$cursoDb=$select->fetch();


		$curso = new Curso ($cursoDb['idCurso'],$cursoDb['titulo'],$cursoDb['descripcion'],$cursoDb['precio'],$cursoDb['horas'],$cursoDb['fechacreada'],$cursoDb['foto'],$cursoDb['estado']);
		//var_dump($alumno);
		//die();
		return $curso;

	}

	public static function update($curso){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE curso SET titulo=:titulo, descripcion=:descripcion,precio=:precio, horas=:horas, fechacreada=:fechacreada, foto=:foto, estado=:estado WHERE idCurso=:idCurso');
		$update->bindValue('titulo', $curso->getTitulo());
		$update->bindValue('descripcion',$curso->getDescripcion());
		$update->bindValue('precio', $curso->getPrecio());
		$update->bindValue('horas',$curso->getHoras());
		$update->bindValue('fechacreada',$curso->getFechacreada());
		$update->bindValue('foto',$curso->getFoto());
		$update->bindValue('estado',$curso->getEstado());
		$update->bindValue('idCurso',$curso->getIdCurso());
		$update->execute();
	}

	public static function delete($idCurso){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM curso WHERE idCurso=:idCurso');
		$delete->bindValue('idCurso',$idCurso);
		$delete->execute();		
	}
}

?>