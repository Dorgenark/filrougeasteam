<?php
session_start();

if(isset($_POST['submit'])){
  // Informations de la base de donnée.
  $dbServername = "localhost";
  $dbUsername = "root";
  $dbPassword = "";
  $dbName = "filrougestream";
  // Requête de connexion a la base de donnée.
  $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
  // Empéche le navigateur d'interpréter du code envoyer via le formulaire.
  $user = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);

  if(empty($user) || empty($password)){
    header("Location: admin.php?signup=Enter a valid username and password");
    exit();
} else {
  /* Préparation de la requête qui séléctionne les entré qui ont une colonne login qui corréspond
     au username envoyer par le formulaire. */
  $sql = "SELECT * FROM sessions WHERE login='$user'";
  // Execute la requête sql et la stock dans la variable $result.
  $result = mysqli_query($conn, $sql);
  /* Vérifie le nombre de colonne revoyer par la variable result
     si c'est égal a 0 alors le login entré n'existe pas*/
  $resultCheck = mysqli_num_rows($result);
  if($resultCheck < 1){
    header("Location: admin.php?signup=Enter a valid username and password");
    exit();
  } else {
    // Vérifie si le mot de passe entré correspond au mot de passe associer au username dans la base de donnée !
    if ($row = mysqli_fetch_assoc($result)) {
      if ($row['password'] != $password) {
        header("Location: admin.php?signup=Enter a valid username and password");
        exit();
        } elseif ($row['password'] == $password) {
          $_SESSION['login'] = $row['login'];
          header("Location: index.php");
          exit();
        }
      }
    }
  }
}
 ?>
