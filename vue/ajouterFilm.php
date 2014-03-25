<?php ob_start() ?>
      <form name="insertion" action="index.php?action=ajouter" method="post" onSubmit="return check();">
          <ul data-role="listview" data-inset="true">
          
            <li data-role="fieldcontain">
              <h3>Titre</h3>
              <input type="text" name="titre" id="titre" placeholder="Titre du film" onKeyUp="Javascript:couleur(this);" />
            </li>
            <li data-role="fieldcontain">
              <h3>Année</h3>
              <input type="text" name="annee" id="annee" placeholder="Année" onKeyUp="Javascript:couleur(this);" />
            </li>
            <li data-role="fieldcontain">
              <fieldset data-role="controlgroup" data-type="horizontal" data-mini="true">
                <legend>Type</legend>
                <input type="radio" name="id_type" id="radio-choice-ab" value="1" checked="checked" />
                <label for="radio-choice-ab">DVD</label>
                <input type="radio" name="id_type" id="radio-choice-bb" value="2" />
                <label for="radio-choice-bb">Bluray</label>
              </fieldset>
            </li>
            <li data-role="fieldcontain">
              <input type="submit" value="Ajouter" />
            </li>
          </ul>
      </form>

<?php $contenu = ob_get_clean() ?>

<?php include 'vue/gabarit.php' ?>