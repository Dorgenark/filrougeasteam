<?php
session_start();

if(isset($_POST['submit'])){
  Informations de la base de donnée.
  $dbServername = "localhost";
  $dbUsername = "id5055971_root";
  $dbPassword = "admin";
  $dbName = "id5055971_filrougestream";

  // $dbServername = "localhost";
  // $dbUsername = "root";
  // $dbPassword = "";
  // $dbName = "filrougestream";

  // Requête de connexion a la base de donnée.
  $conn = new PDO("mysql:host={$dbServername};dbname={$dbName}",$dbUsername,$dbPassword);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // Empéche le navigateur d'interpréter du code envoyer via le formulaire.
  $user = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);
  // hashage du mot de passe !
  $hash_password= hash('sha256', $password);

  if(empty($user)){
    header("Location: admin.php?error=Enter a username");
    exit();
} elseif(empty($hash_password)){
  header("Location: admin.php?error=Enter a password");
  exit();
}
else {
  /* Préparation de la requête qui séléctionne les entré qui ont une colonne login qui corréspond
     au username envoyer par le formulaire. */
  $sql = $conn->prepare("SELECT * FROM sessions WHERE login='$user'");
  // Execute la requête sql et la stock dans la variable $result.
  $sql->execute();
  /* Vérifie le nombre de colonne revoyer par la variable result
     si c'est égal a 0 alors le login entré n'existe pas*/
  $resultCheck = $sql->rowCount();
  if($resultCheck < 1){
    header("Location: admin.php?error=User doesn't exist");
    exit();
  } else {
    // Vérifie si le mot de passe entré correspond au mot de passe associer au username dans la base de donnée !
    if ($row = $sql->fetch(PDO::FETCH_OBJ)) {
      if (hash('sha256', $row->password) != $hash_password) {
        header("Location: admin.php?error=Invalid password");
        exit();
      } elseif (hash('sha256', $row->password) == $hash_password) {
          $_SESSION['login'] = $row->login;
          header("Location: dashboard/index.php");
          exit();
        }
      }
    }
  }
}
 ?>
