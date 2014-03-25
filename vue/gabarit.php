<!doctype html>
<html lang="fr">
  <head>
    <title><?php echo $titre; ?></title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="Viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  
    <link rel="stylesheet" href="content/font-awesome.min.css" />
    <link rel="stylesheet" href="content/jquerymobile.css"/>
    <link rel="stylesheet" href="content/jquerymobile.nativedroid.css" />
    <link rel="stylesheet" href="content/jquerymobile.nativedroid.dark.css" id='jQMnDTheme' />
    <link rel="stylesheet" href="content/jquerymobile.nativedroid.color.blue.css" id='jQMnDColor' />

    <script type="text/javascript" src="content/collect.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript">
      $(document).bind("mobileinit", function () {
      $.mobile.ajaxEnabled = false;
});
</script>
    <script src="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>

  </head>
  <body>

  <div data-role="page" data-theme="b">

<!-- Bloc du menu de gauche activable avec le bouton de la bannière -->  
    <div data-role="panel" id="leftpanel" data-theme="b">
        <form action="index.php" method="get">
            <input type="hidden" name="action" value="search" />
            <input type="text" name="titre" placeholder="Chercher un titre" />
            <input type="submit" value="Rechercher" />
        </form>
        <ul data-role="listview">
            <li><a href="index.php">Derniers ajouts</a></li>
            <li><a href="index.php?action=complet">Liste complète</a></li>
            <li><a href="index.php?action=prets">Liste des prêts</a></li>
            <li><a href="index.php?action=about">A propos</a></li>
            <li data-role="list-divider">Admin</li>
            <?php if ($_SESSION['isSecret'] == 1) { ?>
            <li><a href="index.php?action=ajoutFilm">Ajouter un film</a></li>
            <li><a href="index.php?action=logout">Logout</a></li>
            <?php }
            else { ?>
            <li><a href="index.php?action=login">Login</a></li>
            <?php } ?>
        </ul>
    </div> <!-- Panel -->
    
<!-- Bannière affichant le titre de la page et le bouton qui découvre le menu -->    
    <div id="banniere" data-role="header" data-position="fixed" data-tap-toggle="false" data-theme="b">
      <a href="#leftpanel"><i class='icon-list'></i></a>
      <h1><?php echo $titre; ?></h1>
    </div> <!-- header -->

<!-- Div globale (oui, c'est l'id) avec le contenu de la page -->    
    <div id="global" data-role="content" data-theme="b">   
      <div class="inset">
        <?php echo $contenu; ?>
      </div> <!-- #inset" -->
    </div>   <!-- #global -->
    <script type='text/javascript'>
$(document).on('pageinit',function(){
	$("#banniere").on("swiperight",function(){
		$("#leftpanel").panel( "open");
	});
});
</script>

        Collect &copy; Seboss666, 2013
  </div><!-- #page -->
  </body>
</html>