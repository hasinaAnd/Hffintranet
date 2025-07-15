# 📘 HFF INTRANET – Documentation d’installation

## ✅ Prérequis

- **SQL Server** version **19.2**
- utiliser le protocole LDAP pour la connexion
- Configuration de **SQL Server dans ODBC** (via le panneau de configuration Windows)
- **WampServer** version **3.3.2** (avec **PHP 7.4**)
- Configuration du fichier `php.ini` :
  - Activer les extensions suivantes :
    - `extension=pdo_odbc`
    - `extension=odbc`
    - `extension=ldap`

---

## 🛠️ Étapes d'installation

### 1. Cloner le dépôt

```bash
git clone https://github.com/hasinaAnd/Hffintranet
```

---

### 2. Installer Composer

Télécharger Composer sur : https://getcomposer.org/  
Installer les dépendances si nécessaire :

```bash
composer install
```

---

### 3. Créer les dossiers nécessaires

```bash
mkdir -p var/cache/proxies
```

---

### 4. Générer les fichiers proxy

```bash
php proxie.php
```

---

### 5. Configurer l’URL de base pour JavaScript

Créer le fichier suivant :  
`Views/js/utils/config.js`

```javascript
export const baseUrl = "/Hffintranet_maquette";
```

---

### 6. Créer la base de données

Nom de la base : **HFF_INTRANET_MAQUETTE**

Puis exécuter les fichiers SQL disponibles dans le dossier `/sql` :
- Création des tables
- Insertion des données pré-définies

---

### 7. Créer le fichier `.env`

Créer un fichier `.env` à la racine du projet avec le contenu suivant (exemple) :

```env
# Connexion SQL Server via ODBC
DB_DNS_SQLSERV=
DB_USERNAME_SQLSERV=
DB_PASSWORD_SQLSERV=

# Connexion SQL Server sans ODBC
DB_NAME=
DB_USERNAME=
DB_PASSWORD=
DB_HOST=

# Chemins système
BASE_PATH_LONG=C:/wamp64/www/Hffintranet_maquette
BASE_PATH_COURT=/Hffintranet_maquette
BASE_PATH_FICHIER=C:/wamp64/www/Upload
BASE_PATH_FICHIER_COURT=/Upload
BASE_PATH_DOCUWARE=C:/DOCUWARE
BASE_PATH_LOG=C:/wamp64/www/Hffintranet_maquette/var
```

---
