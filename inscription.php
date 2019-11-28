<?php
    session_start();
    $dejainscrit = false;
    if ( isset($_POST['mdp']) ) {
        $pwd = $_POST['mdp'];
        $pwd = password_hash( $pwd, PASSWORD_BCRYPT, array('cost' => 12, ) );
}
$connexion = mysqli_connect("localhost", "root", "", "livreor");

    if ( isset($_POST['inscrire']) == true &&  $_POST['mdp'] == $_POST['cmdp'] && isset($_POST['login']) && strlen($_POST['login']) != 0 && isset($_POST['mdp']) && strlen($_POST['mdp']) != 0 && isset($_POST['cmdp']) && strlen($_POST['cmdp']) != 0) {
        $requete2 = "SELECT * FROM utilisateurs";
        $query2 = mysqli_query($connexion, $requete2);
        $resultat = mysqli_fetch_all($query2);
        foreach ( $resultat as $key => $value ) {
            if ( $resultat[$key][1] == $_POST['login'] ) {
                $dejainscrit = true;
            }
        }
        if ( $dejainscrit == false ) {
            $requete = "INSERT INTO utilisateurs (login, password) VALUES('".$_POST['login']."', '".$pwd."')";
            $query = mysqli_query($connexion, $requete);
            header('Location: connexion.php');
        }

        mysqli_close($connexion);
    }
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Inscription</title>
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
            <section id="connexionform">  
                <section id="connexionform2">
            <?php
    if ( !isset($_SESSION['login']) ) {
    ?>

                    <h1>INSCRIPTION</h1><br/><br/>
                    <form method="post" id="forminscription" action="inscription.php">
                        <input type="text" placeholder="Identifiant" name="login" required><br/><br/>
                        <input type="password" placeholder="Mot de passe" name="mdp" required><br/><br/>
                        <input type="password" placeholder="Confirmation mot de passe" name="cmdp" required><br/><br/>
                        <input type="submit" value="S'inscrire" name="inscrire" required>
                    </form>
                    <br><br>
                
                <section>
                <?php
                    if ( isset($_POST['inscrire']) == true &&  isset($_POST['login']) && strlen($_POST['login']) == 0 || isset($_POST['mdp']) && strlen($_POST['mdp']) == 0 || isset($_POST['cmdp']) && strlen($_POST['cmdp']) == 0 || isset($_POST['nom']) && strlen($_POST['nom']) == 0 || isset($_POST['prenom']) && strlen($_POST['prenom']) == 0 ) {
                ?>
                    Merci de remplir tous les champs.
                <?php
                    }
                    if ( $dejainscrit == true ) {
                ?>
                    Identifiant déjà pris :(
                <?php
                    }
                     if ( isset($_POST['inscrire']) == true && $_POST['mdp'] != $_POST['cmdp'] ) {
                ?>
                    Les mots de passe ne sont pas les mêmes!
                <?php
                    }
                ?>
            </section>
                </section>
                </section>
    <?php
    }

    elseif ( isset($_SESSION['login']) ) {
    ?>
        <section id="cconnexion">
            <section id="cform">
                <article id="titleformco">
                    ERREUR
                </article>
                <section id="erreurco">
                    Vous êtes déjà connecté !
                </section>
            </section>
        </section>
    <?php
    }
    ?>
    </main>
    <footer>
        Projet de Paul par Paul pour pas Paul.
    </footer>
</body>
</html>