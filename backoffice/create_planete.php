<?php

require_once('../includes/db.php');

class Planete {
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function ajouter($nom) {
        $sql = "INSERT INTO planete (nom) VALUES (:nom)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['nom' => $nom]);
    }

    public function trouverParId($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM planete WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function recupererToutes() {
        $sql = "SELECT * FROM planete ORDER BY nom ASC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }
}

if (isset($_POST['ajouter_planete'])) {
    $nom = trim($_POST['nom_planete']);

    $sql = "INSERT INTO planete (nom) VALUES (:nom)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['nom' => $nom]);

    header('Location: dashboard.php');
    exit();
}
