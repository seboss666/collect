<?php
session_start();

if (!isset($_SESSION['isSecret'])) {
  $_SESSION['isSecret'] = 0;
}


include('modele/config.inc.php');

require('controleur/actions.php');
 
try {
    
    if (isset($_GET['action'])) {
        $action = htmlentities($_GET['action']);
        switch ($action) {
        case 'afficherFilm':
            if (isset($_GET['id'])) {
                $idFilm = intval($_GET['id']);
                if ($idFilm != 0)
                    afficherFilm($idFilm);
                else
                    throw new Exception("Identifiant de billet non valide");
            }
            else
                throw new Exception("Identifiant de billet non défini");
            break;
        
        case 'prets':
            listerPrets();
            break;

        case 'search':
            if (isset($_GET['titre']) and ($_GET['titre'] !== "")) {
              $requete = htmlspecialchars($_GET['titre']);
              searchFilms($requete);
            }
            else 
              throw new Exception("Veuillez saisir un titre de film à rechercher");
            break;

        case 'ajoutFilm':
            if ($_SESSION['isSecret'] == 1) {
              ajoutFilm();
            }
            else
              throw new Exception("Action non permise");
            break;
            
        case 'ajouter':
            if ($_SESSION['isSecret'] == 1) {
              ajouterFilm();
            }
            else
              throw new Exception("Action non permise");
            break;
            
        case 'modifier':
            if (isset($_GET['id'])) {
                $idFilm = intval($_GET['id']);
                if ($idFilm != 0)
                    if ($_SESSION['isSecret'] == 1) {
                      modifierFilm($idFilm);
                    }
                    else
                      throw new Exception("Action non permise");
                else
                    throw new Exception("Identifiant de billet non valide");
            }
            else
                throw new Exception("Identifiant de billet non défini");
            break;
            
        case 'update':
            if ($_SESSION['isSecret'] == 1) {
              updateFilm();
            }
            else
              throw new Exception("Action non permise");
            break;

        case 'delete':
            if (isset($_GET['id'])) {
                $idFilm = intval($_GET['id']);
                if ($idFilm != 0) {
                      if($_SESSION['isSecret'] == 1) {
                        supprimerFilm($idFilm);
                        }
                      else
                        throw new Exception("Action non permise");
                    }
                else
                    throw new Exception("Identifiant de billet non valide");
            }
            else
                throw new Exception("Identifiant de billet non défini");
            break;

        case 'login':
            if ($_SESSION['isSecret'] == 0) {
              getSecret();
            }
            else {
              $redirect_to = !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
              header('Location: ' . $redirect_to);
            }
            break;

        case 'putSecret':
            if (isset($_POST['password']) and isset($_POST['origine'])) {
              putSecret(htmlspecialchars($_POST['password']), $_POST['origine']);
              }
            else
              throw new Exception ("Mot de passe non défini");
            break;

        case 'logout':
          if ($_SESSION['isSecret'] == 1) {
            delSecret();
          }
          else {
            $redirect_to = !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
            header('Location: ' . $redirect_to);
            }
          break;

        case 'complet':
          listerFilms();
          break;

        case 'about':
          about();
          break;

//Action par défaut        
        default:
            throw new Exception("Action non valide");
            break;
        }
    }
    else {
        lastFilms();  // action par défaut
    }
}

catch (Exception $e) {
    afficherErreur($e->getMessage());
}