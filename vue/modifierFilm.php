<?php ob_start() ?>
      <form id="maj" action="index.php?action=update" method="post" onSubmit="check();">
          <input type="hidden" name="id" value="<?php echo $film['id']; ?>" />
          <input type="hidden" name="titre" value=<?php echo $film['titre']; ?>" />
          <ul data-role="listview" data-inset="true">
          
            <li data-role="fieldcontain">
              <h3>Année</h3>
              <input type="text" name="annee" id="annee" placeholder="Année" value="<?php echo $film['annee']; ?>" onKeyUp="javascript:couleur(this);" />
            </li>

            <li data-role="fieldcontain">
              <fieldset data-role="controlgroup" data-type="horizontal" data-mini="true">
                <legend>Type</legend>
                <input type="radio" name="id_type" id="radio-choice-ab" value="1" <?php if ($film['id_type'] == 1) { ?>checked="checked" <?php } ?> />
                <label for="radio-choice-ab">DVD</label>
                <input type="radio" name="id_type" id="radio-choice-bb" value="2" <?php if ($film['id_type'] == 2) { ?>checked="checked" <?php } ?> />
                <label for="radio-choice-bb">Bluray</label>
              </fieldset>
            </li>
            <li data-role="fieldcontain">
              <label for="flip2b">Prêté</label>
              <select name="pret" id="flip2b" data-role="slider">
                <?php if (!$film['pret']) {
                ?><option value="0">Non</option>
                <option value="1">Oui</option><?php }
                else { ?>
                <option value="1">Oui</option>
                <option value="0">Non</option>
                <?php } ?>
              </select>
            </li>
            <li data-role="fieldcontain">
              <h3>Emprunteur</h3>
              <input type="text" name="nom_pret" id="nom_pret" placeholder="Nom de l'emprunteur" value="<?php echo $film['nom_pret']; ?>" />
            </li>
            <li data-role="fieldcontain">
              <input type="submit" value="Valider" />
            </li>
          </ul>
        </form>

<?php $contenu = ob_get_clean() ?>

<?php include 'vue/gabarit.php' ?>