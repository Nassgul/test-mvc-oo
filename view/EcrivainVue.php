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
    <body>
        <?php
     
        foreach ($recupauteur as $value) {
            $auteurs = $value->lenom;
            $ecrivain = explode("||", $auteurs);
            $bio = $value->labio;
            $bioz = nl2br($bio);
            $z =$value->résumé;
            $resume = explode("||", $z);
            $x=$value->titres;
            $titre = explode("||", $x);
            $y =$value->zeuid;
            $idlivre = explode("||", $y);
            ?>
        <h1>Les Poètes Francophones : Section - <?= $value->lenom;?></h1>
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
        <hr/>
            <h5><?= $bioz?></h5>
        <h3><?php 
            $nb=count($idlivre);
        for ($i=0;$i<$nb;$i++) {?>
         <h3><?= $titre[$i] ?></h3>
        <p><?= substr($resume[$i],0,100);?>... <a href='?idlivre=<?= $idlivre[$i] ?>'>lire plus</a></p>
            <hr>
      
        <?php }}
        ?>
    </body>
</html>
