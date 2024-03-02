<?php
    add_meta_box(
        'information',
        'Information',
        function ($post) {

            $information = get_post_meta( $post->ID, 'information-title', true);

            $image_information_item = get_post_meta($post->ID, 'information-image', true);
            $images_information = implode('', array_map(function ($id) {
                return wp_get_attachment_image($id, 'full');
            }, explode(',', $image_information_item)));


            $image_information_mobile_item = get_post_meta($post->ID, 'information-image-mobile', true);
            $images_information_mobile = implode('', array_map(function ($id) {
                return wp_get_attachment_image($id, 'full');
            }, explode(',', $image_information_mobile_item)));



            ?>
            
            <section class="first_section">
                <section class="section_content">
                    <label for="information-title">Add Title</label>
                    <br/>
                    <input type="text" name="information-title" id="information-title" value="<?= $information ?>" placeholder="Write here...">
                </section>
                <section class="wp_image">
                    <label for="information-image'">Add image information</label>
                    <input type="hidden" class="image_url" id="information-image" name="information-image" value="<?php echo $image_information_item; ?>" data-target="field"/>
                    <p class="preview" data-target="history_preview">
                        <?php echo $images_information ?>
                    </p>
                    <p class="control">
                        <button class="button upload_image" type="button" data-target="history_upload">Upload Images</button>
                        <button class="button reset_image" type="button" data-target="history_reset">Reset Images</button>
                    </p>
                </section>
                <section class="wp_image">
                    <label for="information-image'">Add image information mobile</label>
                    <input type="hidden" class="image_url" id="information-image-mobile" name="information-image-mobile" value="<?php echo $image_information_mobile_item; ?>"
                        data-target="field"/>

                    <p class="preview" data-target="history_preview">
                        <?php echo $images_information_mobile ?>
                    </p>
                    <p class="control">
                        <button class="button upload_image" type="button" data-target="history_upload">Upload Images</button>
                        <button class="button reset_image" type="button" data-target="history_reset">Reset Images</button>
                    </p>
                </section>
            </section>

            <?php

        },
        'all_recetas',
        'advanced',
        'high'
    );