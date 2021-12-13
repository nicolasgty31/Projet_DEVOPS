
<?php
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
    <h2>Notre projet(pas celui de macron) : {{ $project->nom }}</h2>
    <p>{{ $project->description }}</p>
    <h2>Les participants</h2>
    <ul>
        @foreach($users as $user)
<li> nom : {{ $user->nom }}, prenom :  {{ $user->prenom }}</li>
        @endforeach
</ul>
</div>

</body>
</html>