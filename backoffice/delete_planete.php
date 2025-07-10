<?php 

require_once('../includes/db.php');

if (isset($_POST['supprimer_planete'])) {
    $id = (int)$_POST['planete_id'];

    $stmtMessage = $pdo->prepare("DELETE FROM message WHERE planete_id = :id");
    $stmtMessage->execute(['id' => $id]);

    // Puis la planète
    $stmtPlanete = $pdo->prepare("DELETE FROM planete WHERE id = :id");
    $stmtPlanete->execute(['id' => $id]);

    header('Location: dashboard.php');
    exit();
}


if (isset($_POST['supprimer_message'])) {
    $message_id = (int)$_POST['message_id'];

    $stmt = $pdo->prepare("DELETE FROM message WHERE id = :id");
    $stmt->execute(['id' => $message_id]);

    header('Location: dashboard.php');
    exit();
}