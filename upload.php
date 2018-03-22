<?php
session_start();
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$new = $target_dir . generateRandomString() .'.'. $imageFileType;
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $uploadOk =1;
}
if (file_exists($new)) {
    echo "Le fichier éxiste déjà !";
    $uploadOk = 0;
}
if($imageFileType != "xml") {
    echo "Seulement un fichier XML peut être uploadé !";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Le fichier n'a pu être uploadé !";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $new)) {
        $_SESSION['file_path'] = $new;
        echo "Le fichier ". basename( $_FILES["fileToUpload"]["name"]). " a été uploadé";
        header('Location: panier.php');
    } else {
        echo "Érreur lors de l'upload du fichier !";
    }
}
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>
</br>
<a class="btn" href="index.php">Retour à l'index</a>