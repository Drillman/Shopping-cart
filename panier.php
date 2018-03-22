<?php
session_start();

require 'panier_class.php';
$panier = new Panier;

if(!isset($_SESSION['file_path']) && !isset($_SESSION['panier'])){
   $panier->generate();
}
else if(!isset($_SESSION['panier'])){
    $panier->set($_SESSION['file_path']);
}

if(isset($_GET['fruit']) && isset($_GET['action'])){
    $fruit = $_GET['fruit'];
    $array_id = null;
    $action = $_GET['action'];

    for($i = 0; $i < sizeof($_SESSION['panier']); $i++){
        if($_SESSION['panier'][$i]['nom'] == $fruit){
            $array_id = $i;
        }
    }
    switch ($action){
        case 'plus':
            $_SESSION['panier'][$array_id]['qte'] ++;
            break;
        case 'moins':
            if($_SESSION['panier'][$array_id]['qte'] > 0){
                $_SESSION['panier'][$array_id]['qte'] --;
            }
            else{
                $_SESSION['error'] = 'Impossible de diminuer le fruit !';
            }
            break;
        default :
            $_SESSION['error'] = 'Action inconnue !';
            break;
        }
}
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
<header>
<h1 class="title">Panier</h1></header>
<div class="container">
<?php
if(isset($_SESSION['panier'])){
    foreach($_SESSION['panier'] as $fruit){
        echo '<div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">'.$fruit['nom'].'</h5>';
        echo '<p class="card-text">id : '.$fruit['id'].'</p>';
        echo '<p class="card-text">prix : '.$fruit['prix'].' €</p>';
        echo '<p class="card-text">quantitée : '.$fruit['qte'].'</p>';
        echo '<a class="card-link" href="'.$_SERVER['PHP_SELF'].'?fruit='.$fruit['nom'].'&action=plus">+</a> <a class="card-link" href="'.$_SERVER['PHP_SELF'].'?fruit='.$fruit['nom'].'&action=moins">-</a></div></div>';
    }
}
?>
</div>
</br>
<?php if(isset($_SESSION['error'])){
    echo '<div class="alert alert-danger" role="alert">
  '.$_SESSION['error'].'</div>';
    unset($_SESSION['error']);
}
?>
<a class="btn btn-dark" href='index.php'>Retour Index</a>
</body>
</html>
