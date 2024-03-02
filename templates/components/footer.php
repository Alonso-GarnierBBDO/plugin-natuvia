    </main>
    <footer class="footer_recetas">

        <?php

            $baseURL = plugin_dir_url(__DIR__);
            $resetPath = str_replace('templates/', '', $baseURL);
        
        ?>

        <section class="social">
            <a href="https://www.facebook.com/Natuviacr" target="_black">
                <img src="<?= $resetPath . 'assets/img/facebook.svg' ?>" alt="Ingresar al facebook">
            </a>
            <a href="https://www.instagram.com/natuviacr/" target="_black">
                <img src="<?= $resetPath . 'assets/img/instagram.svg' ?>" alt="Ingresar al instagram">
            </a>
            <a href="https://www.youtube.com/@natuvia8469" target="_black">
                <img src="<?= $resetPath . 'assets/img/youtube.svg' ?>" alt="Ingresar al YouTube">
            </a>
        </section>
        <section class="derechos">
            <a href="https://natuvia.co.cr/" target="_black">
                <img src="<?= $resetPath . 'assets/img/natuvia-logo.png' ?>" alt="Ingresar al YouTube">
            </a>
            <p>© 2024 NATUVIA. All rights reserved.</p>
        </section>

        <?php get_footer(); ?>
    </footer>
</body>
</html>