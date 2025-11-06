<?php
// Template Name: Home
?>

<?php
$diferenciais = [
    [
        'icon' => 'streamline-flex_customer-support-5.svg',
        'title' => 'Atendimento técnico eficiente',
        'desc' => 'Suporte especializado para resolver rápido as demandas da sua empresa, com orientação prática e precisa.',
    ],
    [
        'icon' => 'guidance_fire-hose.svg',
        'title' => 'Rastreabilidade Inteligente',
        'desc' => 'Cada mangueira possui número de lote gravado a laser, permitindo controle total, reposição imediata e precisa, sem desmontar o equipamento.',
    ],
    [
        'icon' => 'clarity_process-on-vm-line.svg',
        'title' => 'Processos organizados',
        'desc' => 'Fluxo de trabalho estruturado que garante agilidade e padronização em todos os atendimentos.',
    ],
    [
        'icon' => 'clarity_blocks-group-line.svg',
        'title' => 'Amplo estoque',
        'desc' => 'Variedade de mangueiras, conexões e acessórios sempre disponíveis para atender sua necessidade imediata.',
    ],
    [
        'icon' => 'material-symbols-light_precision-manufacturing-outline-rounded.svg',
        'title' => 'Equipamentos de ponta',
        'desc' => 'Tecnologia moderna que assegura alto desempenho e precisão em todas as soluções.',
    ],
];
?>

<?php get_header(); ?>

