<?php ob_start() ?>
<ul data-role="listview" data-inset="false" data-icon="false" data-divider-theme="b">
<li data-role="list-divider"><span class="ui-li-count"><?php echo $counts; ?> Résultat<?php if ($counts > 1) { echo "s"; } ?></span></li>
<?php foreach ($films as $film): 
  ?>
  <li>
    <a href="<?php echo $lienFilm . $film['id']; ?>"><h2><?php echo $film['titre']; ?></h2>
<?php if ($film['pret']) { ?>
  <p>Prété à <?php echo $film['nom_pret']; ?></p>
<?php } ?>
  <p class="ui-li-aside"><?php echo date("d/m/Y", strtotime($film['dateAjout'])); ?></p>
    </a>
  </li>
<?php endforeach; ?>
</ul>
<?php $contenu = ob_get_clean() ?>

<?php require 'vue/gabarit.php' ?>