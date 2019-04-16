<?php
/**
 * Created by PhpStorm.
 * User: shirelmatti
 * Date: 2019-04-12
 * Time: 17:19
 */

require 'dbh.inc.php';

$sql = "INSERT INTO users (USER_NAME,USER_EMAIL,USER_PASSWORD) VALUES (?, ?, ?)";
if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: ../signup.php?error=sqlerror2");
    exit();
} else{
    //The second parametter is alway updating by php and then is really secure.
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    //J'ai trois placeholder dont il me faut 3 s, trois string. car mes trois paramettre c'est des string
    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    header("Location: ../signup.php?signup=success");
    exit();
}



$reqOne='UPDATE DEMAND SET ACCEPTED=TRUE WHERE ID_USER='.$_SESSION['USER_ID'];
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: ../signup.php?error=sqlerror2");
    exit();
}else{

}









    $reqTwo='SELECT D.ID_DEMAND, D.REMARQUE, D.DATE_START, D.DATE_END, I.LABEL, I.DESCRIPTION, D.QUANTITE_DEMAND, I.FILE_NAME, I.PRIX FROM DEMAND D, OFFRE I WHERE D.ID_OFFRE=I.ID_OFFRE AND D.ID_USER='.$_SESSION['USER_ID'];

$resultOne = mysqli_query($conn,$reqOne);
$resultTwo = mysqli_query($conn,$reqTwo);
echo "k";
while ($donnees = mysqli_fetch_row($resultTwo)) {
    echo $donnees;
    $reqThree='INSERT INTO COMMAND(ID_DEMAND, DATE_COMMAND, DATE_START,DATE_END) VALUES('.$donnees[0].','.date(DATE_RSS).','.$donnees[2].','.$donnees[3].')';
    $resultThree = mysqli_query($conn,$reqThree);

}
