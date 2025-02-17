First install

docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php84-composer:latest \
    composer install --ignore-platform-reqs

Then

cp .env.example .env

Then 


sail up -d


# API Lorcana

API RESTful pour gérer les utilisateurs, les chapitres, les cartes et les wishlist du jeu **Lorcana**.

## 📦 Prérequis

Avant de commencer, assurez-vous d'avoir installé les outils suivants :

- [Docker](https://www.docker.com/get-started) (pour exécuter Sail)
- [Composer](https://getcomposer.org/) (pour installer les dépendances PHP)
- [Node.js et npm](https://nodejs.org/) (pour installer les dépendances JavaScript)

## Installation

### 1. Cloner le projet

Clonez ce repository dans votre machine locale.

```bash
git clone https://bitbucket.org/brybry_lvx/lorcana.git
cd lorcana_api

# Installer les dépendances PHP
composer install

# Installer les dépendances JavaScript
npm install
cp .env.example .env
sail artisan key:generate
sail up -d
sail artisan migrate
sail artisan db:seed

#Tester les endpoints
Allez sur Insomnia ou sur Potsman pour tester les endpoints
