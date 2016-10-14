<?
Class Conexion{

	private $conexion;

	public function __construct(){
		$servidor = "localhost";
		$usuario  = "root";
		$clave    = "";
		$base	  = "";
		$this->conexion = mysqli_connect($servidor, $usuario, $clave, $base)
			or die('No se pudo conectar: ' . mysqli_connect_error());
	}

	public function __destruct(){

	}

	public function consulta($sql){
		$resultado = mysqli_query($this->conexion, $sql) or die('Consulta fallida: ' . mysqli_connect_error());
		$datos = "";

		//Verificamos que sea un select para recorrer, si es insert o update no hace nada
		$pos = strpos($sql, "ELECT");
		if($pos){
			while($fila =  mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
				$datos[] = $fila;
			} 
			// Liberar resultados
			mysqli_free_result($resultado);   	
		}
		return $datos;
	}

	public function cerrarConexion(){
		mysqli_close($this->conexion);
	}

}

?>