<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bienvenue sur Les Poètes Francophones</title>
    </head>
    <body>

        <h1>Bienvenue sur Les Poètes Francophones</h1>
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
        <div>
            <?php
            if ($hasardecrivain) {

                foreach ($hasardecrivain AS $valeur) {
                    ?>
                    <div>
                        <h2>Écrivain au hasard</h2>                         
                        <h3><?php echo $valeur->lenom ?></h3>
                        <p><?php echo nl2br($valeur->labio) ?></p>
                    </div>
                    <?php
                }
            }
            ?>


        </div>

    </body>
</html>
