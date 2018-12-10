<?php
session_start();
// Le message
$message = $_SESSION["message"]);

foreach ($_SESSION['sujet'] as $value){
	$sujetMessageEmail += $value; 
}

// Dans le cas où nos lignes comportent plus de 70 caractères, nous les coupons en utilisant wordwrap()
$message = wordwrap($message, 70, "\r\n");

// Envoi du mail
mail('justine.crenier@gmail.com', $sujetMessageEmail, $message);
?>