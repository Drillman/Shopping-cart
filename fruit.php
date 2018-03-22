<?php 

class fruit {

    private $nom;
    private $id;
    private $prix;
    private $qte;

    public function __construct($nom, $id, $prix, $qte) {
        $this->nom = $nom;
        $this->id = $id;
        $this->prix = $prix;
        $this->qte = $qte;
    }

    public function add(){
        $this->qte ++;
    }

    public function less(){
        if($this->qte > 0){
            $this->qte --;
        }
    }
}