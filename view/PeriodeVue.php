<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body> <?php foreach ($ere as $value) {
            $auteurs = $value->Écrivains;
            $ecrivain = explode("||", $auteurs);
            $bios = $value->Bios;
            $bio = explode("||", nl2br($bios));
            $z =$value->idauteur;
            $idecrivain = explode("||", $z);?>
        <h1>Les Poètes Francophones : Section - <?= $value->laperiode ;?>ème siècle</h1>
        <nav>

            <ul>
                <li><a href="./">Accueil</a></li>
                <li><a href="">Période</a>
                    <ul>
                        <?php
                        if ($recup_menu) {
                            foreach ($recup_menu as $key => $value) {

                                echo "<li ><a href='?idperiode=" . $value->id . "'>" . $value->laperiode . "</li>";
                            }
                        }
                        ?></ul>
                </li>
                <?php if (isset($_SESSION['idsession'])) {
                    ?>
                    <li><a href="?deconnect">Se déconnecter</a></li>
                <?php } else { ?>
                    <li><a href="?connect">Se connecter</a></li><?php } ?>
            </ul>
        </nav>
        <hr> 

        <?php 
        $nb=count($idecrivain);
        for ($i=0;$i<$nb;$i++) {?>
         <h3><?= $ecrivain[$i] ?></h3>
        <p><?= substr($bio[$i],0,250);?>... <a href='?idecrivain=<?= $idecrivain[$i] ?>'>lire plus</a></p>
            <hr>
              
        
        <?php }} ?>
    </body>
</html>
