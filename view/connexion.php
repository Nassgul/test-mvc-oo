<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>connexion</title>
    </head>
    <body>
        <h2>connexion</h2>
        <div class="content"> <a href="./">Retour à l'accueil</a><br/><br/>
                <div id='monform'>
                    <?php if(isset($erreur)) echo "<h2>$erreur</h2>"  ?>
                    <form action="" method="POST" name="nom">
                        Votre login : <input name="lelogin" type="text" required /><br/>
                        Votre mot de passe : <input name="lepass" type="password" required /><br/>
                        
                        <input type="submit" value="S'identifier"/>
                    </form>
                </div>
        </div>
    </body>
</html>