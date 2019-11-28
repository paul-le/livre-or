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
        <main>
            <section>
            <?php

 if ( isset($_SESSION['login']) == true )
{
    $connexion = mysqli_connect("localhost", "root","", "livreor");
    $requete = "SELECT * FROM utilisateurs WHERE login='".$_SESSION['login']."'";
    $query = mysqli_query($connexion, $requete);
    $resultat = mysqli_fetch_assoc($query);

?>
        <section id="connexionform">
            <section id="connexionform2">
                <h1>Modifier mon profil</h1>
                <form id="formprofil" method="POST" action="profil.php">
            <label>Login</label><br><br> <input type="text" name="login" value= <?php echo $resultat['login']?> required><br><br>
            <label>Password</label><br><br> <input type="password" name="password" ><br><br>
                <input type="submit" value="Changer mes données" name="modifier">
                </form>
            </section>
        </section>
<?php

}

else
{
?>
            <section>
<?php
    echo "Vous n'avez pas accès à cette page !";
}
?>
            </section>
        </main>
        <footer>
            Projet de Paul par Paul pour pas Paul.
        </footer>
    </body>
</html>

<?php

    if(isset($_POST['modifier']))
    {
        $requeteupdate = "UPDATE utilisateurs SET login='".$_POST['login']."', prenom='".$_POST['prenom']."' , nom='".$_POST['nom']."' WHERE login = '".$_SESSION['login']."'";

        if($resultat['login'] != $_POST['login'])
        {
            mysqli_query($connexion,$requeteupdate);
            $_SESSION['login'] = $_POST['login'];
            header('Location: profil.php');
        }
        elseif($resultat['prenom'] != $_POST['prenom'])
        {
            mysqli_query($connexion,$requeteupdate);
            header('Location: profil.php');
        }
        elseif($resultat['nom'] != $_POST['nom'])
        {
            mysqli_query($connexion,$requeteupdate);
            header('Location: profil.php');
        }
        elseif($resultat['password'] != $_POST['password'])
        {
            if($_POST['password'] != NULL)
            {
            $pwd=$_POST['password'];
            $pwd=password_hash($pwd,PASSWORD_BCRYPT,array('cost'=>12,));
            $requeteupdate = "UPDATE utilisateurs SET password='".$pwd."' WHERE login = '".$_SESSION['login']."'";
            mysqli_query($connexion,$requeteupdate);
            header('Location: profil.php');
            }
            elseif($_POST['password'] == NULL)
            {}
        }
        else
        {
            echo " Impossible de changer d'informations ";
        }
    }

?>