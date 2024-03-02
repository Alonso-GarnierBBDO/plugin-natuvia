<section class="ingredients_recetas">
    <section class="header_recetas">
        <section class="thumbnail">
            <?= $thumbnail ?>
        </section>
        <section class="content_header">
            <h1 title="<?= $title ?>"><?= $title ?></h1>
            <span class="porciones" title="<?= $porciones ?>"><?= $porciones ?></span>
            <hr>
            <h2>Ingredientes:</h2>
            <section class="content">
                <?= $ingredientes ?>
            </section>
        </section>
    </section>
    <section class="instructions">
        <section class="instructiont_title">
            <h2>INSTRUCCI0NES:</h2>
            <hr>
        </section>
        <section class="content">
            <?= $instrucciones ?>
        </section>
    </section>
</section>