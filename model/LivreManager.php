<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LivreManager
 *
 * @author Stagiaire
 */
class LivreManager {
 protected $db;
    


    public function __construct($dsn,$util,$pass,$erreur=false){
        // on se connecte en utilisant la méthode statique de ma MaPDO
        $this->db = MaPDO::getConnection($dsn,$util,$pass,$erreur);
    }
    
    // on récupère toutes les livres
    public function recupTousLivre(){
        $query = $this->db->query("SELECT * FROM livre ORDER BY id DESC;");
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function recupUnLivre($idart){
         $idart= (int)$idart;
        $query = $this->db->query("SELECT * FROM livre WHERE id=$idart;");
        return $query->fetch(PDO::FETCH_OBJ);
    }
    
}