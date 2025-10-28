<footer id="footer">
    <div class="footer-top">
        <h2 class="title-section">
            Consulte nossa linha de<br>
            mangueiras hidráulicas<br>
            e conexões
        </h2>
        <p>Entre em contato e solicite mais informações sobre os produtos que sua empresa precisa.</p>
        <a href="#" class="btn" aria-label="Solicitar orçamento pelo WhatsApp">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/whats-btn.svg" alt="Ícone WhatsApp" width="15"
                height="15">
            <span>Solicite um orçamento</span>
        </a>
    </div>

    <div class="footer-main container">
        <div class="footer-infos">
            <a href="/" class="header-logo" aria-label="Ir para a página inicial da Hidramang">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-hidramang.svg"
                    alt="Hidramang - especialistas em mangueiras hidráulicas" loading="lazy" width="231" height="44">
            </a>
            <p>Especialistas em mangueiras e vedações desde 2021, por profissionais com mais de 40 anos de experiência
                no ramo de atuação.</p>

            <div class="footer-social" role="navigation" aria-label="Redes sociais da Hidramang">
                <a href="/" target="_blank" rel="noopener" aria-label="Instagram da Hidramang">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/insta-btn.svg" alt="Instagram"
                        loading="lazy" width="24" height="24">
                </a>

                <a href="/" target="_blank" rel="noopener" aria-label="Facebook da Hidramang">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/face-btn.svg" alt="Facebook"
                        loading="lazy" width="24" height="24">
                </a>
            </div>
        </div>

        <div class="footer-btns">
            <address>
                <a href="https://www.google.com/maps/search/?api=1&query=R.+Jo%C3%A3o+Zaccaron,+879,+I%C3%A7ara,+SC"
                    target="_blank" rel="noopener" aria-label="Ver endereço no Google Maps">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/local-btn.svg" alt="Localização"
                        loading="lazy" width="24" height="24">
                    <p>R. João Zaccaron, 879, Bairro Raichaski, Içara/SC, 88822-038</p>
                </a>
            </address>

            <a href="mailto:contato@hidramang85.com.br" aria-label="Enviar e-mail para Hidramang">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/email-btn.svg" alt="E-mail" loading="lazy"
                    width="24" height="24">
                <p>contato@hidramang85.com.br</p>
            </a>

            <a href="https://wa.me/554888660366" target="_blank" rel="noopener" aria-label="Chamar no WhatsApp">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/whats-btn.svg" alt="WhatsApp"
                    loading="lazy" width="24" height="24">
                <p>(48) 9 8866 0366</p>
            </a>
        </div>
    </div>

    <div class="footer-bottom container">
        <p>&copy; Hidramang 85. Todos os direitos reservados.</p>
        <p>Desenvolvido por <a href="#" target="_blank" rel="noopener">Blume Web Studio</a></p>
    </div>
</footer>

<a href="https://wa.me/5548999999999" class="whatsapp-float" target="_blank" aria-label="Fale conosco no WhatsApp">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/whatsapp-float.svg" alt="WhatsApp" width="60"
        height="60">
</a>

<div id="popup-imagem" class="popup">
    <div class="popup-conteudo">
        <span class="fechar">&times;</span>
        <img src="" alt="Imagem ampliada" id="imagem-popup">
    </div>
</div>

<script>
    const app = new Vue({
        el: '#app',
        data: {
            activeMenu: false,
        },
        created() { },
        methods: {}
    });
</script>

</div>
<script src="<?php echo get_template_directory_uri(); ?>/js/swiper-bundle.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/slider.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/popup.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/toggle.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/quantity.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/counter-story.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/success-form.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/summary.js"></script>

<?php wp_footer(); ?>
</body>

</html>