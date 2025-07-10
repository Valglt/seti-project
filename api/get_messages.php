<?php
require_once('../includes/db.php');
header('Content-Type: application/json');

if (!isset($_GET['planete_id']) || !is_numeric($_GET['planete_id'])) {
    echo json_encode([]); // Sécurité : retourne [] si planete_id est absent ou invalide
    exit;
}

$planete_id = (int) $_GET['planete_id'];

$stmt = $pdo->prepare("SELECT id, contenu FROM message WHERE planete_id = :id");
$stmt->execute(['id' => $planete_id]);
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($messages);


?>
