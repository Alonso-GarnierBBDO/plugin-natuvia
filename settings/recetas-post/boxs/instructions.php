<?php
    add_meta_box(
        'instructions',
        'Instructions',
        function ($post) {


            $porciones = get_post_meta( $post->ID, 'porciones', true);
            $instrucciones = get_post_meta($post->ID, 'instrucciones', true);

            ?>
            
            <section class="first_section">
                <section class="section_content">
                    <label for="content">Add Instructions</label>
                    <br/>
                    <section class="editor">
                        <?php
                            wp_editor($instrucciones, 'instrucciones', array('textarea_name' => 'instrucciones'));
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

                .first_section .section_content{
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