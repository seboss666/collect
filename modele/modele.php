<?php

function getBdd() {
    global $dbhost, $dbname, $dbuser, $dbpass;
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host='. $dbhost .';dbname=' . $dbname, $dbuser, $dbpass, $pdo_options);
    return $bdd;
}

function getFilms() {
    $bdd = getBdd();
    $requeteFilms = "SELECT * FROM collect_liste_films ORDER BY titre ASC";
    $countLast = "SELECT COUNT(*) as total FROM collect_liste_films ORDER  BY titre ASC";
    $stmtFilms['listFilms'] = $bdd->query($requeteFilms);
    $total = $bdd->query($countLast);
    $donnees_total = $total->fetch();
    $stmtFilms['countFilms'] = $donnees_total['total'];
    return $stmtFilms;
}

function getLast() {
    $bdd = getBdd();
    $requeteLast = "SELECT * FROM collect_liste_films ORDER BY id DESC LIMIT 0, 10";
    $stmtFilms['listFilms'] = $bdd->query($requeteLast);
    $stmtFilms['countFilms'] = 10;
    return $stmtFilms;
}

function getPrets() {
    $bdd = getBdd();
    $requetePrets = "SELECT * FROM collect_liste_films WHERE pret = 1 ORDER BY titre ASC";
    $countLast = "SELECT COUNT(*) as total FROM collect_liste_films WHERE pret = 1 ORDER BY titre ASC";
    $stmtFilms['listFilms'] = $bdd->query($requetePrets);
    $total = $bdd->query($countLast);
    $donnees_total = $total->fetch();
    $stmtFilms['countFilms'] = $donnees_total['total'];
    return $stmtFilms;
}

function getSearch($requete) {
    $bdd = getBdd();
    $requeteSearch = "SELECT * FROM collect_liste_films WHERE titre LIKE '%" . $requete . "%' ORDER BY titre ASC";
    $countLast = "SELECT COUNT(*) as total FROM collect_liste_films WHERE titre LIKE '%" . $requete . "%' ORDER BY titre ASC";
    $stmtFilms['listFilms'] = $bdd->query($requeteSearch);
    $total = $bdd->query($countLast);
    $donnees_total = $total->fetch();
    $stmtFilms['countFilms'] = $donnees_total['total'];
    return $stmtFilms;
}

function getFilm($idFilm) {
    $bdd = getBdd();
    $stmtFilm = $bdd->query('SELECT l.*, t.* FROM collect_liste_films l LEFT JOIN collect_types t ON l.id_type = t.id_type WHERE l.id = ' . $idFilm );
    $film = $stmtFilm->fetch();
    return $film;
}

function addFilm($titreFilm, $anneeFilm, $typeFilm) {
    $bdd=getBdd();
    $ajoutFilm = $bdd->prepare('INSERT INTO collect_liste_films (titre, annee, id_type, dateAjout) VALUES(?, ?, ?, ?)');
    $titre_poste = htmlspecialchars(stripcslashes($titreFilm));
    $annee_poste = htmlspecialchars(stripcslashes($anneeFilm));
    $annee_poste += 0; //convertit l'année en entier, permet d'empecher autre chose qu'un chiffre
    $type_poste = intval($typeFilm);
    $ajout_poste = date("Y-m-d");
    $ajoutFilm->execute(array($titre_poste, $annee_poste, $type_poste, $ajout_poste));
    $film=$bdd->prepare('SELECT id, titre FROM collect_liste_films WHERE titre = ?');
    $film->execute(array($titre_poste));
    $idFilm=$film->fetch();
    $film->closecursor();
    return $idFilm['id'];
}

function updFilm($anneeFilm, $typeFilm, $pretFilm, $nomPretFilm) {
    $bdd=getBdd();
    $modifFilm = $bdd->prepare('UPDATE collect_liste_films SET annee = :annee, id_type = :id_type, pret = :pret, nom_pret = :nom_pret WHERE id = :id');
    $annee_poste = htmlspecialchars(stripcslashes($anneeFilm));
    $annee_poste += 0; //convertit l'année en entier, permet d'empecher autre chose qu'un chiffre
    $type_poste = intval($typeFilm);
    $pret_poste = intval($pretFilm);

    $nom_pret_poste = htmlspecialchars(stripcslashes($nomPretFilm));
    if (!$pret_poste) {
        $nom_pret_poste = "";
    }
    $modifFilm->execute(array('annee' => $annee_poste, 'id_type' => $type_poste, 'pret' => $pret_poste, 'nom_pret' => $nom_pret_poste, 'id' => $_POST['id']));
}

function deleteFilm($idFilm) {
    $bdd=getBdd();
    $delFilm = $bdd->prepare('DELETE FROM collect_liste_films WHERE id = ?');
  	$id_poste = htmlspecialchars(stripcslashes($idFilm));
  	$delFilm->execute(array($id_poste));
}

function getTypes() {
    $bdd = getBdd();
    $requeteTypes = "SELECT * FROM collect_types ORDER BY types ASC";
    $countLast = "SELECT COUNT(*) as total FROM collect_types ORDER BY types ASC";
    $stmtTypes['listTypes'] = $bdd->query($requeteTypes);
    $total = $bdd->query($countLast);
    $donnees_total = $total->fetch();
    $stmtTypes['countTypes'] = $donnees_total['total'];
    return $stmtTypes;
}

function recupType($idType) {
    $bdd = getBdd();
    $stmtType = $bdd->query('SELECT * FROM collect_types WHERE id_type = ' . $idType );
    $type = $stmtType->fetch();
    return $type;
}

function dropType($idType) {
    $bdd = getBdd();
    $delType = $bdd->prepare("DELETE FROM collect_types WHERE id_type = ?");
    $id_poste = intval($idType);
    $delType->execute(array($id_poste));
}

function updType($nomType) {
    $bdd=getBdd();
    $modifType = $bdd->prepare('UPDATE collect_types SET types = :types WHERE id_type = :id');
    $type_poste = htmlspecialchars(stripcslashes($nomType));
    $modifType->execute(array('types' => $type_poste, 'id' => $_POST['id']));
}

function addType($nomType) {
    $bdd=getBdd();
    $ajoutType = $bdd->prepare('INSERT INTO collect_types types VALUES ?');
    $type_poste = htmlspecialchars(stripcslashes($nomType));
    $ajoutType->execute(array($type_poste));
}