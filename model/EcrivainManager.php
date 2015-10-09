<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EcrivainManager
 *
 * @author Stagiaire
 */
class EcrivainManager {

    protected $db;

    public function __construct($dsn, $util, $pass, $erreur = false) {
        // on se connecte en utilisant la méthode statique de ma MaPDO
        $this->db = MaPDO::getConnection($dsn, $util, $pass, $erreur);
    }

    // on récupère toutes les ecrivains
    public function recupTousEcrivain() {
        $this->db->exec("SET SESSION group_concat_max_len=10000000");
        $query = $this->db->query("SELECT * FROM ecrivain ORDER BY id DESC;");
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function recupUnEcrivain($idart) {
        $this->db->exec("SET SESSION group_concat_max_len=10000000");
        $idart = (int) $idart;
        $query = $this->db->query("SELECT * FROM ecrivain WHERE id=$idart;");
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function hasardEcrivain() {
        $this->db->exec("SET SESSION group_concat_max_len=10000000");
        $query = $this->db->query("SELECT * FROM ecrivain order by RAND() limit 1;");
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function detailEcrivain($idart) {
        $this->db->exec("SET SESSION group_concat_max_len=10000000");
        $idart = (int) $idart;
        $query = $this->db->query("SELECT e.id,e.lenom,e.labio, group_concat(l.letitre separator '||') titres, group_concat(l.id separator '||') zeuid,
                                    group_concat(l.lasortie separator '||') parution,
                                    group_concat(l.ladescription separator '||') résumé FROM ecrivain e 
                                    inner join livre l on e.id = l.ecrivain_id where e.id=$idart group by e.id;");
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

}
