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
       
        $query = $this->db->prepare("INSERT INTO ecrivain VALUES (NULL,?,?,?);");
        $query->bindValue(2, $objet->getLabio(), PDO::PARAM_STR);
        $query->bindValue(1, $objet->getLenom(), PDO::PARAM_STR);
        $query->bindValue(3, $objet->getSciecle_id(), PDO::PARAM_INT);

        return $query->execute();
    }

    public function updateEcrivain($id, Ecrivain $objet) {
        $id = (int) $id;
        $prepare = $this->db->prepare("UPDATE ecrivain SET labio=?, lenom=?, sciecle_id=? WHERE id = $id");
        $prepare->bindValue(1, $objet->getLabio(), PDO::PARAM_STR);
        $prepare->bindValue(2, $objet->getLenom(), PDO::PARAM_STR);
        $prepare->bindValue(3, $objet->getSciecle_id(), PDO::PARAM_INT);
        return $prepare->execute();
    }

    public function deleteEcrivain($id) {
        $id = (int) $id;
        return $this->db->exec("DELETE FROM ecrivain WHERE id=$id");
    }
    public function detailEcrivain($idart) {
        $this->db->exec("SET SESSION group_concat_max_len=10000000");
        $idart = (int) $idart;
        $query = $this->db->query("SELECT e.id,e.lenom,e.labio, group_concat(l.letitre separator '||') titres, group_concat(l.id separator '||') zeuid,
                                    group_concat(l.lasortie separator '||') parution,
                                    group_concat(l.ladescription separator '||') résumé FROM ecrivain e 
                                    left join livre l on e.id = l.ecrivain_id where e.id=$idart group by e.id;");
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}
