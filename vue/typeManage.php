<?php ob_start() ?>
<ul data-role="listview" data-inset="false" data-icon="false" data-divider-theme="b">
  <li data-role="list-divider">Types <span class="ui-li-count"><?php echo $counts; ?> Résultat<?php if ($counts > 1) { echo "s"; } ?></span></li>
<?php foreach ($types as $type): 
  ?>
  <li>
    <p><a href="index.php?action=dropType&id=<?php echo $type['id_type']; ?>" onClick="return(confirm('Voulez-vous vraiment supprimer ?'));"><i class='icon-remove'></i></a><a href="index.php?action=modifierType&id=<?php echo $type['id_type']; ?>"><?php echo $type['types']; ?></p>
  </li>
<?php endforeach; ?>
  <li data-role="list-divider">Ajouter une catégorie</li>
</ul>
<form action="index.php?action=addType" method="post">
  <input type="text" name="types" id="types" placeholder="Nouveau type" />
  <input type="submit" value="Ajouter">
</form>

<?php $contenu = ob_get_clean() ?>

<?php require 'vue/gabarit.php' ?>