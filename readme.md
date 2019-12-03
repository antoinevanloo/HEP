# My-moment
GitHub: https://github.com/antoinevanloo/my-moment

## Description
My-moment est un site de prise de rendez-vous “bien être” à domicile, qui vous permet de recevoir des soins chez vous. En un clic, réservez le créneau qui vous arrange et accordez vous un moment de détente afin de vous ressourcer. 


My-moment est une application PHP réalisé avec le framework symfony, à la syntaxe élégante et expressive.

## Exigences 
- PHP 7.1.3 or higher;
- PDO-SQLite PHP extension enabled;
- et les [exigences habituelles des applications Symfony](https://symfony.com/doc/current/reference/requirements.html).
## Installation
### Récupérer le dépot
```
git clone https://github.com/antoinevanloo/my-moment.git
```
### Installation des dépendances 
```
'yarn' ou 'npm install'
```

### Configuration des autorisations de fichiers
Dans tous les environnements, le répertoire des journaux ( var/log/ par défaut) doit exister et être accessible en écriture pour l'utilisateur du serveur Web et l'utilisateur du terminal.

Avant d'essayer d'accéder à votre projet nouvellement créé, vous devez configurer l'écriture sur les répertoires **cache/** et **log/** à des niveaux appropriés, afin que votre serveur web puisse écrire dedans :
`$ chmod 777 cache/ log/`

```
my-moment/
├─ var/
│  ├─ cache/
│  │  ├─ dev/   # cache directory for the *dev* environment 
│  │  └─ prod/  # cache directory for the *prod* environment
│  ├─ log/
```

### Création de la base de données
Vos paramètres de connexion sont déjà configurés lors de l'import du projet. Doctrine peut créer la base de données pour vous.
```
 cd my-moment/
 php bin/console doctrine:database:create
```
Mettre à jour la BDD par rapport au Entité créer
```
php bin/console doctrine:migrations:migrate
```

## Utilisation
Pour lancer votre serveur web local, situez-vous dans votre projet
```
 cd my-moment/
 symfony server:start
```
Visitez la page http://localhost:8000/index.php de votre navigateur Web pour voir votre application dans l'environnement configuré.

## Personnalisation

Pour changer l'environnment de l'application en **test** / **demo** / ou **prod** veuillez éditer le fichier .env

modifier la variable d'environment **APP_ENV=dev**

```
###> symfony/framework-bundle ###
APP_ENV=dev
```  

## Réalisation en cours
 WIP
## Réalisation futur
 - Une version Business de l'application, permettant aux entreprises d’organiser des sessions bien être pour leurs salariés pourrait ensuite être mise en place.
 
 - La prise de Rendez-vous pour un tiers pourrait également être ajoutée pour permettre par exemple de prendre des RDV pour les personnes âgées ne pouvant se déplacer ou n'ayant pas axé à internet. 

## Crédits

Merci à toute l'équipe qui a contribué au projet 

Alizée STOWBOLSKI
- Porteuse du projet
- Formation : WIS (Digital Business)

Guillaume PHILIPPE
- Assistant chef de projet
- Formation : WIS (Digital Business)

Adrien DESTOUESSE
- Développeur
- Formation : EPSI (Concepteur développeur d’Application)

Clément LORIAUX
- Lead développeur
- Formation : EPSI (Concepteur développeur d’Application)

Loïc LE MINOUX
- Designer UX / UI
- Formation : EPSI (Concepteur développeur d’Application)

Nassim NOUARA
- Formation : EPSI (Concepteur développeur d’Application)w²
- Administrateur de BDD

Marc Terence NDONG NZE MICHONET
- Formation : EPSI (Concepteur développeur d’Application)
- Développeur full stack

Antoine VAN LOO
- Développeur
- Formation : EPSI ( Concepteur développeur d’Application)
