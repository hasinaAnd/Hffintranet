# DOCUMENTATION HFF INTERANET

## Pre-requis

- sqlServeur V19.2
- configuration de sqlserver dans ODBC
- installation de wamp3.3.2 (php7.4)
- configuration de php.ini

## Etape à suivre:

- exportation de la code source dans github de hasinaAnd, (https://github.com/hasinaAnd/Hffintranet)
- istallation de composer
- creation de dossier var\cache\proxies
- excuté la commande

```Bash
php proxie.php
```

- creation du fichier config.js dans Views\js\utils, ajouter la ligne suivant

```Bash
export const baseUrl = "/Hffintranet_maquette";
```

- creation de la base de donnée HFF_INTRANET_MAQUETTE
- executé les requêtes dans le dossier sql pour la creation de table et les données pré definie
- creation de fichier .env,

```Bash
#connexion à la bas ede donnée sqlServer
DB_DNS_SQLSERV=
DB_USERNAME_SQLSERV=
DB_PASSWORD_SQLSERV=


#connexion à la bas ede donnée sqlServer sans ODBC
DB_NAME=
DB_PASSWORD=
DB_USERNAME=
DB_HOST=

#Chemin de base
BASE_PATH_LONG=C:/wamp64/www/Hffintranet_maquette
BASE_PATH_COURT=/Hffintranet_maquette
BASE_PATH_FICHIER=C:/wamp64/www/Upload
BASE_PATH_FICHIER_COURT=/Upload
BASE_PATH_DOCUWARE=C:/DOCUWARE
BASE_PATH_LOG=C:/wamp64/www/Hffintranet_maquette/var
```
