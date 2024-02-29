<!-- Desde este archivo se manejan las animacion del las hojas -->

<?php
    $baseURL = plugin_dir_url(__DIR__);
    $resetPath = str_replace('templates/', '', $baseURL);
?>

<section class="leaves" transparent="<?= $resetPath . 'assets/img/hoja-transparent.svg'; ?>" green="<?= $resetPath . 'assets/img/hoja-verde.svg'; ?>"></section>