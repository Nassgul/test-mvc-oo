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
        <form action="" name='ajout' method='POST'>
            Titre <input type="text" name='ajout[lenom]' value="" required /><br/>
            La Bio <textarea name='ajout[labio]' required></textarea><br/>
            Siècle: <select name="ajout[sciecle_id]" required>
                <?php
                foreach ($siecle AS $valeur) {
                    echo "<option value='$valeur->id' >$valeur->laperiode</option>";
                }
                ?>
            </select><br/>

            
            <input type="submit" value='modifier' />
        </form>
    </body>
</html>
