# Générateur de CV PDF — domPDF

Ce projet permet de créer un CV à partir d’un formulaire, de le prévisualiser en temps réel, puis de l’exporter au format **PDF** à l’aide de la librairie domPDF.

## Technologies utilisées

- HTML
- CSS
- JavaScript
- PHP
- domPDF
- Composer

## Installation

Avant de commencer, il faut disposer de :

- PHP installé sur la machine
- Composer installé
- Les extensions PHP suivantes activées :
  - mbstring
  - dom
  - gd

Une fois cela fait, à la racine du projet, il faut exécuter la commande :

composer require dompdf/dompdf

## Utilisation

Au clique sur le bouton de téléchargement, toutes les données du CV (identité, expériences, formations, compétences, template choisi, etc.) sont envoyées au serveur sous forme de JSON via une requête POST.

Ces données sont stockées dans un objet JavaScript unique, puis transmises au fichier PHP chargé de l’export.

Le fichier exportPdf.php :

- récupère les données envoyées
- décode le JSON
- prépare les informations à afficher (dates, textes, photo, etc.)

Les données sont ensuite accessibles dans une variable PHP utilisée par le template PDF.

domPDF est ensuite utilisé pour :

- charger le HTML généré
- appliquer le CSS
- générer le document final

Le PDF est alors créé entièrement côté serveur.
Une fois le rendu terminé, le fichier PDF est automatiquement téléchargé par le navigateur.
