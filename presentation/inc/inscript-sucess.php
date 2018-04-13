<?php

	
	include_once './data/config.php';
	
	if (isset($_POST['user']) and isset($_POST['pass'])){
		$user = trim($_POST['user']);
	  $user = strip_tags($user);
	  $user = htmlspecialchars($user);

	  $pass = trim($_POST['pass']);
	  $pass = strip_tags($pass);
	  $pass = htmlspecialchars($pass);

	
  	$password = hash('sha256', $pass);
		$query = "INSERT INTO users(username,password) VALUES ('$user','$password')";
		$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
		if ($result) {
		    $errTyp = "success";
		    $errMSG = "Votre inscription a été faite, Maintenant vous pouvez vous connectée";
				echo $errMSG;
		    unset($user);
		    unset($pass);
		   } else {
		    $errTyp = "danger";
		    $errMSG = "Il y a un problème qui persiste,veuillez réessayée plus tard";
				echo $errMSG;
		   }
	}

?>
