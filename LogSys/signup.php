<?php
	require 'header.php';
?>
	<main>
        <section class="blanc">
            <div class="inscription">
                <h1>Sign Up</h1>
            </div>
            <p id="texte2">Please fill in this form to create an account.</p>

                <form action="includes/signup.inc.php" method="post">
                    <div class="signup_in">

                        <label for="username"><b>Username</b></label>
                        <input type="text" name="uid" placeholder="Username">

                        <label for="email"><b>Email</b></label>
                        <input type="text" name="mail" placeholder="E-mail">

                        <label for="psw"><b>Password</b></label>
                        <input type="password" name="pwd" placeholder="Password">

                        <label for="psw-repeat"><b>Repeat Password</b></label>
                        <input type="password" name="pwd-repeat" placeholder="Repeat password">

                        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

                        <div class="clearfix">
                            <button type="button" class="cancelbtn">Cancel</button>
                            <button type="submit" name="signup-submit" class="signupbtn">Sign Up</button>
                        </div>
                    </div>
                </form>
        </section>

	</main>

<?php
	require 'footer.php';
?>