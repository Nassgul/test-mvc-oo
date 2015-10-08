<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PeriodeManager
 *
 * @author Stagiaire
 */
class PeriodeManager {
protected $db;
    


    public function __construct($dsn,$util,$pass,$erreur=false){
        // on se connecte en utilisant la méthode statique de ma MaPDO
        $this->db = MaPDO::getConnection($dsn,$util,$pass,$erreur);
    }
    
    // on récupère toutes les periodes
    public function recupTousPeriode(){
        $query = $this->db->query("SELECT * FROM periode ORDER BY id ASC;");
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function recupUnPeriode(Periode $idart){
         $idart= (int)$idart;
        $query = $this->db->query("SELECT * FROM periode WHERE id=$idart;");
        return $query->fetch(PDO::FETCH_OBJ);
    }
    
  
}