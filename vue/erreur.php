<?php ob_start() ?>
        <div class='message error'>
          <i class='icon-exclamation-sign'></i>
          <p>Une erreur est survenue : <?php echo $msgErreur; ?></p>
        </div> 
<?php $contenu = ob_get_clean() ?>

<?php require 'vue/gabarit.php' ?>
