<?php
session_start();

if(!isset($_SESSION['panier'])){
    $_SESSION['panier'] = array(
        array("id"=>1, "nom"=>'pomme', "prix"=>10, "qte"=>0),
        array("id"=>2, "nom"=>'kiwi', "prix"=>20, "qte"=>0),
        array("id"=>3, "nom"=>'banane', "prix"=>30, "qte"=>0)
    );
    header('Refresh:0');
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

if(isset($_SESSION['panier'])){
    foreach($_SESSION['panier'] as $fruit){
        echo '<div class="fruit"> <h2>'.$fruit['nom'].'</h2>';
        echo '<p>id : '.$fruit['id'].'</p>';
        echo '<p>prix : '.$fruit['prix'].' €</p>';
        echo '<p>quantitée : '.$fruit['qte'].'</p></div>';
        echo '<a href="'.$_SERVER['PHP_SELF'].'?fruit='.$fruit['nom'].'&action=plus">+</a> <a href="'.$_SERVER['PHP_SELF'].'?fruit='.$fruit['nom'].'&action=moins">-</a>';
    }
}

?>
</br>
<a href='kill.php'> Session kill </a></br>
<?php if(isset($_SESSION['error'])){
    echo 'Erreur : '.$_SESSION['error'];
    unset($_SESSION['error']);
}
?>