
<section class="successfull_message">
    <section class="content">
        <button class="close">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
              <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
            </svg>
        </button>
        <h3>Gracias</h3>
        <div class="message">
            <p>Su comentario fue enviado con éxito. ¡Gracias por ser un Natucocinero!</p>
        </div>
        <div class="box_close">
            <button class="button_close">
                Cerrar
            </button>
        </div>
    </section>
</section>

<?php

    $args = array(
        'post_id' => get_the_ID(),
    );
    $comments = get_comments($args);
    $number = 0;
    $users = 0;
    $total = 0;

    foreach ($comments as $comment) {

        $comment_id = $comment->comment_ID;
        $reviewArray = get_comment_meta($comment_id, 'review');
        $reviewNumber = $reviewArray[0];

        $users += 1;
        $number += $reviewNumber;

    }

    if($users >= 1){
        $total = $number / $users;
    }

?>

<section class="comments">
    <section class="content">
        <h2><div>¡Dejá tu review! <br> Natucocinero</div></h2>
        <div id="respond" class="comment-respond">
            <form action="<?= site_url('/wp-comments-post.php') ?>" method="post" id="commentform" class="comment-form">
                <section class="full_name">
                    <p class="comment-form-author">
                        <input type="text" id="author" name="author" value="" size="30" maxlength="245" placeholder="Nombre" require/>
                    </p>
                    <p class="comment-form-last-name">
                        <input type="text" id="last_name" name="last_name" value="" size="30" maxlength="245" placeholder="Apellido" require/>
                    </p>
                </section>
                <p class="comment-form-email">
                    <input type="text" id="email" name="email" value="" size="30" maxlength="245" placeholder="Correo electrónico" require/>
                </p>
                <p class="comment-form-comment">
                    <textarea id="comment" name="comment" cols="45" rows="8" required="required" placeholder="Contanos ¿Cómo te fue con esta receta?" require></textarea>
                </p>
                <section class="all_cucharitas">
                    <section class="comment-form-review">
                        <label for="review">Marcá aquí cuántas cucharaditas le das a esta receta.</label>
                        <section class="cucharas">
                            <div>
                                <svg width="40" height="138" viewBox="0 0 40 138" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_23_297)">
                                        <path d="M29.0313 5.13425C31.9783 8.22533 33.9918 11.92 35.5787 15.8845C38.2056 22.437 39.6502 29.2456 39.388 36.3423C39.0902 44.4175 33.9296 51.5051 26.5199 54.2304C25.6887 54.5367 25.5109 54.9117 25.5509 55.7713C26.591 79.7181 27.6044 103.665 28.6134 127.612C28.8135 132.349 26.5154 135.952 22.5194 137.228C16.7321 139.08 11.0203 134.621 11.1937 128.288C11.3537 122.545 11.6559 116.807 11.9004 111.068C12.6872 92.558 13.4695 74.0435 14.2829 55.5336C14.3185 54.7654 14.0518 54.5047 13.4028 54.267C5.64193 51.3999 0.436888 44.0563 0.419108 35.5375C0.396883 26.2963 2.65047 17.622 7.34879 9.70228C9.0512 6.83068 11.1181 4.21515 13.9807 2.46384C19.1101 -0.677544 24.3774 0.296422 29.0313 5.13882V5.13425Z" fill="#AEDB68"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_23_297">
                                            <rect width="39" height="137" fill="white" transform="translate(0.418945 0.648193)"/>
                                        </clipPath>
                                    </defs>
                                </svg>

                            </div>
                            <div>
                                <svg width="40" height="138" viewBox="0 0 40 138" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_23_297)">
                                        <path d="M29.0313 5.13425C31.9783 8.22533 33.9918 11.92 35.5787 15.8845C38.2056 22.437 39.6502 29.2456 39.388 36.3423C39.0902 44.4175 33.9296 51.5051 26.5199 54.2304C25.6887 54.5367 25.5109 54.9117 25.5509 55.7713C26.591 79.7181 27.6044 103.665 28.6134 127.612C28.8135 132.349 26.5154 135.952 22.5194 137.228C16.7321 139.08 11.0203 134.621 11.1937 128.288C11.3537 122.545 11.6559 116.807 11.9004 111.068C12.6872 92.558 13.4695 74.0435 14.2829 55.5336C14.3185 54.7654 14.0518 54.5047 13.4028 54.267C5.64193 51.3999 0.436888 44.0563 0.419108 35.5375C0.396883 26.2963 2.65047 17.622 7.34879 9.70228C9.0512 6.83068 11.1181 4.21515 13.9807 2.46384C19.1101 -0.677544 24.3774 0.296422 29.0313 5.13882V5.13425Z" fill="#AEDB68"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_23_297">
                                            <rect width="39" height="137" fill="white" transform="translate(0.418945 0.648193)"/>
                                        </clipPath>
                                    </defs>
                                </svg>

                            </div>
                            <div>
                                <svg width="40" height="138" viewBox="0 0 40 138" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_23_297)">
                                        <path d="M29.0313 5.13425C31.9783 8.22533 33.9918 11.92 35.5787 15.8845C38.2056 22.437 39.6502 29.2456 39.388 36.3423C39.0902 44.4175 33.9296 51.5051 26.5199 54.2304C25.6887 54.5367 25.5109 54.9117 25.5509 55.7713C26.591 79.7181 27.6044 103.665 28.6134 127.612C28.8135 132.349 26.5154 135.952 22.5194 137.228C16.7321 139.08 11.0203 134.621 11.1937 128.288C11.3537 122.545 11.6559 116.807 11.9004 111.068C12.6872 92.558 13.4695 74.0435 14.2829 55.5336C14.3185 54.7654 14.0518 54.5047 13.4028 54.267C5.64193 51.3999 0.436888 44.0563 0.419108 35.5375C0.396883 26.2963 2.65047 17.622 7.34879 9.70228C9.0512 6.83068 11.1181 4.21515 13.9807 2.46384C19.1101 -0.677544 24.3774 0.296422 29.0313 5.13882V5.13425Z" fill="#AEDB68"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_23_297">
                                            <rect width="39" height="137" fill="white" transform="translate(0.418945 0.648193)"/>
                                        </clipPath>
                                    </defs>
                                </svg>

                            </div>
                            <div>
                                <svg width="40" height="138" viewBox="0 0 40 138" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_23_297)">
                                        <path d="M29.0313 5.13425C31.9783 8.22533 33.9918 11.92 35.5787 15.8845C38.2056 22.437 39.6502 29.2456 39.388 36.3423C39.0902 44.4175 33.9296 51.5051 26.5199 54.2304C25.6887 54.5367 25.5109 54.9117 25.5509 55.7713C26.591 79.7181 27.6044 103.665 28.6134 127.612C28.8135 132.349 26.5154 135.952 22.5194 137.228C16.7321 139.08 11.0203 134.621 11.1937 128.288C11.3537 122.545 11.6559 116.807 11.9004 111.068C12.6872 92.558 13.4695 74.0435 14.2829 55.5336C14.3185 54.7654 14.0518 54.5047 13.4028 54.267C5.64193 51.3999 0.436888 44.0563 0.419108 35.5375C0.396883 26.2963 2.65047 17.622 7.34879 9.70228C9.0512 6.83068 11.1181 4.21515 13.9807 2.46384C19.1101 -0.677544 24.3774 0.296422 29.0313 5.13882V5.13425Z" fill="#AEDB68"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_23_297">
                                            <rect width="39" height="137" fill="white" transform="translate(0.418945 0.648193)"/>
                                        </clipPath>
                                    </defs>
                                </svg>

                            </div>
                            <div>
                                <svg width="40" height="138" viewBox="0 0 40 138" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_23_297)">
                                        <path d="M29.0313 5.13425C31.9783 8.22533 33.9918 11.92 35.5787 15.8845C38.2056 22.437 39.6502 29.2456 39.388 36.3423C39.0902 44.4175 33.9296 51.5051 26.5199 54.2304C25.6887 54.5367 25.5109 54.9117 25.5509 55.7713C26.591 79.7181 27.6044 103.665 28.6134 127.612C28.8135 132.349 26.5154 135.952 22.5194 137.228C16.7321 139.08 11.0203 134.621 11.1937 128.288C11.3537 122.545 11.6559 116.807 11.9004 111.068C12.6872 92.558 13.4695 74.0435 14.2829 55.5336C14.3185 54.7654 14.0518 54.5047 13.4028 54.267C5.64193 51.3999 0.436888 44.0563 0.419108 35.5375C0.396883 26.2963 2.65047 17.622 7.34879 9.70228C9.0512 6.83068 11.1181 4.21515 13.9807 2.46384C19.1101 -0.677544 24.3774 0.296422 29.0313 5.13882V5.13425Z" fill="#AEDB68"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_23_297">
                                            <rect width="39" height="137" fill="white" transform="translate(0.418945 0.648193)"/>
                                        </clipPath>
                                    </defs>
                                </svg>

                            </div>
                        </section>
                        <input type="number" name="review" id="review" min="0" max="5" value="0">
                    </section>
                    <section class="column">
                            <!-- Agregar más campos según sea necesario -->
                        <p class="form-submit">
                            <input name="submit" type="submit" id="submit" class="submit" value="Enviar" />
                            <input type='hidden' name='comment_post_ID' value='<?= get_the_ID() ?>' id='comment_post_ID' />
                            <input type='hidden' name='comment_parent' id='comment_parent' value='0' />
                        </p>
                        <section class="show_review">
                            <svg width="40" height="138" viewBox="0 0 40 138" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_23_297)">
                                    <path d="M29.0313 5.13425C31.9783 8.22533 33.9918 11.92 35.5787 15.8845C38.2056 22.437 39.6502 29.2456 39.388 36.3423C39.0902 44.4175 33.9296 51.5051 26.5199 54.2304C25.6887 54.5367 25.5109 54.9117 25.5509 55.7713C26.591 79.7181 27.6044 103.665 28.6134 127.612C28.8135 132.349 26.5154 135.952 22.5194 137.228C16.7321 139.08 11.0203 134.621 11.1937 128.288C11.3537 122.545 11.6559 116.807 11.9004 111.068C12.6872 92.558 13.4695 74.0435 14.2829 55.5336C14.3185 54.7654 14.0518 54.5047 13.4028 54.267C5.64193 51.3999 0.436888 44.0563 0.419108 35.5375C0.396883 26.2963 2.65047 17.622 7.34879 9.70228C9.0512 6.83068 11.1181 4.21515 13.9807 2.46384C19.1101 -0.677544 24.3774 0.296422 29.0313 5.13882V5.13425Z" fill="#AEDB68"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_23_297">
                                        <rect width="39" height="137" fill="white" transform="translate(0.418945 0.648193)"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            <section class="number">
                                <?php
                                    if($total >= 1){
                                        echo number_format($total, 1);
                                    }else{
                                        echo '4.5';
                                    }
                                ?>
                            </section>
                        </section>
                    </section>
                </section>
            </form>
        </div>
    </section>
</section>
