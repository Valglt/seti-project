<?php include 'includes/db.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet SETI - Login Administrateur</title>
    
    <link rel="stylesheet" href="public/css/backoffice.css"></link>

<style>
@import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&family=Russo+One&display=swap');
</style>
    <link rel="icon" type="image/png" href="public/images/favicon-16x16.png">

</head>
<body>


    <canvas id="canvas"></canvas>
    <canvas id="canvas2"></canvas>



    <header class="indexHeader">
        <h1>Projet SETI</h1>
<div id="horloge">--:--:--</div>
</header>
<main class="mainLogin"> 
    <h2>Connexion Administrateur</h2>

    <form class="formLogin" action="api/auth/login_verification.php" method="POST">
        <input type="email" name="email" placeholder="Email Admin" required><br>
        <input type="password" name="mot_de_passe" placeholder="Mot de Passe" required><br>
        <button type="submit" name="connexion_admin">Se connecter</button>
    </form>
</main>




<script src="public/js/backoffice.js"></script>
</body>
</html>

