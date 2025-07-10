<?php
require_once('../includes/db.php');

$stmt = $pdo->query("SELECT id, nom FROM planete ORDER BY nom");
$planetes = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($planetes);
