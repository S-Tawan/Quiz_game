<?php
 require 'server.php';
$ext = pathinfo(basename($_FILES["banner"]["name"]), PATHINFO_EXTENSION);
$new_taget_name = 'banner_' . uniqid() . "." . $ext;
$target_path = "../banner/";
$upload_path = $target_path . $new_taget_name;
$uploadOk = 1;

$imageFileType = strtolower(pathinfo($new_taget_name, PATHINFO_EXTENSION));

if ($_FILES["banner"]["size"] > 8000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if ($imageFileType != "jpg"&&$imageFileType != "png") {
    echo "Sorry, only png,jpg files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
}

else {
    if (move_uploaded_file($_FILES["banner"]["tmp_name"], $upload_path)) {
        echo 'Move success.';
    }else {
        echo 'Move fail';
    }
}

$banner = $_FILES["banner"]["name"];
$b = $new_taget_name;
$_SESSION['name_banner'] = $banner ;
$_SESSION['tmp_banner'] = $b ;
$_SESSION['check_banner'] = 1;

header("Location: ../setting.php");
?>