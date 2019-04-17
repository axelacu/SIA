<?php
/**
 * Created by PhpStorm.
 * User: axel_
 * Date: 16/04/2019
 * Time: 19:05
 */
if (isset($_POST['signup-submit-employees'])) {
    require 'dbh.inc.php';
    $username = $_POST['uid'];
    $lastname = $_POST['lastname'];
    $status = $_POST['status'];
    $email = $_POST['mail'];
    $social = $_POST['social'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location: ../singup_employees.php?error=emptyfields&uid=".$username."&email=".$email);
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username) ){
        header("Location: ../singup_employees.php");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../singup_employees.php?error=invalidmail&uid=".$username);
        exit();
    }
    //chercher de partern
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../singup_employees.php?error=invaliduid&mail=".$email);
    }
    else if($password !== $passwordRepeat){
        header("Location: ../singup_employees.php?error=emptyfields&uid=".$username."&email=".$email);
        exit();
    }
    else{
        //SAFE SQL REQUEST
        $sql = "SELECT EMPLOYEE_NAME FROM EMPLOYEE WHERE EMPLOYEE_NAME=?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../singup_employees.php?error=sqlerror1");
            exit();
        } else{
            //s for string is the data type, b = boolean, etc..
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            //take resulte and store back dans la variable en parametre
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt); //verify combien de ligne dans la requete.
            if($resultCheck > 0){
                header("Location: ../singup_employees.php?error=usertaken");
                exit();
            } else{
                $sql = "INSERT INTO EMPLOYEE (EMPLOYEE_NAME,EMPLOYEE_LAST_NAME,NUM_SECURITE_SOCIAL,EMPLOYEE_MAIL,EMPLOYEE_PASSWORD,EMPLOYEE_STATUS) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../singup_employees.php?error=sqlerror2");
                    exit();
                } else{
                    //The second parametter is alway updating by php and then is really secure.
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    //J'ai trois placeholder dont il me faut 3 s, trois string. car mes trois paramettre c'est des string
                    mysqli_stmt_bind_param($stmt, "ssssss", $username,$lastname, $social, $email, $hashedPwd, $status);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../singup_employees.php?signup=success");
                    exit();
                }

            }

        }

    }
    //closing  the STATEMENt !!!!!
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}else{
    header("Location: ../singup_employees.php?");
    exit();
}