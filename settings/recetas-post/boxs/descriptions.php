<?php
    add_meta_box(
        'descriptions',
        'Descriptions',
        function ($post) {


            $porciones = get_post_meta( $post->ID, 'porciones', true);
            $ingredients = get_post_meta($post->ID, 'ingredients', true);

            ?>
            
            <section class="first_section">
                <section class="section_content">
                    <label for="porciones">Add Portions</label>
                    <br/>
                    <input type="text" name="porciones" id="porciones" value="<?= $porciones ?>" placeholder="Write here...">
                </section>
                <section class="section_content">
                    <label for="content">Add Ingredients</label>
                    <br/>
                    <section class="editor">
                        <?php
                            wp_editor($ingredients, 'ingredients', array('textarea_name' => 'ingredients'));
                        ?>
                    </section>
                </section>
            </section>


            <style>

                .first_section .section_content:first-of-type{
                    margin-top: 0px;
                }

                .first_section label{
                    font-weight: bold;
                }

                .first_section .section_content, 
                .wp_image{
                    margin-top: 10px;
                    display: block;
                }

                .first_section input{
                    margin-top: 10px;
                    width: 100%;
                }

                .first_section .editor{
                    margin-top: 10px;
                }


                .page-title-action{
                    display: none !important;
                }

            </style>

            <?php

        },
        'all_recetas',
        'advanced',
        'high'
    );