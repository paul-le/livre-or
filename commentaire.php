<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
	    <title>Livre d'or</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <header>
            <nav>
                <ul>
                    <li ><a class="homebutton" href="index.php"><img class="homebutton2" src="images/homeicon.png"></a></li>

                    <li class="headerhover"><a href="livre-or.php">Livre d'or</a></li>
                    <li class="headerhover"><a class="headerhover" href="commentaire.php">Ajouter un commentaire</a></li>
                    <li class="headerhover"><?php if(isset($_SESSION['login']))
                    {
                        echo"<a href='profil.php'>Profil</a>";
                    }
                    else
                    {
                    }
                    ?></li>                    
                    <li class="headerhover"><?php if(!isset($_SESSION['login']))
                    {
                        echo"<a href='inscription.php'>Inscription</a>";
                    }
                    else
                    {
                    }
                    ?></li>
                    <li class="headerhover"><?php if(!isset($_SESSION['login']))
                    {
                        echo "<a class=\"headerhover\" href =\"connexion.php\">Connexion</a>";
                    }
                    else 
                    {
                        echo "<form  method='post' action='index.php'>    
                        <input id='decobutton' type='submit' name='logout' value='Déconnexion'>
                    </form>";
                        if(isset($_POST['logout']))
                        {
                            session_destroy();
                            header('Location: connexion.php');
                        }
                    }?></li>
                </ul>
            </nav>
        </header>
    <link rel="stylesheet" href="style.css">
<?php
        

 if ( isset($_SESSION['login']) == true )
{
    if ( isset($_POST['envoyer']) == true )
    {
    $connexion = mysqli_connect("localhost", "root","", "livreor"); 
    $requete = "INSERT INTO commentaires (commentaire,id_utilisateur,date) VALUES('".$_POST['commentaire']."','".$_SESSION['id']."',NOW())";
    $query = mysqli_query($connexion, $requete);
    }
    //$resultat = mysqli_fetch_assoc($query);
    echo '<main id="connexionform">
        <section id="connexionform2"">
                <h1>Envoyer un commentaire</h1>
                <form id="envoyercommentaireform" method="POST" action="commentaire.php">
            <label>Commentaire</label><br><br><textarea rows="10" cols="45" name="commentaire" placeholder="Votre commentaire" required></textarea><br><br>
                <input type="submit" value="Envoyer le commentaire" name="envoyer">
                </form>
            </section>
    </main>';

}

else
{
    echo " <section id='connexionform'>
                <section id='connexionform2'>
                    Vous n'avez pas accés à cette page !";
}
?>
        </section>
    </section>
        </main>
        <footer>
            Projet de Paul par Paul pour pas Paul.
        </footer>
    </body>