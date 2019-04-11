<?php 

if (isset($_POST['login-submit'])) {

 	require 'dbh.inc.php';

 	$mailusername = $_POST['mailuid'];
 	$password = $_POST['pwd'];

 	if(empty($mailusername) || empty($password)){
 		header("Location: ../singin.php?error=emptyfields");
 		exit();
 	}else{
 		$sql="SELECT * FROM users WHERE (USER_NAME=? OR USER_EMAIL=?)";
 		$stmt = mysqli_stmt_init($conn);
 		if (!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../singin.php?error=sqlerror1");
            exit();
        }else{
 		    mysqli_stmt_bind_param($stmt,"ss",$mailusername,$mailusername);
 		    mysqli_stmt_execute($stmt);
 		    $result = mysqli_stmt_get_result($stmt);
 		    if($row = mysqli_fetch_assoc($result)){
                $pwdCheck = password_verify($password,$row['USER_PASSWORD']);
                if($pwdCheck == false){
                    header("Location: ../singin.php?error=wrongpassword");
                    exit();
                }else if($password == true){
                    session_start();
                    $_SESSION['USER_ID'] = $row['ID_USER'];
                    $_SESSION['USER_NAME'] = $row['USER_NAME'];
                    header("Location: ../index.php?login=success");
                    exit();
                }
            }else{
                header("Location: ../singin.php?error=nouser");
                exit();
            }
        }
 	}
 } else{
 	header("Location: ../singin.php?");
 	exit();
 }