<?php
	session_start();
	require ("php/Controladores/Controller_Cliente.php");

	if(isset($_SESSION["user"])){
		// echo "Session is set"; // for testing purposes
		header("Location: /php/Vistas/Inicio.php");
	}

	if(isset($_POST["login"])){

		if(!empty($_POST['user']) && !empty($_POST['pass'])) {
    		$user=$_POST['user'];
    		$pass=$_POST['pass'];
    		$registro = new Controller_Cliente();
		    $numrows=$registro->get_Cliente($user);
			if((count ($numrows))==0){
			    if($user == $numrows["USER"] && $pass == $numrows["PASS"]){
				    $_SESSION['user']=$user;
    				/* Redirect browser */
				    header("Location: php/Vistas/Inicio.php");
    			}
    		} else {
				$message =  "Nombre de usuario ó contraseña invalida!";
    		}

		} else {
	    		$message = "Todos los campos son requeridos!";
		}
	}
?>
