# Macromania

> **Création d'un site web de e-commerce complet**

Un projet de développement web dynamique réalisé avec **PHP**, **JavaScript (Ajax)** et **SQL**.

---

## 📋 Table des matières

- [À propos](#-à-propos)
- [Configuration (Base de données)](#-configuration-base-de-données)
- [Fonctionnalités](#-fonctionnalités)
- [Structure du projet](#-structure-du-projet)

---

## 🎮 À propos

**Macromania** est une plateforme de e-commerce dédiée à l'univers des jeux vidéo, des consoles et des accessoires. Ce site web intègre un cycle d'achat complet ainsi qu'un espace d'administration pour la gestion de la boutique.

### Technologies utilisées

- **Frontend** : HTML5, CSS3, JavaScript (Ajax)
- **Backend** : PHP
- **Base de données** : MySQL / SQL
- **Outils** : Visual Studio Code, PHPMyAdmin

---

## 📦 Configuration

### Pour connecter et initialiser l'application

#### Étapes

1. **Configurer les identifiants SQL**
   - Naviguez dans le dossier `bdd/` et ouvrez le fichier `bddData.php`.
   - Modifiez les variables pour y inscrire votre nom d'utilisateur et votre mot de passe SQL.

2. **Importer la base de données**
   - Connectez-vous à votre interface **PHPMyAdmin**.
   - Créez une nouvelle base de données.
   - Allez dans l'onglet **Importer** et sélectionnez le fichier `macromania.sql` situé dans le dossier `sql/` du projet.

3. **Ouvrer votre serveur php en localhost**
   
4. **Lancez le fichier index.php dans un navigateur web (mettre en plein écran pour une meilleure visibilité)**

---

## ⚙️ Fonctionnalités

### Espace Client
- **Navigation & Recherche** : Consultation de la page d'accueil et recherche dynamique d'articles.
- **Gestion de compte** : Inscription, connexion sécurisée et module bonus de changement de mot de passe.
- **Cycle d'achat** : Ajout d'articles simples ou multiples au panier, gestion des quantités, et page de paiement simulée.
- **Contact** : Formulaire de contact fonctionnel avec envoi de mail intégré (via *Composer/PHPMailer*).

### 🔐 Espace Administrateur
Pour tester les fonctionnalités de gestion, connectez-vous avec le compte admin suivant :
- **Login** : `admin`
- **Mot de passe** : `macromania`

*Cet espace permet de gérer les stocks en temps réel et de modifier les jeux mis en avant sur la page d'accueil.*

---

## 📁 Structure du projet

### Dossiers et fichiers principaux

- **php/** : Contient les scripts logiques et les vues du site (`header.php`, `panier.php`, `verifConnexion.php`, `paiement.php`, etc.).
- **css/** : Feuilles de style de l'interface (`accueil.css`, `contact.css`).
- **js/** : Scripts dynamiques pour les interactions utilisateur (`commande.js`, `contact.js`).
- **bdd/** : Scripts de connexion à la base de données (`bdd.php`, `bddData.php`).
- **sql/** : Script d'initialisation de la base de données (`macromania.sql`).
- **vendor/** : Dépendances PHP (gérées par Composer pour l'envoi de mails).
- **index.php** : Point d'entrée principal du site internet.
- **articles.json** : Fichier de données complémentaires pour les articles.

---

## 👤 Auteurs

**Malo Prijac**
**Nathan Alexis-Slota**

---
