<?php
    /**
     * Este es la seccion del header principal del home
     */

    $baseURL = plugin_dir_url(__DIR__);
    $resetPath = str_replace('templates/', '', $baseURL);


     // Obtenemos todas las recetas disponibles

     $recetas_arg = array(
        'post_type' => 'all_recetas',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
    );

    $all_recetas = new WP_Query($recetas_arg);

?>



<section class="recetas-header">

    <h1><div><?= $title ?></div></h1>
    <section class="content">
        <?= $content ?>
    </section>

    <section class="slider">
        <section class="content">

            <?php
                if ($all_recetas->have_posts()) {

                    while ($all_recetas->have_posts()) {
                        $all_recetas->the_post();

                        $id_dish = get_post_meta(get_the_ID(), 'dish', true);

                        $image_dish = implode('', array_map(function ($id) {
                            return wp_get_attachment_image($id, 'full');
                        }, explode(',', $id_dish)));

                        ?>

                            <a class="item" href="<?= get_permalink() ?>" title="Ingresar a <?= the_title() ?>">
                                <section class="image">
                                    <?php echo $image_dish ?>
                                </section>
                                <section class="information">
                                    <h3><?= the_title() ?></h3>
                                    <button>Ver receta completa</button>
                                </section>
                            </a>

                        <?php

            
                    }
                    
                }
            ?>

            
        </section>
        <section class="controls">
            <button title="Anterior" class="prev" disabled>
                <img src="<?= $resetPath . 'assets/img/arrow.svg';?>" alt="">
            </button>
            <button title="Siguiente" class="next">
                <img src="<?= $resetPath . 'assets/img/arrow.svg';?>" alt="">
            </button>
        </section>
    </section>


    <section class="content_mobile">
        <section class="content">
            <?php
                if ($all_recetas->have_posts()) {

                    while ($all_recetas->have_posts()) {
                        $all_recetas->the_post();

                        $id_dish = get_post_meta(get_the_ID(), 'dish', true);

                        $image_dish = implode('', array_map(function ($id) {
                            return wp_get_attachment_image($id, 'full');
                        }, explode(',', $id_dish)));

                        ?>

                            <a class="item" href="<?= get_permalink() ?>">
                                <section class="image">
                                    <?php echo $image_dish ?>
                                </section>
                                <section class="information">
                                    <h3><?= the_title() ?></h3>
                                    <button>Ver receta completa</button>
                                </section>
                            </a>

                        <?php

            
                    }
                    
                }
            ?>

        </section>
    </section>

</section>