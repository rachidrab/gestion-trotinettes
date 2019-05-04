<?php
       // tous d'abord il faut démarrer le système de sessions
       session_start();

       if(!isset($_SESSION['user_nom'])){
              header('location:login.php');
       }
?>

<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div style="margin: 25px 200px 500px 200px;">
<ul class="nav nav-pills nav-fill">
                    <li class="nav-item">
                      <a class="nav-link active" href="#">Mon profil</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Les problèmes du réseau</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="logout.php">Se deconnecter</a>
                    </li>
                  </ul>
</div>

</body>


</html>