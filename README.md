# 🌌 Projet SETI - Contact Extraterrestre

Bienvenue dans le projet pédagogique **SETI**, un mini side-project web simulant l'envoi de signaux vers des planètes du système solaire 🛸.

---

## 🚀 Objectif

Ce projet vise à illustrer :

- La séparation front-end / back-end
- Créer une **interface publique dynamique** avec HTML, CSS, JS
- Les appels API AJAX via JavaScript
- Simuler des réponses extraterrestres selon la planète sélectionnée
- La gestion de contenu dynamique via base de données
- Proposer un **espace administrateur sécurisé**
- La création d’un backoffice sécurisé avec authentification
- Permettre à un administrateur de gérer (CRUD) les planètes et leurs messages via base de données
- Illustrer des notions fondamentales de développement web fullstack

---

## 📁 Arborescence du projet

seti_project/
├── api/
│ ├── get_planetes.php ← Renvoie la liste des planètes en JSON
│ ├── get_messages.php ← Renvoie la liste des messages en JSON
│ ├── send_signal.php ← Reçoit la requête JS et renvoie un message depuis la planète
│ └── auth/
│ ├── login_verification.php ← Vérifie les identifiants de l’admin
│
├── backoffice/
│ ├── dashboard.php ← Interface principale de gestion
│ ├── create_planete.php ← Ajouter une planète
│ ├── update_planete.php ← Modifier un message
│ └── delete_planete.php ← Supprimer une planète
│
├── includes/
│ └── db.php ← Fichier de connexion PDO à la base MySQL
│
├── public/
│ ├── css/
│ │ └── style.css ← Feuilles de style pour les pages
│ │ └── backoffice.css ← Feuilles de style pour les pages backoffice
│ ├── js/
│ │ └── app.js ← Script JS pour interaction Backoffice / base de données
│ │ └── backoffice.js ← Script JS pour animations en backoffice
│ │ └── public.js ← Script JS pour animations et interactions sur l'index.html
│ └── images/
│ ├── favicon.png ← favicon du site
│
├── script/
│ ├── register.php ← Script d’enregistrement de l’administrateur (à supprimer après usage)
│ └── seti_project.sql ← Fichier SQL de création des tables
│
├── index.html ← Page publique avec menu déroulant dynamique
├── login.php ← Formulaire de connexion de l’administrateur
├── logout.php ← Déconnexion sécurisée de la session
└── README.md ← Fichier de documentation (ce fichier)



---

## 🔐 Authentification administrateur

- L'administrateur s'enregistre **une seule fois** via `script/register.php`
- Connexion via `login.php` (vérification via `api/auth/login_verification.php`)
- Session PHP utilisée pour protéger l'accès au backoffice

---

## 📡 Fonctionnement de l'interface publique (`index.html`)

- Fond spatial avec ambiance rétro-futuriste (`image1.jpg`)
- Liste des planètes dynamique depuis la base (via `get_planetes.php`)
- Envoi POST vers `send_signal.php` avec le nom de la planète
- Réponse JSON formatée et injectée dans le DOM

---

## 🚀 Fonctionnalités principales

- Liste dynamique des planètes disponibles
- Sélection d’une planète pour envoyer un message
- Système d’API backend en PHP
- Espace administrateur (login requis)
  - Ajout / modification / suppression de planètes
  - Ajout / modification / suppression de messages associés
- Session sécurisée (`admin_id`)
- Stockage et chargement des données via base MySQL

---

## 🧰 Technologies utilisées

- **Frontend** : HTML5, CSS3, JavaScript (DOM, Fetch API)
- **Backend** : PHP 8+
- **Base de données** : MySQL
- **Autres** :
  - PDO pour les requêtes SQL sécurisées
  - Sessions PHP pour l’authentification
  - Arborescence MVC légère

---

## 🗃️ Structure de la base de données

- `admin` → identifiants des administrateurs
- `planete` → nom de chaque planète
- `message` → chaque message lié à une planète via `planete_id`

(voir `script/seti_project.sql` pour le détail)

---

## 🧪 Mise en route

1. Importer le fichier `script/seti_project.sql` dans phpMyAdmin
2. Lancer le script `script/register.php` une seule fois pour créer un admin
3. Accéder à :
   - `/index.html` pour la partie publique
   - `/login.php` pour accéder au backoffice
4. Gérer les planètes et messages dans `backoffice/`

---

## ℹ️ Définition : CRUD

> **C**reate → Créer une planète ou un message  
> **R**ead → Lire les messages existants  
> **U**pdate → Modifier un message existant  
> **D**elete → Supprimer une planète ou un message

---

## 👨‍🏫 Utilisation

- Illustration des concepts :
  - Authentification sécurisée
  - API REST simple
  - Communication front-back
  - Séparation des responsabilités
  - Architecture de projet claire

---

## ✍️ Auteur

Projet proposé par Valentin GUERAULT
https://valentinguerault.fr/








