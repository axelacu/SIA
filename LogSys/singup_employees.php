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

            <form action="includes/register_employees.inc.php" method="post">
                <div class="signup_in">

                    <label for="username"><b>Username</b></label>
                    <input type="text" name="uid" placeholder="Username">


                    <label for="lastname"><b>Email</b></label>
                    <input type="text" name="lastname" placeholder="Last Name">

                    <label for="radio"> <b> USER TYPE </b> </label>
                    <br>
                    <input type="radio" name="status" value="C" id=""> Commercial <br>
                    <input type="radio" name="status" value="M" id="serv"> Material manager <br>
                    <input type="radio" name="status" value="R" id="serv"> Admin <br>
                    <br>
                    <label for="email"><b>Email</b></label>
                    <input type="text" name="mail" placeholder="E-mail">

                    <label for="psw"><b>Password</b></label>
                    <input type="password" name="pwd" placeholder="Password">

                    <label for="psw-repeat"><b>Repeat Password</b></label>
                    <input type="password" name="pwd-repeat" placeholder="Repeat password">


                    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

                    <div class="clearfix">
                        <button type="submit" name="signup-submit-employees" class="signupbtn">Sign up Employees</button>
                    </div>
                </div>
            </form>
        </section>

    </main>

<?php
	require 'footer.php';
?>