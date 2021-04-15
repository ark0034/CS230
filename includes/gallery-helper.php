<?php
require 'dbhandler.php';
session_start();

define('KB', 1024);
define('MB', 1048576);

if(isset($_POST['gallery-submit'])){

    $file = $_FILES['gallery-image'];
    $file_name = $file['name'];
    $file_tmp_Name = $file['tmp_name'];
    $file_error = $file['error'];
    $file_size = $file['size'];

    $title = $_POST['title'];
    $description = $_POST['description'];
    
    $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    $allowed = array('jpg', 'jpeg','png','svg');

    if($file_error != 0){
        header("Location: ../admin.php?error=UploadError");
        exit();
    }

    if(!in_array($ext, $allowed)){
        header("Location: ../admin.php?error=InvalidType");
        exit();
    }
    if($file_size > 4*MB){
        header("Location: ../admin.php?error=FileSizeExceeded");
        exit();
    }
    else{
        $new_name = uniqid('', true).".".$ext;

        $destination = '../gallery/'.$new_name;

        $sql = "INSERT INTO gallery (title, descript, picpath) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../admin.php?error=SQLInjection");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "sss", $title, $description, $destination);
            mysqli_stmt_execute($stmt);
            move_uploaded_file($file_tmp_Name, $destination);
            header("Location: ../admin.php?success=GalleryUploadSuccess");
            exit();
        }
        
    }

}
else{
    header("Location: ../admin.php");
    exit();
}