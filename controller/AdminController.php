<?php

require 'model/maPDOClass.php';
require 'Model/UserClass.php';
require 'Model/UserManagerClass.php';
require 'model/Ecrivain.php';
require 'model/EcrivainManager.php';
require 'model/EcrivainAdminManager.php';
require 'model/Periode.php';
require 'model/PeriodeManager.php';
require 'model/Livre.php';
require 'model/LivreManager.php';
require 'model/LivreAdminManager.php';
$manager = new EcrivainManager(DB_SELECT, DB_USER, DB_PWD, true);
$menu = new PeriodeManager(DB_SELECT, DB_USER, DB_PWD, true);
$bonjour = new UserManagerClass(DB_SELECT, DB_USER, DB_PWD, true);
$salut = $bonjour->recupUser();
$recup_menu = $menu->recupTousPeriode();
$auteur = new EcrivainManager(DB_SELECT, DB_USER, DB_PWD, true);
$hasardecrivain = $auteur->hasardEcrivain();
$epoque = new PeriodeManager(DB_SELECT, DB_USER, DB_PWD, true);
$recup_menu = $menu->recupTousPeriode();
$bouquin= new LivreManager(DB_SELECT, DB_USER, DB_PWD, true);
if (isset($_GET['idperiode'])){
   
$periode=$_GET['idperiode'];

$ere = $epoque->recupUnPeriode($periode);

require_once 'view/PeriodeVue.php';
}
if (isset($_GET['idecrivain'])){
    $numauteur= $_GET['idecrivain'];
    $recupauteur = $auteur->detailEcrivain($numauteur);
    require_once 'view/EcrivainVue.php';
    
}
if (isset($_GET['idlivre'])){
    $id = $_GET['idlivre'];
 $livre =$bouquin->recupUnLivre($id);
 
    require_once 'view/LivreVue.php';
}
if (empty($_GET) && empty($_POST) && !empty($_SESSION['idsession'])) {

    require_once 'view/Admin.php';
}


