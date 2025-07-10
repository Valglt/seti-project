<?php
require_once('../includes/db.php');

// Ajouter un message
if (isset($_POST['ajouter_message'])) {
    $planete_id = (int)$_POST['planete_id'];
    $contenu = trim($_POST['contenu']);

    $stmt = $pdo->prepare("INSERT INTO message (planete_id, contenu) VALUES (:planete_id, :contenu)");
    $stmt->execute([
        'planete_id' => $planete_id,
        'contenu' => $contenu
    ]);

    header('Location: dashboard.php');
    exit();
}

// Modifier un message
if (isset($_POST['modifier_message_id'])) {
    $message_id = (int)$_POST['message_id'];
    $contenu_modifie = trim($_POST['contenu_modifie']);

    $stmt = $pdo->prepare("UPDATE message SET contenu = :contenu WHERE id = :id");
    $stmt->execute([
        'contenu' => $contenu_modifie,
        'id' => $message_id
    ]);

    header('Location: dashboard.php');
    exit();
}
