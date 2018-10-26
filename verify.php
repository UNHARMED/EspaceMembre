<?php
session_start();

if(isset($_POST['register'])){
  $bdd = new PDO('mysql:host=localhost;dbname=EspaceMembre;charset=utf8', 'root', 'root');
  $pseudo = $_POST['pseudo'];
  $pass = $_POST['pass'];
  $confirm = $_POST['confirm'];
  $email = $_POST['email'];
  $exists = $bdd->query('SELECT * FROM membres');


  $_SESSION['verifLog'] = false;


  foreach($exists as $exist){
    if ($exist['pseudo'] == $pseudo || $pass != $confirm || empty($pass) || empty($confirm) || strlen($pseudo) < 3 || strlen($pseudo) > 12 ){
      $_SESSION['verifLog'] = true;
      $verifTest = $exist['pseudo'];
    }else{
    }
  }

  if($_SESSION['verifLog'] == false){
    $req = $bdd->prepare('INSERT INTO membres(pseudo, pass, email) VALUES(:pseudo, :pass, :email)');
    $rep = $req->execute(array(
      'pseudo'=>$pseudo,
      'pass'=>password_hash($pass, PASSWORD_DEFAULT),
      'email'=>$email
    ));

    $_SESSION['pseudo']= $pseudo;
    header('Location: data.php');
  }else{
    header('Location: main.php');
  }
 








}

// CONNEXION

// if(isset($_POST['login'])){
//   $bdd = new PDO('mysql:host=localhost;dbname=EspaceMembre;charset=utf8', 'root', 'root');
//   $exists = $bdd->query('SELECT * FROM membres');

// foreach($exists as $exist){
// if ( $pseudo && $pass == $exist['pseudo'] && $exist['pass'] ) {
//   header('Location: login.php');
// }else{
//   header('Location: main.php');
// }
// }
// }




// if ($pass != $confirm || empty($pass) || empty($confirm) || strlen($pseudo) < 3 || strlen($pseudo) > 12) {
// header('Location: main.php');
// }
// elseif ($exist !== []){
//   header ('Location: main.php');
// }
// else{
// $pass_hash = password_hash($pass, PASSWORD_DEFAULT);

// $bdd->exec (
//   "INSERT INTO membres(pseudo, pass, email)
//   VALUES('$pseudo', '$pass_hash', '$email')");

// header ('Location: data.php');
// }