<main id="pg-home" role="main">
    <section class="main-carousel swiper" aria-label="Carrossel de destaque">
        <div class="swiper-wrapper">
            <?php
            $args = array(
                'post_type' => 'carrossel',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'order' => 'DESC',
            );
            $the_query = new WP_Query($args);

            if ($the_query->have_posts()):
                while ($the_query->have_posts()):
                    $the_query->the_post();

                    $link = get_field('link_da_imagem');
                    $img_desktop = get_field('imagem_-_desktop');
                    $img_mobile = get_field('imagem_-_mobile');
                    $title = get_the_title();

                    $alt_text = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
                    if (!$alt_text) {
                        $alt_text = $title;
                    }
                    ?>
                    <a class="swiper-slide" href="<?php echo esc_url($link); ?>" aria-label="<?php echo esc_attr($title); ?>">
                        <img class="dkp" src="<?php echo esc_url($img_desktop); ?>" alt="<?php echo esc_attr($alt_text); ?>"
                            loading="lazy" width="1200" height="auto">
                        <img class="mbl" src="<?php echo esc_url($img_mobile); ?>" alt="<?php echo esc_attr($alt_text); ?>"
                            loading="lazy" width="600" height="auto">
                    </a>
                <?php endwhile;
                wp_reset_postdata();
            else: ?>
                <p><?php _e('Desculpe, nenhum slide encontrado.', 'textdomain'); ?></p>
            <?php endif; ?>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </section>

    <section class="section-infos">
        <div class="infos-top">
            <p class="subtitle">Nossos diferenciais</p>
            <h2 class="title-section">O padrão Hidramang em cada conexão</h2>
        </div>

        <div class="swiper carousel-infos" aria-label="Carrossel de diferenciais">
            <div class="swiper-wrapper">
                <?php foreach ($diferenciais as $dif): ?>
                    <div class="swiper-slide">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/<?php echo esc_attr($dif['icon']); ?>"
                            alt="<?php echo esc_attr($dif['title']); ?>" loading="lazy" width="22" height="22">
                        <h3><?php echo esc_html($dif['title']); ?></h3>
                        <p><?php echo esc_html($dif['desc']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="swiper-btns">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </section>

    <section class="section-products container">
        <div class="products-top">
            <div>
                <p class="subtitle">Produtos</p>
                <h2 class="title-section">Linha completa de componentes para condução de fluídos</h2>
            </div>

            <a class="btn tertiary" href="#">
                <span>Solicite um orçamento</span>
            </a>
        </div>
        <div class="products-list">
            <?php
            $args_produtos = array(
                'post_type' => 'produtos',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'order' => 'DESC',
            );

            $loop_produtos = new WP_Query($args_produtos);

            if ($loop_produtos->have_posts()): ?>
                <div class="grid-products">
                    <?php while ($loop_produtos->have_posts()):
                        $loop_produtos->the_post();

                        $imagem_produto = get_field('imagem_do_produto');
                        $descricao_produto = get_field('descricao_do_produto');
                        $titulo = get_the_title();
                        ?>
                        <article class="product-card" data-title="<?php echo esc_attr($titulo); ?>"
                            data-desc="<?php echo wp_kses_post($descricao_produto); ?>"
                            data-img="<?php echo esc_url($imagem_produto['url']); ?>" tabindex="0" role="button"
                            aria-label="Ver detalhes de <?php echo esc_attr($titulo); ?>">
                            <?php if ($imagem_produto): ?>
                                <img src="<?php echo esc_url($imagem_produto['url']); ?>"
                                    alt="<?php echo esc_attr($imagem_produto['alt'] ?: $titulo); ?>" loading="lazy" width="300"
                                    height="300">
                            <?php endif; ?>

                            <h3><?php echo esc_html($titulo); ?></h3>
                        </article>
                    <?php endwhile; ?>
                </div>
                <?php wp_reset_postdata(); ?>
            <?php else: ?>
                <p><?php _e('Nenhum produto encontrado no momento.', 'textdomain'); ?></p>
            <?php endif; ?>
        </div>

        <div id="product-popup" class="product-popup" aria-hidden="true">
            <div class="popup-overlay"></div>
            <div class="popup-content">
                <button class="close-popup" aria-label="Fechar popup">&times;</button>
                <img id="popup-img" src="" alt="" loading="lazy">
                <div class="popup-infos">
                    <h3 id="popup-title"></h3>
                    <div id="popup-desc"></div>
                    <a id="popup-whats" class="btn tertiary" href="#" target="_blank" rel="noopener">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/ic_outline-whatsapp-white.svg"
                            alt="WhatsApp" loading="lazy" width="18" height="18">
                        <span>Solicite um orçamento</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="section-about">
        <div class="container">
            <div class="about-top">
                <p class="subtitle">Sobre nós</p>
                <h2 class="title-section">Referência em mangueiras hidráulicas, industriais, conexões e vedações.</h2>
            </div>

            <div class="about-main">
                <div class="about-img">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/sobre-nos.webp"
                        alt="Hidramang - Sobre nós" loading="lazy" width="543" height="387">
                </div>

                <div class="about-text">
                    <p>A Hidramang 85 é uma empresa especializada em componentes e foi criada em 2021, por profissionais
                        com mais de 40 anos de experiência no ramo de atuação. Estamos situados em Içara-SC em um ponto
                        estratégico para a logística de nossos produtos para todo o Brasil.</p>

                    <p>Somos especialistas no fornecimento de componentes essenciais para a condução de fluidos. Com
                        agilidade, oferecemos um vasto catálogo de <strong>mangueiras, vedações, conexões, adaptadores,
                            filtros
                            e acessórios</strong>, combinando a velocidade de um estoque estratégico com entrega
                        imediata, com a
                        flexibilidade de um fornecimento sob demanda.</p>

                    <p>Fazemos mais do que apenas fornecer produtos, buscamos continuamente pela excelência, trabalhando
                        com comprometimento e respeito com todos os envolvidos em nossos processos, clientes,
                        colaboradores, fornecedores e a sociedade em que vivemos.</p>
                    <a class="btn secondary" href="https://wa.me/554888660366" target="_blank" rel="noopener"
                        aria-label="Chamar no WhatsApp">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/ic_outline-whatsapp.svg"
                            alt="WhatsApp" loading="lazy" width="18" height="18">
                        <span>Fale conosco</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="section-contact container">
        <div>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/streamline-ultimate_headphones-customer-support-question.svg"
                alt="Fone de ouvido" loading="lazy" width="76" height="76">

            <div>
                <p class="subtitle">Dúvidas, sugestões, elogios e/ou reclamações? </p>
                <h2 class="title-section">Envie sua mensagem</h2>
            </div>
        </div>

        <a class="btn secondary" href="#" aria-label="Abrir formulário de contato">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/hugeicons_sent-02.svg" alt="Ícone de envio"
                loading="lazy" width="18" height="18">
            <span>Enviar mensagem</span>
        </a>

        <div id="contact-popup" class="product-popup" aria-hidden="true">
            <div class="popup-overlay"></div>
            <div class="popup-content">
                <button class="close-popup" aria-label="Fechar popup">&times;</button>
                <div class="popup-infos">
                    <?php echo do_shortcode('[contact-form-7 id="02a01cb" title="Formulário de Entre em contato"]'); ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>