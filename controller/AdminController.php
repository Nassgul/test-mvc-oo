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

if (isset($_GET['idperiode'])) {

    $periode = $_GET['idperiode'];

    $ere = $epoque->recupUnPeriode($periode);
  require_once 'view/PeriodeVue.php';
}
if (empty($_GET) && empty($_POST) && !empty($_SESSION['idsession'])) {

    require_once 'view/Admin.php';
}


