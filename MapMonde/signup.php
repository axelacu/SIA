<?php
	require 'header.php';
?>
	<main>
		<h1>Inscription</h1>
		
		<form action="includes/signup.inc.php" method="post">
			<input type="text" name="uid" placeholder="Username">
			<input type="text" name="mail" placeholder="E-mail">
			<input type="password" name="pwd" placeholder="Password">
			<input type="password" name="pwd-repeat" placeholder="Repear password">
			<button type="submit" name="signup-submit">S'inscrire </button>
		</form>
		
	</main>

<?php
	require 'footer.php';
?>