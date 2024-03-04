<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Sincronizacion con redes sociales -->

    <!-- HTML Meta Tags -->
    <title><?= $title ?> | Natuvia</title>
    <meta name="description" content="<?= $excerpt ?>">

    <!-- Facebook Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= $title ?> | Natuvia">
    <meta property="og:description" content="<?= $excerpt ?>">
    <meta property="og:image" content="<?= $og_image ?>">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= $title ?> | Natuvia">
    <meta name="twitter:description" content="<?= $excerpt ?>">
    <meta name="twitter:image" content="<?= $og_image ?>">


    <?php wp_head() ?>
</head>
<body>
    <header>
        <?php get_header(); ?>
    </header>
    <main class="recetas-container">