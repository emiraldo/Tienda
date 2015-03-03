<?php
	session_start();
?>

<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>

<?php

	if(isset($_SESSION["session_username"])){
		// echo "Session is set"; // for testing purposes
		header("Location: /php/Vistas/Inicio.php");
	}

	if(isset($_POST["login"])){

		if(!empty($_POST['username']) && !empty($_POST['password'])) {
    		$username=$_POST['username'];
    		$password=$_POST['password'];

		    $query =mysql_query("SELECT * FROM usertbl WHERE username='".$username."' AND password='".$password."'");

		    $numrows=mysql_num_rows($query);
    		if($numrows!=0) {
			    while($row=mysql_fetch_assoc($query)){
				    $dbusername=$row['username'];
    				$dbpassword=$row['password'];
    			}

			    if($username == $dbusername && $password == $dbpassword){
				    $_SESSION['session_username']=$username;
    				/* Redirect browser */
				    header("Location: intropage.php");
    			}
    	} else {
			$message =  "Nombre de usuario ó contraseña invalida!";
    	}

		} else {
	    	$message = "Todos los campos son requeridos!";
		}
	}
?>
