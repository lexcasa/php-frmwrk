<?php 
class User
{
	public function getAllUsers($conn){
		$sql 	= "SELECT * FROM Users";
		$datos 	= $conn->consulta($sql);
		return $datos;
	}
}
?>