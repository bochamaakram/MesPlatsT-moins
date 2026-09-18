# Mes Plats Témoins — Site institutionnel + back-office

Site web du cabinet **BEROCERT CONSULTING** pour la présentation et la promotion des
guides, de la réglementation et des solutions liées aux **plats témoins** en restauration.

## Ce que contient le site

| Page                 | URL                   |
| -------------------- | --------------------- |
| Accueil              | `/`                   |
| Vos besoins          | `/vos-besoins`        |
| Comment procéder     | `/comment-proceder`   |
| Réglementation       | `/reglementation`     |
| Solutions            | `/solutions`          |
| Contact              | `/contact`            |
| Espace administrateur| `/admin`              |

Le site public (les 6 pages) est un front-end statique moderne (React + Tailwind).
Le back-office `/admin` permet de **consulter les messages reçus** et de **modifier les
informations de contact** (coordonnées, horaires, bandeau, pied de page…).

## Accès administrateur

- URL : `http://localhost:8000/admin`
- E-mail : `admin@mesplatstemoins.ma` (ou `admin@mesplatstemolns.ma`)
- Mot de passe : `password`

## Comment lancer le projet

### Prérequis
- PHP 8.2+
- Composer
- Node.js 20+

### Étapes

```bash
# 1. Installer les dépendances PHP
composer install

# 2. Installer les dépendances JavaScript
npm install

# 3. Lancer le serveur
php artisan serve
```

Puis ouvrir **http://localhost:8000**.

> La base de données est déjà fournie (`database/database.sqlite`) : les pages, les
> réglages et le compte administrateur sont déjà en place. Pour repartir de zéro :
> `php artisan migrate:fresh --seed`.

> Les fichiers de production sont déjà compilés dans `public/assets` (site public) et
> `public/build` (back-office). Si vous modifiez du code, régénérez-les avec
> `npm run build` puis recopiez le site public depuis `dist/` vers `public/`.

## Structure technique

- **Laravel 13 (PHP/Inertia)** — serveur, API et back-office.
- **React 19 + Vite + Tailwind CSS 4** — site public (généré à partir de la maquette Figma).
- **React 18 + Inertia** — back-office.
- **SQLite** — base de données (aucun serveur SQL à installer).

## Rapport de tests effectués

- Les 6 pages publiques s'affichent correctement (testées dans un navigateur sans
  erreur JavaScript).
- Le formulaire de contact enregistre les demandes en base de données.
- La connexion à `/admin` (l'adresse d'administration) redirige vers l'espace
  administrateur.
- Les sections Messages et Paramètres répondent correctement.