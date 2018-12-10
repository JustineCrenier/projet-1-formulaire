<?php
	session_start();
	//vérifie que le formulaire est rempli
	if(empty($_POST['first_name'])){
			$_SESSION["errorMessageFirst"] = "remplissez avec votre prénom";
		}else{
			$_SESSION["errorMessageFirst"] = " ";
		}
		if(empty($_POST['last_name'])){
			$_SESSION["errorMessageLast"] = "remplissez avec votre nom";
		}else{
			$_SESSION["errorMessageLast"] = " ";
		}
		if(empty($_POST['email'])){
			$_SESSION["errorMessageEmail"] = "remplissez avec votre email";
		}else{
			$_SESSION["errorMessageEmail"] = " ";
		}
		if(empty($_POST['pays'])){
			$_SESSION["errorMessagePays"] = "remplissez avec votre pays";
		}else{
			$_SESSION["errorMessagePays"] = " ";
		}
		if(empty($_POST['message'])){
			$_SESSION["errorMessage"] = "remplissez avec votre message";
		}else{
			$_SESSION["errorMessage"] = " ";
		}
	if(!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['genre']) && !empty($_POST['pays']) && !empty($_POST['sujet']) && !empty($_POST['message'])){
		$isset = true;
	}
	//vérifie que le genre est conforme à la valeur attendue
	if($_POST['genre'] == "Homme" || $_POST['genre'] == "Femme"){
		$sex = true;
	}else{
		$_SESSION["errorMessageSex"] = "Sélectionner votre genre";
	}
	//vérifie que le sujet est conforme à la valeur attendue
	foreach ($_POST['sujet'] as $selectedOption) {
		if($selectedOption == "autre" || $selectedOption == "kits" || $selectedOption == "livraison" || $selectedOption == "commande"){
			$sujetMessage = true;
		}else{
			$_SESSION["errorMessageSujet"] = "sélectionner un sujet de la liste !";
		}
	}
	//Si c'est juste, le formulaire est sanatize
	if($isset == true && $sex == true && $sujetMessage == true){
		$_SESSION["sujet"] = $_POST['sujet'];
		$subject = $_POST['sujet'];
		//créer un tableau qui contient les filtres
		$options = array(
			'first_name' 	=> FILTER_SANITIZE_STRING,
			'last_name' 	=> FILTER_SANITIZE_STRING,
			'email' 		=> FILTER_VALIDATE_EMAIL,
			'genre' 		=> FILTER_SANITIZE_STRING,
			'pays' 			=> FILTER_SANITIZE_STRING,
			'message' 		=> FILTER_SANITIZE_STRING);
		//on crée une variable $result avec la fonction filter_input_array
		$result = filter_input_array(INPUT_POST, $options);
		$result += filter_var_array($subject,FILTER_SANITIZE_STRING);
	}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Hackers poulette</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css"/>
	<link rel="stylesheet" href="../css/main.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="La société Hackers Poulette ™ vend des kits et accessoires pour Rasperri Pi à monter soi-même.">
</head>
<body class="traitement">
	<?php if($result != null AND $result != FALSE): ?>
		<form class="wrapper" method="POST" action="envoi.php">
			<h2>Le formulaire est correcte</h2>
			<p class="verifier">Vérifier vos informations</p>
			<?php foreach($result as $key => $value): ?> 
				<?php $result[$key]=trim($result[$key]);
				$_SESSION[$key] = $result[$key];
				?>
	        	<p><?php echo $key.": ".$result[$key]; ?></p>
			<?php endforeach;?>
			<input type="submit" value="Envoyer le formulaire" class="btn waves-effect"></input>
			<a href="../../index.php">Modifier mes informations</a>
		</form>
	<?php else: ?>
		<?php foreach($result as $key => $value): ?> 
			<?php $result[$key]=trim($result[$key]);
			$_SESSION[$key] = $result[$key];
			?>
		<?php endforeach;?>
		<div class="wrapper">
			<h2>Votre formulaire présente plusieurs erreures</h2>
			<a href="../../index.php">Corriger mon formulaire</a>
			<p class="error"><?php echo $_SESSION["errorMessageFirst"]; ?></p>
			<p class="error"><?php echo $_SESSION["errorMessageLast"]; ?></p>
			<p class="error"><?php echo $_SESSION["errorMessageEmail"]; ?></p>
			<p class="error"><?php echo $_SESSION["errorMessagePays"]; ?></p>
			<p class="error"><?php echo $_SESSION["errorMessageSex"]; ?></p>
			<p class="error"><?php echo $_SESSION["errorMessageSujet"]; ?></p>
			<p class="error"><?php echo $_SESSION["errorMessage"]; ?></p>
		</div>
	<?php endif; ?>
	<!--JavaScript at end of body for optimized loading-->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/materialize.min.js"></script>
</body>
</html>