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
      
        foreach ($livre as $value) {
            $desc = $value->ladescription;
            $description = nl2br($desc);
            $titre = $value->letitre;
            $sortie = $value->lasortie;
            ?>
        <h1>Les Poètes Francophones : Section Livre - <?= $value->letitre;?></h1>
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
        <h2>Titre : <?= $titre ?> | Date de sortie : <?= $sortie ?></h2>
        <p><?= $description ?></p>
        <hr>
        <?php } ?>
    </body>
</html>
