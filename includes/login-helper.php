<?php

if(isset($_POST['login-submit'])){

    require 'dbhandler.php';

    $uname = $_POST['uname_email'];
    $passw = $_POST['password'];

    if (empty($uname) || empty($passw)) {
        header("Location: ../login.php?error=EmptyField");
        exit();
    }

    $sql = "SELECT * FROM users WHERE uname=? OR email=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../login.php?error=SQLInjection");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "ss", $uname, $uname);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $data = mysqli_fetch_assoc($result);

        if (empty($data)) {
            header("Location: ../login.php?error=UserDNE");
            exit();
        }
        else {
            $pass_check = password_verify($passw, $data['password']);
            if($pass_check == true){
                session_start();
                $_SESSION['uid'] = $data['uid'];
                $_SESSION['admin'] = $data['admin'];
                $_SESSION['fname'] = $data['fname'];
                $_SESSION['uname'] = $data['uname'];

                header("Location: ../home.php?success=login");
                exit();
            }else{
                header("Location: ../login.php?error=WrongPass");
                exit();
            }
        }
    }

}else{
    header("Location: ../login.php");
    exit();
}