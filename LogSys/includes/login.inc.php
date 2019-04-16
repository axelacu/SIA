<?php 

if (isset($_POST['login-submit'])) {

 	require 'dbh.inc.php';

 	$mailusername = $_POST['mailuid'];
 	$password = $_POST['pwd'];

 	if(empty($mailusername) || empty($password)){
 		header("Location: ../singin.php?error=emptyfields");
 		exit();
 	}else{
 		$sql="SELECT ID, USER_NAME, USER_MAIL, PASSWORD ,TYPE
                 FROM (SELECT ID_USER as ID, USER_NAME as USER_NAME,USER_EMAIL as USER_MAIL, USER_PASSWORD as PASSWORD, 'C' as TYPE 
                    FROM USERS
                    UNION
                    SELECT ID_EMPLOYEE as ID, EMPLOYEE_NAME as USER_NAME, EMPLOYEE_MAIL as USER_MAIL, EMPLOYEE_PASSWORD as PASSWORD, EMPLOYEE_STATUS as TYPE
                    FROM employee) as PERSONNE
                 WHERE (USER_NAME=? OR USER_MAIL=?)";
 		$stmt = mysqli_stmt_init($conn);
 		if (!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../singin.php?error=sqlerror1");
            exit();
        }else{
 		    mysqli_stmt_bind_param($stmt,"ss",$mailusername,$mailusername);
 		    mysqli_stmt_execute($stmt);
 		    $result = mysqli_stmt_get_result($stmt);
 		    if($row = mysqli_fetch_assoc($result)){
                $pwdCheck = password_verify($password,$row['PASSWORD']);
                if($pwdCheck == false){
                    header("Location: ../singin.php?error=wrongpassword");
                    exit();
                }else if($password == true){
                    session_start();
                    $_SESSION['USER_ID'] = $row['ID'];
                    $_SESSION['USER_NAME'] = $row['USER_NAME'];
                    $_SESSION['TYPE_USER'] = $row['TYPE'];
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