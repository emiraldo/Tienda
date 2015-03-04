<?php
	
	session_start();
	require ("Controller_Cliente.php");

	if(isset($_SESSION["user"])){
		// echo "Session is set"; // for testing purposes
		header("Location: ../Vistas/Inicio.php");
	}

	if(!isset($_SESSION["user"])){
		echo "<script>alert('Ingrese usuario y contraseña')
			   window.location.href = '../../index.php'
			   </script>";
	}

	if(isset($_POST["login"])){

		if(!empty($_POST['user']) && !empty($_POST['pass'])) {
    		$user=$_POST['user'];
    		$pass=$_POST['pass'];
    		$registro = new Controller_Cliente();
		    $numrows=$registro->get_Clientes();

			if((count ($numrows))>0){
				foreach ($numrows as $fila) {					
					
			    	if($user == $fila["USER"] && $pass == $fila["PASS"]){

					    $_SESSION['user']=$user;
    					/* Redirect browser */
				    	header("Location: ../Vistas/Inicio.php");
    				}else {
					$mensaje =  "Nombre de usuario ó contraseña invalida!";
    			}
    		}

			} else {
	    		$mensaje = "Todos los campos son requeridos!";
			}
		}

		if (!empty($mensaje)) {
			echo "<script>alert('".$mensaje."')
				  window.location.href = '../../index.php'
				  </script>";
		}
	}
?>