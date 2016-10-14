<?
Class Conexion{

	private $conexion;

	public function __construct(){
		$servidor = "localhost";
		$usuario  = "root";
		$clave    = "";
		$base	  = "";
		$this->conexion = mysql_connect($servidor, $usuario, $clave)
			or die('No se pudo conectar: ' . mysql_error());
		mysql_set_charset('utf8', $this->conexion);
		mysql_select_db($base, $this->conexion) or die('No se pudo seleccionar la base de datos');
	}

	public function __destruct(){

	}

	public function consulta($sql){
		$resultado = mysql_query($sql) or die('Consulta fallida: ' . mysql_error());
		$datos = "";

		//Verificamos que sea un select para recorrer, si es insert o update no hace nada
		$pos = strpos($sql, "ELECT");
		if($pos){
			while($fila =  mysql_fetch_array($resultado, MYSQL_ASSOC)){
				$datos[] = $fila;
			} 
			// Liberar resultados
			mysql_free_result($resultado);   	
		}
		return $datos;
	}

	public function cerrarConexion(){
		mysql_close($this->conexion);
	}

}

?>