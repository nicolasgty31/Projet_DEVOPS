
<?php
$user = root;
$pass = password;

$bdd = new PDO('mysql:host=10.103.174.63:3306;dbname=database', $user, $pass);

$projects = $bdd->query('SELECT * FROM projet');

$users = $bdd->query('SELECT * FROM user');

$project = $projects->fetch()

?>

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
    <h2>Notre projet(pas celui de macron) :<?php $project['nom'] ?> </h2>
    <p> <?php $project->description ?> </p>
    <h2>Les participants</h2>
    <ul>
         <?php while ($user = $users->fetch()) { ?>
        <li> nom : <?php $user['nom'] ?>, prenom :  <?php $user['prenom'] ?></li>
         <?php}
         $users->closeCursor();?>
    </ul>
</div>

</body>
</html>
