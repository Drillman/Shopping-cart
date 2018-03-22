<?php

class Panier {

    public function set($path){
        $xmlDoc = new DOMDocument();
        $xmlDoc->load($path);
        $array = [];

        foreach($xmlDoc->getElementsByTagName('fruit') as $item){
            $enfants = $item->childNodes;
            $id;
            $nom;
            $prix;
            $qte;

            foreach($enfants as $enfant){
                $name = $enfant->nodeName;
                $value = $enfant->nodeValue;
                switch ($name){
                    case 'id':
                        $id = $value;
                        break;
                    case 'nom':
                        $nom = $value;
                        break;
                    case 'prix':
                        $prix = $value;
                        break;
                    case 'qte':
                        $qte = $value;
                        break;
                }
            }
            $temp_array = array("id"=>$id, "nom"=>$nom, "prix" => $prix, "qte" => $qte);
            array_push($array, $temp_array);
        }
        $_SESSION['panier'] = $array;
    }
    public function generate(){
        $_SESSION['panier'] = array(
            array("id"=>1, "nom"=>'pomme', "prix"=>10, "qte"=>0),
            array("id"=>2, "nom"=>'kiwi', "prix"=>20, "qte"=>0),
            array("id"=>3, "nom"=>'banane', "prix"=>30, "qte"=>0)
        );
    }
}

?>