<?php ob_start() ?>
        <h3>Collect 0.3 (beta)</h3>
        <p>Application PHP/MySQL de gestion de collection DVD/Bluray (pour l'instant).</p>
        <p>Développée par seboss666 (<a href="https://twitter.com/Seboss666" target="_blank">@Seboss666</a>)</p>
        <p>Interface batie sur <a href="http://jquerymobile.com/" target="_blank">jQuery Mobile</a> (1.3.1).</p>
        <p>Thème nativeDroid by <a href="http://nativedroid.godesign.ch" target="_blank">Godesign.ch</a>.</p>
<?php $contenu = ob_get_clean() ?>

<?php require 'vue/gabarit.php' ?>