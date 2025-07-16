# 📘 HFF INTRANET – Documentation d’installation

## ✅ Prérequis

### obligatoire

- **SQL Server** version **19.2**
- Active directory
- ODBC 64
- **PHP 7.4**
- apache 2.4.58
- ou **WampServer** version **3.3.2** (avec **PHP 7.4**, apache 2.4.58)
- composer
- git

---

### facultatif

- nodejs
- gs10050w64.exe
- TCPDF
- FPDI

---

## 🛠️ Étapes d'installation

### environnemnet de l'ordinateur

#### 1. configuration **SQL Server dans ODBC**

- via le panneau de configuration Windows

---

#### 2. Active directory

crée un AD puis utiliser le protocole LDA pour se connecter à l'application

#### 3. configuration du fichier `php.ini`

- Activer les extensions suivantes :
  - `extension=pdo_odbc`
  - `extension=odbc`
  - `extension=ldap`
  - `extension=php_pdo_sqlsrv_74_ts_x64.dll`
  - `extension=php_sqlsrv_74_ts_x64.dll`

---

### environnement de l'application

### 1. Cloner le dépôt

```bash
git clone https://github.com/hasinaAnd/Hffintranet
```

---

### 2. Installer Composer

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
export const baseUrl = "/Hffintranet";
```

---

### 6. Créer la base de données

Nom de la base : **NON_DE_VOTRE_BASE_DE_DONNER**

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

# connexion connexion à l'active directory
LDAP_DOMAIN=
LDAP_DN=
LDAP_HOST=
LDAP_PORT=

# Chemins système
BASE_PATH_LONG=C:/wamp64/www/Hffintranet
BASE_PATH_COURT=/Hffintranet
BASE_PATH_FICHIER=C:/wamp64/www/Upload
BASE_PATH_FICHIER_COURT=/Upload
BASE_PATH_DOCUWARE=C:/DOCUWARE
BASE_PATH_LOG=C:/wamp64/www/Hffintranet/var
```

---
