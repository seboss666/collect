<?php

require 'modele/modele.php';

// Affiche la liste de tous les films de la bdd
function listerFilms() {
    $filmList = getFilms();
    $films = $filmList['listFilms'];
    $counts = $filmList['countFilms'];
    $titre = "Liste complète";
    $lienFilm = "index.php?action=afficherFilm&id=";
    require 'vue/listeFilms.php';
}

function manageTypes() {
    $typeList = getTypes();
    $types = $typeList['listTypes'];
    $counts = $typeList['countTypes'];
    $titre = "Gestion des Types";
    require 'vue/typeManage.php';
}

//reste des actions de types à faire

//Aficher les 10 derniers films
function lastFilms() {
    $filmList = getLast();
    $films = $filmList['listFilms'];
    $counts = $filmList['countFilms'];
    $titre = "Derniers ajouts";
    $lienFilm = "index.php?action=afficherFilm&id=";
    require 'vue/listeFilms.php';
}

// Affiche le détail d'un film
function afficherFilm($id) {
    $film = getFilm($id);
    $titre = "Détail de " . $film['titre'];
    require 'vue/detailFilm.php';
}

//Affiche la liste des films prêtés
function listerPrets() {
    $filmList = getPrets();
    $films = $filmList['listFilms'];
    $counts = $filmList['countFilms'];
    $titre = "Liste des prêts";
    $lienFilm = "index.php?action=afficherFilm&id=";
  require 'vue/listeFilms.php';
}

//Cherche les films suivant la requête
function searchFilms($requete) {
  $filmList = getSearch($requete);
  $films = $filmList['listFilms'];
  $counts = $filmList['countFilms'];
  $titre = "Résultats pour ". $requete;
  $lienFilm = "index.php?action=afficherFilm&id=";
  require 'vue/listeFilms.php';
}

// Affiche une erreur
function afficherErreur($msgErreur)
{
    $titre = "Erreur !";
    require 'vue/erreur.php';
}

//Formulaire d'ajout d'un nouveau film
function ajoutFilm() {
  $titre="Ajouter un film";
  require 'vue/ajouterFilm.php';
}

//Ajouter le film dans la base
function ajouterFilm() {
  $idFilm = addFilm($_POST['titre'], $_POST['annee'], $_POST['id_type']);
  header('Location: index.php?action=afficherFilm&id=' . $idFilm);
}

//Formulaire de modification d'un film  
function modifierFilm($id) {
  $film = getFilm($id);
  $titre = "Modifier " . $film['titre'];
  require 'vue/modifierFilm.php';
}

//Enregistrement des modifications
function updateFilm() {
  updFilm($_POST['annee'], $_POST['id_type'], $_POST['pret'], $_POST['nom_pret']);
  header('Location: index.php?action=afficherFilm&id=' . $_POST['id']);
}

//Suppression d'un film
function supprimerFilm($idFilm) {
  deleteFilm($idFilm);
  header('Location: index.php');
}

function getSecret() {
  $titre = "Accès restreint";
  require 'vue/getSecret.php';
}

function putSecret($pass, $destination) {
  global $secret;
  $pass_poste = htmlspecialchars(stripcslashes($pass));
  if ($pass_poste == $secret) {
    $_SESSION['isSecret'] = 1;
    header('Location: ' . $destination);
  }
  else {
    $_SESSION['isSecret'] = 0;
    throw new exception("Mot de passe incorrect");
  }

}

function delSecret() {
  $_SESSION['isSecret'] = 0;
  $redirect_to = !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
  header('Location: ' . $redirect_to);
}

function about() {
  $titre = "A propos";
  require 'vue/about.php';
}