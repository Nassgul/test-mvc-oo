<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ecrivain
 *
 * @author Stagiaire
 */
class Ecrivain {
    protected $id;
    protected $lenom;
    protected $labio;
    protected $sciecle_id;
    
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
                $nom = 'set' . ucfirst($clef);
                if (method_exists($this, $nom)) {
                    $this->$nom($valeur);
                }
            }
        }
        // Setter et Getter de tous nos champs (attributs, pas de setter pour l'id)
        public function getId(){
            return $this->id;
        }
        
        public function setLenom($lenom){
            // protection contre attaque
            $lenomTraite = htmlentities(strip_tags(trim($lenom)),ENT_QUOTES, "UTF-8");
            $this->lenom = $lenomTraite;
        }
        public function getLenom(){
            return $this->lenom;
        }
        
        public function setLabio($labio){
            // protection contre attaque
            $labioTraite = htmlentities(strip_tags($labio),ENT_QUOTES, "UTF-8");
            $this->labio = $labioTraite;
        }
        public function getLabio(){
            return $this->labio;
        }
        
        public function setSciecle_id($sciecle_id){
            // protection contre attaque
            $sciecle_idTraite = htmlentities(strip_tags($sciecle_id),ENT_QUOTES, "UTF-8");
            $this->sciecle_id = $sciecle_idTraite;
        }
        public function getSciecle_id(){
            return $this->sciecle_id;
        }
}
