
<?php
       // tous d'abord il faut démarrer le système de sessions
       session_start();

       // Si la session de l'admin est actif, on va diréger vers son page
       if(isset($_SESSION['user_nom'])){
              header('location:employe_page.php');
       }
       else if(isset($_SESSION['user_nom'])){
              header('location:client_page.php');
       }
       else{
              header('location:login.php');
       }
?>

<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>
    <body>
        <div style="margin: 200px 200px 500px 200px;">
        <div align="center">
        <div align="left" class="card text-white bg-dark mb-3" style="max-width: 30rem;">
            <div class="card-body text-secondary">
     <form action='login.php' method='POST'>
        <div class="form-group">
          <label for="exampleInputEmail1">Nom d'utilisateur</label>
          <input type="text" name="user_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nom d'utilisateur ">
          
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Mot de passe</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>

        <div class="form-group">
            <label>Type d'utilisateur :</label>
            <select name="type_user">
                   <option value="admin">Administrateur</option>
                   <option value="user" selected>Utilisateur</option>
            </select><br />    
        </div>

        
        <button align="right" type="submit" class="btn btn-primary">Se connecter</button>
      </form>

      </div>
      </div>

      </div>


    </div>

    </body>
</html>


<?php

// Création du DSN

$dsn = 'mysql:host=localhost;dbname=trotinette;port=3306';

// Création et test de la connexion

try {
 
$pdo = new PDO($dsn, 'root' , '');

}
catch (PDOException $exception) {
 
 mail('faresloubna@gmail.com', 'PDOException', $exception->getMessage());
 exit('Erreur de connexion à la base de données');
 
}

$type_user = $_POST['type_user'];
$password = $_POST['password'];
$user_name = $_POST['user_name'];



// Requête pour tester la connexion
if($type_user=="admin"){
      
       $query = $pdo->query("SELECT * FROM employe where nom like '".$user_name."' and motdePasse like '".$password."'");
       
}
else{
       
       $query = $pdo->query("SELECT * FROM client where nom like '".$user_name."' and motDePasse like '".$password."'");
       
}


$resultat = $query->fetchAll();

//Afficher le résultat dans un tableau

if($resultat)
{


foreach ($resultat as $key => $variable)
{

       $_SESSION['user_nom'] = $resultat[$key]['nom'];
       $_SESSION['user_prenom'] = $resultat[$key]['prenom'];
       $_SESSION['user_adresse'] = $resultat[$key]['adresse'];
       $_SESSION['user_motDePasse'] = $resultat[$key]['motDePasse'];

}
if($type_user=="admin")
{
       header('location:employe_page.php');
}
else
{
       header('location:client_page.php');
}





// On stocke les variables dans les variables de session 
       // On fait une redirection vers la page de profil

}
else
{
       print("Votre nom d'utilisateur ou votre mot de passe n'est pas correct !");
}







?>













