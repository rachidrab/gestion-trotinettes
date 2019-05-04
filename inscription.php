
<?php
       // tous d'abord il faut démarrer le système de sessions
       session_start();

       // Si la session de l'admin est actif, on va diréger vers son page
       if(isset($_SESSION['id_admin'])){
              header('location:admin_page.php');
       }
       else if(isset($_SESSION['id_user'])){
              header('location:user_page.php');
       }
?>

<html>
    <head>
        <title>inscription</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        

    </head>
    <body>

        <div style="margin: 70px 200px 500px 200px;">
            
        



     <div align="center">
        <div align="left" class="card text-white bg-dark mb-3" style="max-width: 30rem;">
            <div class="card-body text-secondary">
     <form action='inscription.php' method='POST'>

        
        <div class="form-group">
          <label for="nom">Nom :</label>
          <input type="text" name="user_name" class="form-control" id="nom" aria-describedby="emailHelp" placeholder="Nom d'utilisateur ">  
        </div>

        <div class="form-group">
                <label for="exampleInputEmail1">Prenom :</label>
                <input type="text" name="user_prenom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="prenom ">  
        </div>

        <div class="form-group">
                 <label for="exampleInputEmail1">Adresse</label>
                  <input type="text" name="user_adresse" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="adresse ">  
        </div>


        <div class="form-group">
          <label for="exampleInputPassword1">Mot de passe</label>
          <input type="password" name="user_motDePasse" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>

        <div class="form-group">
            <label>Type d'utilisateur :</label>
            <select name="type_user">
                   <option value="admin">Administrateur</option>
                   <option value="user" selected>Utilisateur</option>
            </select><br />    
        </div>

        
        <button align="right" type="submit" class="btn btn-primary">S'enregistrer</button>
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
$user_nom = $_POST['user_nom'];
$user_prenom = $_POST['user_prenom'];
$user_adresse = $_POST['user_adresse'];
$user_motDePasse = $_POST['user_motDePasse'];



// Requête pour tester la connexion
if($type_user=="admin"){
      
    
       $query = $pdo->query("INSERT INTO `employe` (`nom`, `prenom`, `adresse`, `motDePasse`) VALUES ('".$user_nom."', '".$user_prenom."', '".$user_adresse."', '".$user_motDePasse."');");
       header('location:login.php');
}
else{
       
    $query = $pdo->query("INSERT INTO `client` ( `nom`, `prenom`, `adresse`, `motDePasse`) VALUES ('".$user_nom."', '".$user_prenom."', '".$user_adresse."', '".$user_motDePasse."');");
    header('location:login.php');
}



?>















