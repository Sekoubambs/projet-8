<?php

session_start()

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>



<header class="header">

    <h1>Panneau d'administration</h1>

</header>

<section>


    <nav>

        <ul>

            <a class="navbar" href='index.php'>Accueil</a>
            <a class="navbar" href='index.php?page=user'>Utilisateurs</a>
            <a class="navbar" href='index.php?page=settings'>Paramètres</a>
            <a class="navbar" href='index.php?page=connexion'>Connexion</a>


        </ul>

    </nav>


    <form class=form method="POST">

        <p>Identifiant</p><br>
        <input type="text" name='identifiant'> . <br>
        <br>
        <p>Mot de passe</p><br>
        <input type="password" name='password'> . <br>
        <br>
        <input type="submit" name='submit'>

    </form>

    <?php

        if (isset($_POST['submit'])) {
            $_SESSION = [
                'identifiant' => 'sekoubambs',
                'password' => 100385,
                'age' => 18 , 
                'nom' => 'haidara',
                'prenom' => 'amadou',
                'role' => 'stagiaire',
            ] ;
        }
var_dump($_SESSION);

        $identifiant = $_POST['identifiant'];
        $password = $_POST['password'];


        if (isset($_POST['submit']) && !empty($_POST['identifiant'] == $_SESSION['identifiant']) && !empty($_POST['password'] == $_SESSION ['password'])){

            echo "Vous êtes connectés";
           
        }

      


    ?>
    


</section>

</body>
</html>