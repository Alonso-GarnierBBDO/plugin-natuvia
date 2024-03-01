<?php
    $baseURL = plugin_dir_url(__DIR__);
    $resetPath = str_replace('templates/', '', $baseURL);
?>

<section class="contact-home">
    <h2><?= $title_contact ?></h2>
    <section class="all">
        <section class="information">
            <section class="video">
                <?php
                    $video_shortcode = wp_video_shortcode(array('src' => $video));
                    // Imprime el shortcode
                    echo $video_shortcode;
                ?>
            </section>
            <section class="text">
                <?= $text_content ?>
            </section>
        </section>
        <section class="widget">
            <section class="widget_content">
                <section class="header">
                    <img src="<?= $resetPath . 'assets/img/natuvia-logo.png' ?>" alt="">
                    <h4>¡Registrate aquí!</h4>
                </section>
                <section class="contact">
                    <?php
                        if ( is_active_sidebar( 'form_area' ) ) {
                            dynamic_sidebar( 'form_area' );
                        }                    
                    ?>
                </section>
            </section>
        </section>
    </section>
</section>