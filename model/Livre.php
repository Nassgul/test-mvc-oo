<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of livre
 *
 * @author Stagiaire
 */
class Livre {
//
    //Attributs
    //
    
    protected $id;
    protected $letitre;
    protected $ladescription;
    protected $lasortie;
    protected $ecrivain_id;
    
    //
    // Méthodes
    //
            // Constructeur qui attend un tableau en paramètre
            public function __construct(array $valeurs){
                // on utilise les setters pour remplir les attributs de l'object (sauf $id) grâce à trouveSetter
                $this->trouveSetter($valeurs);
            }
        
        // fonction qui remplit à la volée les setters de l'objet lors de l'instanciation (appelée dans le construct), c'est l'hydratation de l'instance
        private function trouveSetter($param) {
            foreach ($param as $clef => $valeur) {
                $titre = 'set' . ucfirst($clef);
                if (method_exists($this, $titre)) {
                    $this->$titre($valeur);
                }
            }
        }
    public function getId(){
            return $this->id;
        }
        
        public function setLetitre($titre){
            // protection contre attaque
            $titreTraite = htmlentities(strip_tags(trim($titre)),ENT_QUOTES, "UTF-8");
            $this->letitre = $titreTraite;
        }
        public function getLetitre(){
            return $this->letitre;
        }
        
        public function setLadescription($description){
            // protection contre attaque
            $descriptionTraite = htmlentities(strip_tags($description),ENT_QUOTES, "UTF-8");
            $this->ladescription = $descriptionTraite;
        }
        public function getLadescription(){
            return $this->ladescription;
        }
        
        public function setLasortie($sortie){
            // protection contre attaque
            $sortieTraite = htmlentities(strip_tags($sortie),ENT_QUOTES, "UTF-8");
            $this->lasortie = $sortieTraite;
        }
        public function getLasortie(){
            return $this->lasortie;
        }
        public function setEcrivain_id($ecrivain_id){
            // protection contre attaque
            $ecrivain_idTraite = htmlentities(strip_tags($ecrivain_id),ENT_QUOTES, "UTF-8");
            $this->ecrivain_id = $ecrivain_idTraite;
        }
        public function getEcrivain_id(){
            return $this->ecrivain_id;
        }
}
