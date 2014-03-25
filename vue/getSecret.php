<?php ob_start() ?>
<form id="Secret" action="index.php?action=putSecret" method="post">
  <input type="hidden" name="origine" value="<?php $redirect_to=!empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php'; echo $redirect_to; ?>" />
  <input type="password" name="password" id="password" placeholder="Password" />
  <input type="submit" value="Login" />
</form>

<?php $contenu = ob_get_clean() ?>

<?php include 'vue/gabarit.php' ?>