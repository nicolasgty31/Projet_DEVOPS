
<?php
$user = NULL;
$pass = NULL;

$bdd = new PDO('mysql:host=localhost;dbname=bdd', $user, $pass);

$project = $bdd->query('SELECT * FROM projet');

$users = $bdd->query('SELECT * FROM user');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div align="center">
    <h1> Projet Devops</h1>
</div>
<div>
    <h2>Notre projet(pas celui de macron) :<?php $project->nom ?> </h2>
    <p> <?php $project->description ?> </p>
    <h2>Les participants</h2>
    <ul>
         <?php foreach($users as $user) ?>
        <li> nom : <?php $user->nom ?>, prenom :  <?php $user->prenom ?></li>
         <?php endforeach ?>
    </ul>
</div>

</body>
</html>