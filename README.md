# Glinche Vehicles

Application web de consultation de véhicules développée dans le cadre d'un exercice technique de recrutement pour un poste de développeur Web Full Stack en alternance chez Glinche Automobiles.

L'application permet de récupérer les véhicules depuis l'API Glinche, de consulter leurs principales caractéristiques et de filtrer le catalogue par marque.

## Fonctionnalités

- Récupération des véhicules depuis l'API Glinche.
- Affichage des véhicules sous forme de cartes.
- Présentation des principales informations : marque, modèle, finition, kilométrage, énergie, prix et photo.
- Filtrage dynamique des véhicules par marque à partir des données disponibles.
- Interface responsive avec une page d'accueil et un accès au catalogue.
- Gestion des erreurs lors de la récupération des données de l'API.

## Technologies utilisées

- **Back-end :** PHP et Laravel
- **Front-end :** Vue.js avec TypeScript
- **Intégration front-end :** Inertia.js
- **Styles :** Tailwind CSS
- **Outils :** Composer, npm et Git
- **API externe :** API partenaires Glinche Automobiles
- **Base de données :** SQLite configurée par défaut dans Laravel

## Prérequis

Avant de commencer, installer :

- PHP dans une version compatible avec le projet et ses dépendances Composer.
- Composer.
- Node.js et npm.
- Git.
- Un accès autorisé à l'API Glinche et les identifiants nécessaires.

## Installation

### 1. Cloner le dépôt

```bash
git clone <URL_DU_DEPOT>
cd <NOM_DU_DOSSIER>
```

Remplacer les valeurs entre chevrons par l'URL du dépôt Git et le nom du dossier du projet.

### 2. Installer les dépendances PHP

```bash
composer install
```

### 3. Installer les dépendances JavaScript

```bash
npm install
```

### 4. Configurer les variables d'environnement

Créer le fichier `.env` à partir du modèle fourni :

Sur macOS ou Linux :

```bash
cp .env.example .env
```

Sur Windows PowerShell :

```powershell
Copy-Item .env.example .env
```

Générer ensuite la clé de l'application Laravel :

```bash
php artisan key:generate
```

Renseigner dans le fichier `.env` les paramètres nécessaires à la connexion à l'API :

```env
GLINCHE_API_URL=
GLINCHE_API_EMAIL=
GLINCHE_API_PASSWORD=
```

Les valeurs doivent être fournies par Glinche Automobiles. L'URL doit correspondre à la base d'API attendue par le service développé dans l'application.

**Important :** ne jamais publier le fichier `.env` ni les identifiants de l'API dans le dépôt Git.

### 5. Préparer la base de données si nécessaire

Le projet utilise SQLite par défaut dans sa configuration Laravel.

Si l'application ou ses migrations nécessitent une base SQLite, créer le fichier `database/database.sqlite`, puis exécuter les migrations :

Sur macOS ou Linux :

```bash
touch database/database.sqlite
php artisan migrate
```

Sur Windows PowerShell :

```powershell
New-Item database/database.sqlite -ItemType File
php artisan migrate
```

Si le fichier existe déjà, ne pas le recréer. Si les migrations demandent une confirmation, vérifier les instructions affichées avant de poursuivre.

### 6. Lancer l'application

Le projet utilise le script de développement Composer fourni par Laravel :

```bash
composer run dev
```

Ce script peut lancer le serveur Laravel et le serveur Vite ensemble, selon la configuration du projet.

Si ce script n'est pas disponible ou ne lance pas les deux serveurs, utiliser deux terminaux séparés.

Terminal 1 :

```bash
php artisan serve
```

Terminal 2 :

```bash
npm run dev
```

Ouvrir ensuite l'adresse locale indiquée par Laravel dans le terminal, généralement `http://127.0.0.1:8000`.

## Utilisation

1. Ouvrir la page d'accueil.
2. Accéder au catalogue des véhicules.
3. Consulter les caractéristiques principales de chaque véhicule.
4. Sélectionner une marque pour filtrer les résultats.
5. Réinitialiser le filtre pour afficher de nouveau l'ensemble du catalogue.

Les véhicules affichés dépendent des données retournées par l'API Glinche.

## Choix techniques

### Laravel

Laravel gère les routes, le contrôleur et les appels au service externe. La logique de communication avec l'API est séparée dans un service dédié afin d'éviter de mélanger les requêtes HTTP et le contrôleur.

### Vue.js et Inertia.js

Vue.js est utilisé pour construire l'interface utilisateur. Inertia.js permet de transmettre les données du back-end aux pages Vue sans avoir à développer une API interne distincte pour cette interface.


### Librairie et Framework de style

Tailwindcss a été utilisé pour le style permettant une syntaxe plus propre pour le css,
Des librairie UI on été utilisé notamment Shadcn/Vue pour les composant comme le filtre.

### Filtrage par marque

Les marques sont construites à partir des véhicules reçus de l'API. Cette approche évite de maintenir manuellement une liste de marques qui pourrait devenir incomplète.

### Base de données

Les véhicules sont récupérés depuis l'API externe. L'application n'a donc pas besoin de les enregistrer localement pour les afficher et appliquer le filtre. SQLite reste la base configurée par défaut dans Laravel pour les fonctionnalités qui en auraient besoin.

## Difficultés rencontrées

- Configuration de l'environnement PHP et de Composer sur Windows.
- Gestion des variables d'environnement lors du clonage du projet sur une autre machine.
- Configuration de SQLite et des fonctionnalités internes de Laravel.
- Vérification du certificat SSL lors des appels HTTPS à l'API.
- Adaptation de la structure des données reçues de l'API pour l'affichage dans Vue.js.

Ces difficultés ont permis de mieux comprendre la configuration d'un projet Laravel, la gestion des dépendances et la communication avec une API externe.

## Sécurité

- Les identifiants de l'API sont stockés dans `.env`.
- Le fichier `.env` ne doit pas être versionné.
- Le fichier `.env.example` fournit uniquement un modèle de configuration sans identifiants réels.
- La vérification des certificats SSL doit rester activée lors des appels HTTPS.

## Améliorations possibles

Avec davantage de temps, plusieurs améliorations pourraient être envisagées :

- Ajouter des tests automatisés pour le service API et le filtrage.
- Améliorer les états de chargement et les messages d'erreur.
- Ajouter d'autres critères de recherche.
- Mettre en place une pagination si le volume de véhicules le nécessite.
- Compléter les tests responsive sur différents formats d'écran.
- Ajout d'un dashboard Administateur afin d'ajouté ou supprimer des vehicules sur l'application.
- Page de véhicules plus détaillé afin de permettre a l'utilisateur d'avoir plus d'information.


## Contexte

Ce projet a été réalisé dans le cadre d'un exercice technique visant à évaluer la structuration du code, la consommation d'une API externe, le développement full stack et la qualité de l'interface utilisateur.
