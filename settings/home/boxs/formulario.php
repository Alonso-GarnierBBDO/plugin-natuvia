<?php
    add_meta_box(
        'form',
        'Formulario',
        function ($post) {


            $first_title = get_post_meta( $post->ID, 'title', true);
            $first_content = get_post_meta($post->ID, 'content-formulario', true);

            ?>
            
            <section class="first_section">
                <section class="section_content">
                    <label for="title">Add Title</label>
                    <br/>
                    <input type="text" name="title" id="title" value="<?= $first_title ?>" placeholder="Write here...">
                </section>
                <section class="section_content">
                    <label for="content">Add Content</label>
                    <br/>
                    <section class="editor">
                        <?php
                            wp_editor($first_content, 'content-formulario', array('textarea_name' => 'content-formulario'));
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
        'recetas_home_page',
        'advanced',
        'high'
    );