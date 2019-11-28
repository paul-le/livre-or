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
        <main id="livredormain">
            <section id='connexionform3'>
                <section id='connexionform4'>
                <?php
                $connexion = mysqli_connect("localhost", "root", "", "livreor");
                $tablogin = "SELECT id,login FROM utilisateurs";
                $tabcomm = "SELECT * FROM commentaires ORDER BY date DESC";
                $query = mysqli_query($connexion, $tabcomm);
                $resultat = mysqli_fetch_all($query);
                $query2 = mysqli_query($connexion, $tablogin);
                $resultat2 = mysqli_fetch_all($query2);


        $i = 0; 
        while($i < count($resultat))
        {   
          $i2 = 0;
            while($i2 < count($resultat2))
            {
                $date = $resultat[$i][3];
                $date2 = date("d-m-Y H:i:s",strtotime($date));
                if($resultat[$i][2] == $resultat2[$i2][0])
                {
                
                echo "<article id='listcom'> Posté par l'utilisateur : <b>".$resultat2[$i2][1]."</b><br/>";
                echo "Le ".$date2."<br/>";
                echo "<b>".$resultat[$i][1].' </article></b><br/><br/>';
                
                }
                $i2++;
            }
            $i++;
        }
?>                  
                    </section>
                </section>
            </section>

        </main>
        <footer>
            Projet de Paul par Paul pour pas Paul.
        </footer>
    </body>
</html>