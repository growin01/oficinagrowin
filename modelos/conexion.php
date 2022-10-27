<?php 

class Conexion{
	
	static public function conectar(){
		$empresa = "growincloudemp";
		$link = new PDO("mysql:host=localhost;dbname=$empresa","jnjdldsk","Venkeylaso011212");
		$link->exec("set names utf8");
		return $link;


		}
}


 ?>