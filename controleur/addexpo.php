<?php
//on ouvre la connexion à la bdd
try {
    $bdd = new PDO('mysql:host=localhost;dbname=musumvision;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION));
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$reponse = $bdd->query('SELECT max(id)+1 from exposition');
$idmax = $reponse->fetch();


$reponse = $bdd->exec('INSERT INTO exposition VALUES ('.$idmax[0].',\''.$_POST['nom'].'\',\''.$_POST['tarifAdulte'].'\',\''.$_POST['tarifEnfant'].'\',\''.$_POST['active'].'\',\''.$_POST['permanent'].'\')');


header('Location: Manageur.php');
exit;