<?php


/**
 * Description of UserClass
 *
 * @author webform
 */
class UserClass {
    protected $id;
    protected $lelogin;
    protected $lepass;
    protected $ledroit;
    
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
        
        public function setLelogin($lelogin){
            // protection contre attaque
            $leloginTraite = htmlentities(strip_tags(trim($lelogin)),ENT_QUOTES, "UTF-8");
            $this->lelogin = $leloginTraite;
        }
        public function getLelogin(){
            return $this->lelogin;
        }
        
        public function setLepass($lepass){
            // protection contre attaque
            $lepassTraite = htmlentities(strip_tags($lepass),ENT_QUOTES, "UTF-8");
            $this->lepass = $lepassTraite;
        }
        public function getLepass(){
            return $this->lepass;
        }
        
        public function setLedroit($ledroit){
            // protection contre attaque
            $ledroitTraite = htmlentities(strip_tags($ledroit),ENT_QUOTES, "UTF-8");
            $this->ledroit = $ledroitTraite;
        }
        public function getLedroit(){
            return $this->ledroit;
        }
}
