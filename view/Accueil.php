<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bienvenue sur Les Poètes Francophones</title>
    </head>
    <body>
        
        <h2>Bienvenue sur Les Poètes Francophones</h2>
        <nav>
            <li>Période
                <ul>
        <?php
       
                    if ($recup_menu) {
                        foreach ($recup_menu as $key => $value) {

                            echo "<li ><a href='?idperiod=".$value->id."'>".$value->laperiode."</li>";
                        }
                    }
        ?></ul>
            </li>
            <li><a href="?connect">Se connecter</a></li>
        </ul>
        </nav>
    </body>
</html>
