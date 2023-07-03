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

<div class=container>

<header class="header">

    <h1>Panneau d'administration</h1>

</header>

<section>


    <nav>

        <ul class=d-inline-block>

           <a href='index.php?page=accueil'>Accueil</a>
           <a href='index.php?page=user'>Utilisateurs</a>
           <a href='index.php?page=settings'>Paramètres</a>
           
           <?php 
                if (isset($_SESSION) and !empty($_SESSION)){ ?>
                     <a href="?page=connexion">Déconnexion</a>
                <?php } else { ?>
                    <a href="?page=connexion">Connexion</a>
                <?php }
                ?>


        </ul>

    </nav>


    <?php

        if (isset($_GET['page']) && $_GET['page'] == "accueil" && empty($_SESSION)) {

            echo '<form class="form" method="POST">';
            echo '<p>Identifiant</p><input type="text" name="identifiant">';
            echo '<p>Mot de passe</p><input type="password" name="password">';
            echo '<br>';
            echo '<br>';
            echo '<input type="submit" name="submit" value="connexion">';
            echo '</form>';
    
        }
    ?>


    <?php
 


// *********************************************** Accueil ********************************************************************************************
 
if (isset($_POST['submit']) && ($_POST['identifiant'] == 'sekoubambs' && $_POST['password'] === '100385')) {

    $_SESSION = ['nom' => 'haidara', 'prenom' => 'amadou', 'role' => 'stagiaire', 'age' => 38] ; 

    $_SESSION = [
        'identifiant' => 'sekoubambs',
        'password' => '100385',
        'age' => 38 , 
        'nom' => 'haidara',
        'prenom' => 'amadou',
        'role' => 'stagiaire',
    ] ;
    
          echo 'Bienvenue ' . $_SESSION['prenom'] . '!!!';

        
      }

  if (isset($_POST['submit']) && ($_POST['identifiant'] != 'sekoubambs' || $_POST['password'] != '100385')) {
      
      echo 'Votre identifiant ou votre mot de passe est incorrect' ;
  }

  if (isset($_GET['page']) && $_GET['page'] == "accueil" && !empty($_SESSION)) {
      ?>
      <h1>Bonjour et bienvenue sur votre page d'accueil !!!</h1>
      <p class="alert-success">Vous êtes maintenant Connecté</p>
      <?php
      }


// *********************************************** User ********************************************************************************************


        if (isset($_GET['page']) && $_GET['page'] == 'user' && empty($_SESSION)){ ?>
                <p class="alert warning">Vous devez être connecté pour pouvoir avoir accès à cette partie du site</p>
            <?php }
        
        if (isset($_GET['page']) && $_GET['page'] == "user" && !empty($_SESSION) ) {

            
            echo '<h1>Vos informations utilisateur</h1>' . '<br>' ;
            echo '<strong>Nom:</strong> ' . $_SESSION['nom'] . '<br>';
            echo '<strong>Prénom:</strong> ' . $_SESSION['prenom'] . '<br>' ;
            echo '<strong>Age:</strong> ' . $_SESSION['age'] . '<br>' ;
            echo '<strong>Rôle:</strong> ' . $_SESSION['role'] . '<br>' ;
            
        }


// *********************************************** Settings ********************************************************************************************
           
        if (isset($_GET['page']) && $_GET['page'] == "settings" && empty($_SESSION)) { ?>
        <p class="alert warning">Vous devez être connecté pour pouvoir avoir accès à cette partie du site</p>
        <?php }
        
        if (isset($_GET['page']) && $_GET['page'] == 'settings' && !empty($_SESSION)){ ?>

            <form action="index.php"  method="POST" class="formConnexion" >
                <h1>Modification de vos paramètres</h1>
                <label for="nom">Nom</label>
                <input type="text" name="nom" value="<?php echo $_SESSION['nom']; ?>">
                <br>
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" value="<?php echo $_SESSION['prenom']; ?>">
                <br>
                <label for="age">Age</label>
                <input type="number" name="age" value="<?php echo $_SESSION['age']; ?>">
                <br>
                <label for="role">Rôle</label>
                <input type="text" name="role" value="<?php echo $_SESSION['role']; ?>">
                <br>
                <br>
                <input type="submit" name="submitUpdate" value="Modifier">
            </form>

        <?php }


        if (isset($_POST['submitUpdate'])){
            if (empty($_POST['prenom']) || empty($_POST['nom']) || empty($_POST['age']) || empty($_POST['role'])){ ?>
                <p class="alert-error">Toutes les informations ont besoin d'être renseigné</p>

        <?php }

            else{
                    $_SESSION['prenom'] = $_POST['prenom'];
                    $_SESSION['nom'] = $_POST['nom'];
                    $_SESSION['age'] = $_POST['age'];
                    $_SESSION['role'] = $_POST['role'];
        ?>
        <p class="alert-success">Les données utilisateurs ont bien été mis à jour</p>

        <?php }
}
 

// *********************************************** Déconnexion ********************************************************************************************


        if (isset($_GET['page']) && $_GET['page'] == "connexion" && !empty($_SESSION)) {

            echo '<form method="POST">';
            echo '<br>';
            echo '<input type="submit" name="deconnexion" value="Déconnexion">';
            echo '</form>';
        }

    ?>
        
        <?php
            if (isset($_POST['deconnexion'])) {
            session_destroy(); ?>
            <p class="alert-deconnexion">Vous êtes maintenant déconnecté</p>
            <?php
             }
        ?>
    


</section>

</div>


</body>
</html>