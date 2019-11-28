<?php
    session_start();
    $phraseidincorrect = "";
    $phrasemerciremplir = "";
    $comptevalide = false;

    if ( isset($_POST['connexion']) == true && isset($_POST['login']) && strlen($_POST['login']) != 0 && isset($_POST['password']) && strlen($_POST['password']) != 0 ) 
    {
        $connexion = mysqli_connect("localhost", "root", "", "livreor");
        $requete = "SELECT * FROM utilisateurs";
        $query = mysqli_query($connexion, $requete);
        $resultat = mysqli_fetch_all($query);
        $comptevalide = false;
        foreach ( $resultat as $key => $value ) {
            if ( $resultat[$key][1] == $_POST['login'] && password_verify($_POST['password'], $resultat[$key][2]) ) 
            {
                $comptevalide = true;
                $_SESSION['id'] = $resultat[$key][0];
            }
        }
        if ( $comptevalide == true ) 
        {
            $_SESSION['login'] = $_POST['login'];
            header('Location: index.php');
        }
        else 
        {
            $phraseidincorrect = "Identifiant ou mot de passe incorrect.";
        }

        mysqli_close($connexion);
    }

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Connexion</title>
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
        <main id="mainconnexion">
            <section id="connexionform">
                <?php
                
                if(!isset($_SESSION['id']))
                {
                    echo"
                <form id='connexionform2' action='' method=POST>
                    Connexion<br><br>
                    <input id='inputco' type='text' placeholder='Identifiant' name='login' required><br><br>
                    <input id='inputco' type='password' placeholder='Mot de passe' name='password' required><br><br>
                    <input id='inputco' type='submit' name='connexion' value='Se connecter'>
                
                ";
                }
                else
                {
                    echo "Vous êtes déjà connecté !";
                }
                if ( $comptevalide == false ) 
                {
                    echo '<br><br>'.$phraseidincorrect.'';
                }
                ?>
                </form>
            </section>
        </main>
        <footer>
            Projet de Paul par Paul pour pas Paul.
        </footer>
    </body>