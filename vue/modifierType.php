<?php ob_start() ?>
      <form id="maj" action="index.php?action=updType" method="post">
          <input type="hidden" name="id" value="<?php echo $type['id_type']; ?>" />
          <ul data-role="listview" data-inset="true">
          
            <li data-role="fieldcontain">
              <h3>Type</h3>
              <input type="text" name="types" id="types" placeholder="Types" value="<?php echo $type['types']; ?>" />
            </li>
            <li data-role="fieldcontain">
              <input type="submit" value="Valider" />
            </li>
          </ul>
        </form>

<?php $contenu = ob_get_clean() ?>

<?php include 'vue/gabarit.php' ?>