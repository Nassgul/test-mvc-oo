<?php

/**
 * Description of PeriodeManager
 *
 * @author Stagiaire
 */
class PeriodeManager {

    protected $db;

    public function __construct($dsn, $util, $pass, $erreur = false) {
        // on se connecte en utilisant la méthode statique de ma MaPDO
        $this->db = MaPDO::getConnection($dsn, $util, $pass, $erreur);
    }

    // on récupère toutes les periodes
    public function recupTousPeriode() {
        $query = $this->db->query("SELECT * FROM periode ORDER BY id ASC;");
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function recupUnPeriode($id) {
        $this->db->exec("SET SESSION group_concat_max_len=10000000" );
        $id=(int)$id;
        $query = $this->db->query("SELECT group_concat(e.id separator '||') idauteur, group_concat(e.lenom separator '||') Écrivains,group_concat(e.labio separator '||') Bios, 
p.laperiode FROM periode p inner join ecrivain e on e.sciecle_id=p.id where p.id=$id;");
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

}
