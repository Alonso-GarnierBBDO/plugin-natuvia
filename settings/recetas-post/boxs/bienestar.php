<?php
    add_meta_box(
        'bienestar',
        'Bienestar',
        function ($post) {

            $bienestar = get_post_meta( $post->ID, 'bienestar-title', true);
            $bienestar_sub = get_post_meta( $post->ID, 'bienestar-sub-title', true);
            $bienestar_content = get_post_meta( $post->ID, 'beneficio_content', true);

            $image_bienestar_item = get_post_meta($post->ID, 'bienestar-image', true);
            $images_bienestar = implode('', array_map(function ($id) {
                return wp_get_attachment_image($id, 'full');
            }, explode(',', $image_bienestar_item)));



            ?>
            
            <section class="first_section">
                <section class="section_content">
                    <label for="bienestar-title">Add Title</label>
                    <br/>
                    <input type="text" name="bienestar-title" id="bienestar-title" value="<?= $bienestar ?>" placeholder="Write here...">
                </section>
                <section class="section_content">
                    <label for="bienestar-title">Add Sub Title</label>
                    <br/>
                    <input type="text" name="bienestar-sub-title" id="bienestar-sub-title" value="<?= $bienestar_sub ?>" placeholder="Write here...">
                </section>
                <section class="section_content">
                    <label for="content">Add Content</label>
                    <br/>
                    <section class="editor">
                        <?php
                            wp_editor($bienestar_content, 'beneficio_content', array('textarea_name' => 'beneficio_content'));
                        ?>
                    </section>
                </section>
                <section class="wp_image">
                    <label for="bienestar-image'">Add image</label>
                    <input type="hidden" class="image_url" id="bienestar-image" name="bienestar-image" value="<?php echo $image_bienestar_item; ?>"
                        data-target="field"/>

                    <p class="preview" data-target="history_preview">
                        <?php echo $images_bienestar ?>
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