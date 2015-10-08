<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EcrivainAdminManager
 *
 * @author Stagiaire
 */
class EcrivainAdminManager extends EcrivainManager {

    // on insère une instance créée depuis Ecrivain
    public function recupEcrivain($id) {
        $id =(int)$id;
        $this->db->exec("SET SESSION group_concat_max_len=10000000" );
        $query = $this->db->query("select e.lenom,e.labio,
            group_concat(l.letitre separator '||') Livre,
            group_concat(l.ladescription separator'||') Résumé, 
            group_concat(l.lasortie separator '||') Sortie
            from livre l 
            inner join ecrivain e
            on e.sciecle_id = l.ecrivain_id Where e.id=$id
            group by e.lenom order by e.id ;");      
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function insertEcrivain(Ecrivain $objet) {
        $query = $this->db->prepare("INSERT INTO ecrivain VALUES (NULL,?,?);");
        $query->bindValue(1, $objet->getLabio(), PDO::PARAM_STR);
        $query->bindValue(2, $objet->getLenom(), PDO::PARAM_STR);
        $query->bindValue(3, $objet->getSciecle_id(), PDO::PARAM_STR);

        return $query->execute();
    }

    public function updateEcrivain($id, Ecrivain $objet) {
        $id = (int) $id;
        $prepare = $this->db->prepare("UPDATE comment SET lenom=?, letexte=?, ladate=? WHERE id = $id");
        $prepare->bindValue(1, $objet->getLabio(), PDO::PARAM_STR);
        $prepare->bindValue(2, $objet->getLenom(), PDO::PARAM_STR);
        $prepare->bindValue(3, $objet->getSciecle_id(), PDO::PARAM_STR);
        return $prepare->execute();
    }

    public function deleteEcrivain($id) {
        $id = (int) $id;
        return $this->db->exec("DELETE FROM comment WHERE id=$id");
    }

}
