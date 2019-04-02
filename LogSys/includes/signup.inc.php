<?php
//verifié si la personne bien cliquer sur le bouton s'inscrire avant de donner accès à cette page.
if (isset($_POST['signup-submit'])) { 
	require 'dbh.inc.php';

	$username = $_POST['uid'];
	$email = $_POST['mail'];
	$password = $_POST['pwd'];
	$passwordRepeat = $_POST['pwd-repeat'];

	if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
		header("Location: ../signup.php?error=emptyfields&uid=".$username."&email=".$email);
	}
}