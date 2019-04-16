<?php
/**
 * Created by PhpStorm.
 * User: axel_
 * Date: 16/04/2019
 * Time: 17:49
 */
	require 'header.php';
?>
    <main>
        <section class="blanc" id="signin">
            <div class="inscription">
                <h1>Sign Up</h1>
            </div>
            <p id="texte2">Please fill in this form to create an account.</p>

            <form action="includes/signup.inc.php" method="post">
                <div class="signup_in">

                    <label for="username"><b>Username</b></label>
                    <input type="text" name="uid" placeholder="Username">

                    <label for="radio"> <b> USER TYPE </b> </label>
                    <br>
                    <input type="radio" name="type" value="C" id=""> Commercial <br>
                    <input type="radio" name="type" value="M" id="serv"> Material manager <br>
                    <input type="radio" name="type" value="R" id="serv"> Admin <br>
                    <br>
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