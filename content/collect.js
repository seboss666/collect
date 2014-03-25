function couleur(obj) {
  obj.style.backgroundColor = "rgba(0,0,0,0)";
}

function check() {
  var msg = "";
  if (document.insertion.titre.value == "")	{
    msg += "Veuillez saisir le titre\n";
    document.insertion.titre.style.backgroundColor = "rgba(255,208,189,0.5)";
  }
  if (document.insertion.titre.value.charAt(0) == " ") {
    msg += "Caractère interdit dans le titre\n";
    document.insertion.titre.style.backgroundColor = "rgba(255,208,189,0.5)";
  }
  model = /^[0-9]{4}$/;
  if (document.insertion.annee.value.match(model) == null) {
    msg += "La date n'est pas au bon format";
    document.insertion.annee.style.backgroundColor = "rgba(255,208,189,0.5)";
  }
  //Si aucun message d'alerte a été initialisé on retourne TRUE
  if (msg == "") return(true);
  //Si un message d'alerte a été initialisé on lance l'alerte
  else	{
    alert(msg);
    return(false);
  }
}