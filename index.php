<?php 
	session_start();
?>
<!DOCTYPE html>
  <html lang="fr">
    <head>
    	<title>Hackers Poulette ™</title>
      	<!--Import Google Icon Font-->
      	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      	<!--Import materialize.css-->
      	<link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css"/>
		<link rel="stylesheet" href="assets/css/main.css">

      	<!--Let browser know website is optimized for mobile-->
      	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      	<meta name="description" content="La société Hackers Poulette ™ vend des kits et accessoires pour Rasperri Pi à monter soi-même.">
    </head>
    <body>
    	  <img src="assets/img/hackers-poulette-logo.png" alt="Logo de hackers Poulette">
		  <div class="container form">
		    <form method="POST" action="assets/php/traitement.php" class="col s12">
		      <div class="row">
		        <div class="input-field col s4">
		          <input id="first_name" name="first_name" type="text" value="<?php echo($_SESSION["first_name"]); ?>">
		          <label for="first_name">Prénom</label>
		          <p class="error"><?php echo $_SESSION["errorMessageFirst"]; ?></p>
		        </div>
		        <div class="input-field col s4">
		          <input id="last_name" name="last_name" type="text" value="<?php echo($_SESSION["last_name"]); ?>">
		          <label for="last_name">Nom</label>
		          <p class="error"><?php echo $_SESSION["errorMessageLast"]; ?></p>
		        </div>
		        <div class="input-field col s4">
		          <input id="email" name="email" type="email" value="<?php echo($_SESSION["email"]); ?>">
		          <label for="email">Email</label>
		          <p class="error"><?php echo $_SESSION["errorMessageEmail"]; ?></p>
		        </div>
		      </div>
		      <div class="row">
		      	<div class="radio col s4">
		      		<span class="genre">Genre:</span>
					<label>
					  <input class="with-gap" name="genre" type="radio" value="Homme" <?php if($_SESSION["genre"] == "Homme"){echo checked;} ?> />
					  <span>Homme</span>
					</label>
					<label>
					  <input class="with-gap" name="genre" type="radio" value="Femme" <?php if($_SESSION["genre"] == "Femme"){echo checked;} ?> />
					  <span>Femme</span>
					</label>
					<p class="error"><?php echo $_SESSION["errorMessageSex"]; ?></p>
		      	</div>
		      	
		      	<div class="input-field col s4">
					<input name="pays" id="pays" type="text" value="<?php echo($_SESSION["pays"]); ?>">
		          	<label for="pays">Pays</label>
		          	<p class="error"><?php echo $_SESSION["errorMessagePays"]; ?></p>
				</div>
				<div class="input-field col s4">
				  <select multiple name="sujet[]">
				    <option value="kits" 
				    <?php foreach ($_SESSION['sujet'] as $value) {
				    	if ($value == kits) {
				    		echo selected;
				    	}
				    } ?>>Au sujet de nos kits</option>
				    <option value="commande"
				    <?php foreach ($_SESSION['sujet'] as $value) {
				    	if ($value == "commande") {
				    		echo selected;
				    	}
				    } ?>>votre commande</option>
				    <option value="livraison"
				    <?php foreach ($_SESSION['sujet'] as $value) {
				    	if ($value == "livraison") {
				    		echo selected;
				    	}
				    } ?>>livraison</option>
				    <option value="autre" selected>Autre</option>
				  </select>
				  <label>De quoi voulez-vous nous parler ?</label>
				  <p class="error"><?php echo $_SESSION["errorMessageSujet"]; ?></p>
				</div>
		      </div>
		      <div class="row">
		        <div class="input-field col s12">
		          <textarea id="textarea" class="materialize-textarea" name="message"><?php echo($_SESSION["message"]); ?></textarea>
		          <label for="textarea" class='active'>Message</label>
		          <p class="error"><?php echo $_SESSION["errorMessage"]; ?></p>
		        </div>
		      </div>
		      <div class="row center">
		      	<input type="submit" value="submit" class="btn waves-effect" id="submit">
		      </div>
		    </form>
		  </div>
      	<!--JavaScript at end of body for optimized loading-->
      	<script src="assets/js/jquery-3.3.1.min.js"></script>
      	<script src="assets/js/materialize.min.js"></script>
      	<script src="assets/js/main.js"></script>
    </body>
  </html>