<?php
/* 
 * Appel des dépendances
 */
// pour la connexion PDO
require 'model/maPDOClass.php';
require 'Model/UserClass.php';
require 'Model/UserManagerClass.php';
// appel de la classe UserManagerClass
// si il on essaye de se déconnecter
if(isset($_GET['deconnect'])){
    // appel de la fonction static
    UserManagerClass::decoUser();
    header("Location: ./");
}
// si il a cliqué sur s'identifier
if(isset($_POST['lelogin'])){
    // création du manager de comment qui nous connecte à la DB (avec affichage erreur)
    $manager = new UserManagerClass(DB_SELECT, DB_USER, DB_PWD, true);
    
    $recup = $manager->verifUser($_POST['lelogin'], $_POST['lepass']);
    
    // si on trouve l'admin (un utilisateur en tout cas)
    if($recup){
        // on met ses champs en session
        $_SESSION = $recup;
        $_SESSION['idsession']=session_id(); // validité de session
        // redirection
        header("Location: ./");
    }else{ // sinon
        $erreur = "Login et/ou mot de passe incorrect";
    }
}
// si il on essaye de se connecter
if(isset($_GET['connect'])){
    // appel de la vue
    include("view/connexion.php");
}