<?php
$error = "0";
$maxSize = 3 * 1024 * 1024;
$extensions = array('png', 'gif', 'jpg', 'jpeg');

if(isset($_POST['file'])) {
    $file = $_FILES['file'];
    $info = pathinfo($_POST['file']);
    $tmp_name = $_FILES['file']['tmp_name'];
    $name = $_FILES['file']['name'];


    if(in_array($info['extension'], $extensions)) {
        if($file['size'] <= $maxSize) {
            move_uploaded_file($tmp_name, 'upload/' . $name);
        }
        else {
            $error = "La taille du fichier est trop grande (max 3 mo) !";
        }
    }
    else {
        $error = "Oh non, le type de fichier n'est pas valide !";
    }

    header("location: index.php?error=$error");
}
else {
    $error = " Oups, il s'est produit une erreur lors de l'upload";


    header("location: index.php?error=$error");
}