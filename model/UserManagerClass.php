<?php

/**
 * Description of UserManagerClass
 *
 * @author webform
 */
class UserManagerClass {
    // contiendra la connexion
    protected $db;
    
    public function __construct($dsn,$util,$pass,$erreur=false){
        // on se connecte en utilisant la méthode statique de ma MaPDO
        $this->db = MaPDO::getConnection($dsn,$util,$pass,$erreur);
    }
    
    public function verifUser($login,$pass) {
        $query = $this->db->prepare("SELECT * FROM util WHERE lelogin=? AND lepass=?;");
        $query->bindValue(1,$login,PDO::PARAM_STR);
        $query->bindValue(2,$pass,PDO::PARAM_STR);
        $query->execute();
        // récupère un tableau (pour transformer en session)  ou false
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    
    public static function decoUser(){
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]
            );
        }

// Finalement, on détruit la session.
        session_destroy();
    }
}
