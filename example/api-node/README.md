# Api GoStyle

## Récupérer le projet

#### Après avoir cloné le dépôt :

Une fois placé dans le dossier local, il faut exécuter la commande suivante:

`npm install`

Cela permet de récupérer les modules node.

Ensuite avant de lancer l'application il faut paramétrer la connexion à la base de données et remplacer les valeurs initiales par vos valeurs dans le fichier `dbconfig.json`:

```json
{
    "host": "your_host",
    "user": "your_user",
    "password": "your_password",
    "database": "database_name"
}
```

### Lancer l'application

Deux choix s'offrent à vous, soit un démarrage classique, soit un démarrage optimisé pour le développement.

#### Choix 1, démarrage classique :

A l'aide d'un terminal de commande, positionnez vous dans le répertoire de l'application et exécutez la commande suivante :

`node api.js`

Il faudra couper l'application manuellement et la relancer à l'aide de cette même commande si une modification a été effectuée dans le code.

#### Choix 2, démarrage optimisé pour le développement :

A l'aide d'un terminal de commande, positionnez vous dans le répertoire de l'application et exécutez la commande suivante :

`npm install nodemon -g`

Une fois cette installation terminée, il vous suffit de taper dans votre terminal cette commande :

`nodemon api.js`

A partir de là, si vous effectuez une modification dans le code, il vous suffit de faire un **CTRL + S** et l'application redémarrera automatiquement.

### Avant chaque commit/push

Il faut impérativement supprimer le dossier **node_modules** et remettre les paramètres de connexion à la base de données d'origine.

## Documentation de l'API GoStyle

### Méthodes

| Méthode | Route | Utilité | Corps de la requête |
| ------ | ----------- | ----------- | ----------- |
| GET | **http://141.94.68.203:3000/users** | Récupère la liste des utilisateurs | `null`
| GET | **http://141.94.68.203:3000/users/{mail}** | Récupère un utilisateur précis grâce à son adresse mail | `null`
| GET | **http://141.94.68.203:3000/users/{mail}/qrcodes** | Récupère les qrcodes possédés par un utilisateur précis grâce à son adresse mail | `null`
| GET | **http://141.94.68.203:3000/qrcodes** | Récupère la liste des QrCodes | `null`
| GET | **http://141.94.68.203:3000/qrcodes/{code}** | Récupère un QrCode précis grâce à son code | `null`
| POST | **http://141.94.68.203:3000/users/login** | Permet la connexion ou non d'un utilisateur | `{ "login": "username", "password": "pwd" }`
| POST | **http://141.94.68.203:3000/users/register** | Permet l'inscription ou non d'un utilisateur | `{ "login": "username", "email":"mail@mail.com", "password": "pwd" }`
| POST | **http://141.94.68.203:3000/users/qrcode** | Permet l'association d'un utilisateur avec un QrCode | `{ "login": "username", "code": "Code" }`


### Exemples d'appels

Méthode | Route | Corps de la requête | Corps de la réponse
| ------ | ----------- | ----------- | ------------ |
| GET | **http://141.94.68.203:3000/users/Caldy3@gmail.com** | `null` | `{ "username": "Caldy3", "email": "Caldy3@gmail.com" }`
| GET | **http://141.94.68.203:3000/qrcodes/ldizos893mdpa** | `null` | `{ "promotion_code": "KL09dbs", "description": "-60 % sur la veste verte !", "start_date": "2021-04-22T22:00:00.000Z", "end_date": "2021-04-27T22:00:00.000Z" }`
| GET | **http://141.94.68.203:3000/users/fred321@gmail.com/qrcodes** | `null` | `[ { "promotion_code": "UlB53", "description": "-25 % sur nos t-shirts !", "start_date": "2021-04-26T22:00:00.000Z", "end_date": "2021-05-29T22:00:00.000Z" }, { "promotion_code": "KL09dbs", "description": "-60 % sur la veste verte !", "start_date": "2021-04-22T22:00:00.000Z", "end_date": "2021-04-27T22:00:00.000Z" } ]`
| POST | **http://141.94.68.203:3000/users/login** | `{ "login": "Pointet", "password": "Pointet" }` | `{ "login": "Pointet", "email": "pointet@gmail.com" }`
| POST | **http://141.94.68.203:3000/users/register** | `{ "login": "Pointet", "email":"pointet@gmail.com","password": "Pointet" }` | `null`
| POST | **http://141.94.68.203:3000/users/qrcode** | `{ "login": "Pointet", "code": "uelsh63qsdhdd" }` | `null`
