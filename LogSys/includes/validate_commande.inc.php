<?php
/**
 * Created by PhpStorm.
 * User: axel_
 * Date: 17/04/2019
 * Time: 23:46
 */

if(isset($_GET['submit-command'])){
    if(isset($_GET['IDS'])){

        $ids = $_GET['IDS'];
        $ids = explode(',',$ids);

        require 'dbh.inc.php';

        $stmt = mysqli_stmt_init($conn);

        $sql = 'UPDATE COMMAND
                SET VALIDATE_COMMAND = ?, DATE_COMMAND = CURRENT_DATE 
                WHERE ID_COMMAND = ?';

        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo 'ERROR!';
            exit();
        } else {

            for ($i = 1; $i < count($ids); $i++) {
                $id = (int) $ids[$i];
                $val = 1;
                //s for string is the data type, b = boolean, etc..
                mysqli_stmt_bind_param($stmt, "ii", $val,$id);
                mysqli_stmt_execute($stmt);

                header('Location: ../commands_pro.php');
            }
        }
    }
}