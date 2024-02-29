<?php
    add_meta_box(
        'dish',
        'Dish Image',
        function ($post) {

            $value = get_post_meta($post->ID, 'dish', true);


            $images = implode('', array_map(function ($id) {
                return wp_get_attachment_image($id, 'full');
            }, explode(',', $value)));



            ?>
            
            <section class="wp_image">
                <label for="dish">Add image dish</label>
                <input type="hidden" class="image_url" id="dish" name="dish" value="<?php echo $value; ?>"
                    data-target="field"/>

                <p class="preview" data-target="history_preview">
                    <?php echo $images ?>
                </p>
                <p class="control">
                    <button class="button upload_image" type="button" data-target="history_upload">Upload Images</button>
                    <button class="button reset_image" type="button" data-target="history_reset">Reset Images</button>
                </p>
            </section>

            <style>

                .preview{
                    max-height: 300px;
                    height: auto;
                    float: initial;
                }

                img{
                    max-height: 300px;
                    object-fit: contain;
                    width: 100%;
                }
            </style>

            <?php

        },
        'all_recetas',
        'advanced',
        'high'
    );