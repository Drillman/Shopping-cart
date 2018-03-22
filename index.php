<?php 
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Panier</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 class="title home">Un panier XML ?</h1>
    <div class="container center_div">
        <div class="col-md-12">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <input class="form-control-file" type="file" name="fileToUpload" id="fileToUpload"></br>
                <button type="submit" class="btn btn-dark mb-2">Upload</button></br>
            </form>
            <a class="btn btn-dark" href="panier.php">Pas de fichier</a>
        </div>
    </div>
</body>
</html>