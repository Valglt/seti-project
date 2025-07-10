<?php
session_start();
require_once('../../includes/db.php');

class Admin {
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }


    public  function trouverParEmail($email) {
        $sql = "SELECT * FROM admin WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }
}

if (isset($_POST['connexion_admin'])) {
    $email = trim($_POST['email']);
    $mot_de_passe = $_POST['mot_de_passe'];

    $admin = new Admin($pdo);
    $utilisateur = $admin->trouverParEmail($email);

    if ($utilisateur && password_verify($mot_de_passe, $utilisateur['password_hash'])) {
        $_SESSION['admin_id'] = $utilisateur['id'];
        $_SESSION['email_admin'] = $utilisateur['email'];
        header('Location: ../../backoffice/dashboard.php');
        exit();
    } else {
        echo "<p style='color:red;'>Identifiants incorrects.</p>";
    }
}

