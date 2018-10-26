<?php 
$pseudo = $_POST['pseudo'];
$bdd = new PDO('mysql:host=localhost;dbname=EspaceMembre;charset=utf8', 'root', 'root');
//  Récupération de l'utilisateur et de son pass hashé
$req = $bdd->prepare('SELECT id, pass FROM membres WHERE pseudo = :pseudo');
$req->execute(array(
    'pseudo' => $pseudo));
$resultat = $req->fetch();

// Comparaison du pass envoyé via le formulaire avec la base
$isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);

if (!$resultat)
{
   header('Location: main.php');
}
else
{
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $pseudo;
        header('Location: login.php');
    }
    else {
        header('Location: main.php');
    }
}

?>