<?php 
session_start();

if (!isset($_SESSION['admin_id'])) {
    header('Location: ../index.html');
    exit();
}

require_once('../includes/db.php');
require_once('create_planete.php');
require_once('delete_planete.php');
require_once('update_planete.php');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet SETI - Admin Dashboard</title>
    <link rel="stylesheet" href="../public/css/backoffice.css">
    <link rel="icon" type="image/png" href="../public/images/favicon-16x16.png">

</head>
<body>
        <canvas id="canvas"></canvas>
    <canvas id="canvas2"></canvas>
    <header>
        <h1>Projet SETI</h1>
        <nav>
            <a href="../index.html">Accueil</a>
            <a href="../logout.php">Déconnexion</a>
</nav>
<div id="horloge">--:--:--</div>
</header>
<h2>Espace Admin</h2>

<main class="mainAdmin">


<div class="divFormAdmin">
<h3>Ajouter une nouvelle Planete</h3>
<form class="formAdmin" action="create_planete.php" method="POST">
    <input type="text" name="nom_planete" placeholder="Nom de la Planete" required>
    <button type="submit" name="ajouter_planete">Ajouter</button>
</form>
</div>

<div class="divFormAdmin">

<h3>Ajouter un message à une planète</h3>
<form class="formAdmin" action="update_planete.php" method="POST">
    <select name="planete_id" required>
        <?php
        $stmt = $pdo->query("SELECT * FROM planete ORDER BY nom ASC");
        while ($row = $stmt->fetch()) {
            echo "<option value='{$row['id']}'>{$row['nom']}</option>";
        }
        ?>
    </select>
    <textarea name="contenu" placeholder="Message à ajouter" required></textarea>
    <button type="submit" name="ajouter_message">Ajouter</button>
</form>
    </div>
<div class="divFormAdmin">

<h3>Modifier un message existant</h3>
<form class="formAdmin" action="update_planete.php" method="POST">
    <select id="planete-select-modifier" name="planete_id" required>
        <option value="">Choisir une planète</option>
        <?php
        $stmt = $pdo->query("SELECT * FROM planete ORDER BY nom ASC");
        while ($row = $stmt->fetch()) {
            echo "<option value='{$row['id']}'>{$row['nom']}</option>";
        }
        ?>
    </select>

    <select id="message-select-modifier" name="message_id" required>
        <option value="">Choisir un message</option>
    </select>

    <textarea name="contenu_modifie" placeholder="Nouveau contenu du message" required></textarea>
    <button type="submit" name="modifier_message_id">Modifier</button>
</form>
    </div>

<div class="divFormAdmin">

<h3>Supprimer un message précis</h3>
<form class="formAdmin" action="delete_planete.php" method="POST">
    <select id="planete-select-supprimer" name="planete_id" required>
        <option value="">Choisir une planète</option>
        <?php
        $stmt = $pdo->query("SELECT * FROM planete ORDER BY nom ASC");
        while ($row = $stmt->fetch()) {
            echo "<option value='{$row['id']}'>{$row['nom']}</option>";
        }
        ?>
    </select>

    <select id="message-select-supprimer" name="message_id" required>
        <option value="">Choisir un message</option>
    </select>

    <button type="submit" name="supprimer_message">Supprimer</button>
</form>
    </div>

<div class="divFormAdmin">

<h3>Supprimer une planète</h3>
<form class="formAdmin" action="delete_planete.php" method="POST">
    <select name="planete_id" required>
        <?php
        $stmt = $pdo->query("SELECT * FROM planete ORDER BY nom ASC");
        while ($row = $stmt->fetch()) {
            echo "<option value='{$row['id']}'>{$row['nom']}</option>";
        }
        ?>
    </select>
    <button type="submit" name="supprimer_planete">Supprimer</button>
</form>
    </div>
    


</main>

<script src="../public/js/app.js"></script>
<script src="../public/js/backoffice.js"></script>

</body>
</html>