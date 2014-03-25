<?php ob_start() ?>
<form action="index.php?action=modifier&id=<?php echo $film['id']; ?>" method="post">
  <ul data-role="listview" data-inset="true">
    <li data-role="fieldcontain">
      <h3>Année</h3>
      <p>&emsp;<?php if ($film['annee'] == "0" ) { echo "Inconnue"; } else { echo $film['annee']; } ?></p>
    </li>
    <li data-role="fieldcontain">
      <h3>Type</h3>
    <p>&emsp;<?php echo $film['types']; ?></p>
    </li>
    <li data-role="fieldcontain">
      <h3><?php if ($film['pret'])
    { ?>Prêté à</h3>
    <p>&emsp;<?php echo $film['nom_pret']; ?></p> <?php }
    else
    { ?> Disponible</h3> <?php }
    ?>
    </li>
    
    <li data-role="fieldcontain">
      <h3>Date d'ajout</h3>
      <p>&emsp;<?php echo date("d/m/Y", strtotime($film['dateAjout'])); ?></p>
    </li>
  </ul>
    <?php  if ($_SESSION['isSecret'] == 1)  { ?>
  <input type="submit" value="Modifier" />
  </form>
  <form action="index.php?action=delete&id=<?php echo $film['id']; ?>" method="post">
  <input type="submit" value="Supprimer" onClick="return(confirm('Voulez-vous vraimment supprimer ce film ?'));" />
<?php } ?>
    </form>

<?php $contenu = ob_get_clean() ?>

<?php include 'vue/gabarit.php' ?>
