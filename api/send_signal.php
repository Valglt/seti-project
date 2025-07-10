<?php
require_once('../includes/db.php');

if (!isset($_GET['planete_id'])) {
    http_response_code(400);
    echo json_encode(["error" => "ID de planète manquant"]);
    exit;
}

$planete_id = (int)$_GET['planete_id'];

$stmt = $pdo->prepare("SELECT contenu FROM message WHERE planete_id = :id ORDER BY RAND() LIMIT 1");
$stmt->execute(['id' => $planete_id]);

$message = $stmt->fetch(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($message ? $message : ["contenu" => "Aucun message trouvé pour cette planète."]);
