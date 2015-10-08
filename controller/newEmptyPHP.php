<?php
require 'model/maPDOClass.php';
require 'model/EcrivainManager.php';
require 'model/EcrivainAdminManager.php';
require 'model/Ecrivain.php';
require 'model/PeriodeManager.php';
require 'model/Livre.php';
require 'model/LivreManager.php';
require 'model/LivreAdminManager.php';

$manager = new EcrivainManager(DB_SELECT, DB_USER, DB_PWD, true);
$menu = new PeriodeManager(DB_SELECT, DB_USER, DB_PWD, true);
$machin = new EcrivainAdminManager(DB_SELECT, DB_USER, DB_PWD, true);
$truc = $machin->recupEcrivain(1);
var_dump($truc);

if(empty($_GET)&&empty($_POST)){
    $recup_menu = $menu->recupTousPeriode(); 
    
  
  }  
      $id=  rand(1,10);
    $recup_ecrivain = $manager->recupUnEcrivain($id);
  
    var_dump($recup_ecrivain);

include 'view/accueil.php';