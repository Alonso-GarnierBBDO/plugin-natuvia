<?php
    add_meta_box(
        'history',
        'History',
        function ($post) {


            $history = get_post_meta( $post->ID, 'history-title', true);

            $image_history = get_post_meta($post->ID, 'history-image', true);
            $images = implode('', array_map(function ($id) {
                return wp_get_attachment_image($id, 'full');
            }, explode(',', $image_history)));


            $image_history_mobile = get_post_meta($post->ID, 'history-image-mobile', true);
            $images_mobile = implode('', array_map(function ($id) {
                return wp_get_attachment_image($id, 'full');
            }, explode(',', $image_history_mobile)));


            ?>
            
            <section class="first_section">
                <section class="section_content">
                    <label for="history-title">Add Title</label>
                    <br/>
                    <input type="text" name="history-title" id="history-title" value="<?= $history ?>" placeholder="Write here...">
                </section>
                <section class="wp_image">
                    <label for="history-image'">Add image history</label>
                    <input type="hidden" class="image_url" id="history-image" name="history-image" value="<?php echo $image_history; ?>"
                        data-target="field"/>

                    <p class="preview" data-target="history_preview">
                        <?php echo $images ?>
                    </p>
                    <p class="control">
                        <button class="button upload_image" type="button" data-target="history_upload">Upload Images</button>
                        <button class="button reset_image" type="button" data-target="history_reset">Reset Images</button>
                    </p>
                </section>
                <section class="wp_image">
                    <label for="history-image'">Add image history mobile</label>
                    <input type="hidden" class="image_url" id="history-image-mobile" name="history-image-mobile" value="<?php echo $image_history_mobile; ?>"
                        data-target="field"/>

                    <p class="preview" data-target="history_preview">
                        <?php echo $images_mobile ?>
                    </p>
                    <p class="control">
                        <button class="button upload_image" type="button" data-target="history_upload">Upload Images</button>
                        <button class="button reset_image" type="button" data-target="history_reset">Reset Images</button>
                    </p>
                </section>
            </section>

            <style>
                .preview{
                    cursor: pointer;
                }
            </style>

            <?php

        },
        'all_recetas',
        'advanced',
        'high'
    );