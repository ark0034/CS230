<?php

if(isset($_POST['signup-submit'])){

    require 'dbhandler.php';

    $username = $_POST['uname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmed_password = $_POST['confirmpassword'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];

    if ($password !== $confirmed_password) {
        header("Location: ../signup.php?error=diffPasswords");
        exit();
    }

    else {
        $sql = "SELECT uname FROM users WHERE uname=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../pages/signup.php?error=SQLInjection");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $check = mysqli_stmt_num_rows($stmt);

            if($check > 0) {
                header("Location: ../signup.php?error=UsernameTaken");
            exit();
            }
            else {
                $sql = "INSERT INTO users (lname, fname, email, uname, password) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?error=SQLInjection");
                    exit();
                }
                else {
                    $hashed = password_hash($password, PASSWORD_BCRYPT);
                    mysqli_stmt_bind_param($stmt, "sssss", $lname, $fname, $email, $username, $hashed);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);

                    $sqlImg = "INSERT INTO profiles (uname, fname) VALUES ('$username', '$fname')";
                    mysqli_query($conn, $sqlImg);
                    
                    $sqlUid = "SELECT * FROM users WHERE uname='$username'";
                    $query = mysqli_query($conn, $sqlUid);
                    $row = mysqli_fetch_array($query);
                    $uid = $row['uid'];

                    session_start();
                    $_SESSION['uid'] = $uid;
                    $_SESSION['admin'] = 0;
                    $_SESSION['fname'] = $fname;
                    $_SESSION['uname'] = $username;

                    header("Location: ../home.php?signup=success");
                    exit();
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
} else {
    header("Location: ../signup.php");
    exit();
}

