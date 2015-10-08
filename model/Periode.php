<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Periode
 *
 * @author Stagiaire
 */
class Periode {
      protected $id;
    protected $laperiode;
  
    
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
        
        public function setLaperiode($laperiode){
            // protection contre attaque
            $laperiodeTraite = htmlentities(strip_tags(trim($laperiode)),ENT_QUOTES, "UTF-8");
            $this->laperiode = $laperiodeTraite;
        }
        public function getLaperiode(){
            return $this->laperiode;
        }
     
  
}
