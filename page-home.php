<?php
// Template Name: Home
?>

<?php get_header(); ?>

<?php
function gabriella_show_products($args = [])
{
    $products_query = wc_get_products($args);
    if (empty($products_query)) {
        echo '<p>Nenhum produto encontrado.</p>';
        return;
    }
    $products_formatted = format_products($products_query);
    gabriella_product_list($products_formatted);
}
?>

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
        <div class="swiper-buttons">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </section>

    <section class="section-categories">
        <div class="container">
            <div class="categories-top">
                <div>
                    <p class="subtitle">Coleções</p>
                    <h2 class="title-section">Transforme espaços com experiências únicas.</h2>
                </div>

                <a class="btn" href="#">
                    <span>conheça todas</span>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/arrow-btn.svg" alt="icone arrow"
                        width="9" height="9">
                </a>
            </div>
        </div>

        <div class="cat-carousel-wrapper">
            <div class="cat-carousel swiper">
                <div class="swiper-wrapper">
                    <?php
                    $product_categories = get_terms([
                        'taxonomy' => 'product_cat',
                        'hide_empty' => false,
                    ]);

                    if (!empty($product_categories) && !is_wp_error($product_categories)):
                        foreach ($product_categories as $category):
                            $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                            $image_url = wp_get_attachment_url($thumbnail_id);
                            $image_url = $image_url ? $image_url : get_stylesheet_directory_uri() . '/img/default-category.webp';
                            ?>
                            <a class="swiper-slide" href="<?php echo get_term_link($category); ?>"
                                aria-label="<?php echo esc_attr($category->name); ?>">
                                <img class="img-slide" src="<?php echo esc_url($image_url); ?>"
                                    alt="<?php echo esc_attr($category->name); ?>" loading="lazy" width="400" height="400">
                            </a>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section class="section-about">
        <div class="container">
            <div class="about-top">
                <div class="about-left">
                    <p class="subtitle">Sobre nós</p>
                    <h2 class="title-section">Muito além do revestimento</h2>
                    <a class="btn secondary" href="#">
                        <span>conheça</span>
                    </a>
                </div>

                <div class="about-right">
                    <p>A Sense surge com espírito inovador e atual, desenvolvendo produtos que vão além das expectativas
                        e necessidades de nossos clientes.</p>
                    <p>Com um olhar para o futuro, a Sense busca incessante e incansavelmente desenvolver através de
                        pesquisas em Tecnologia e Design, seus produtos com altíssimo nível, aliando modernidade e
                        exclusividade.</p>
                </div>
            </div>

            <div class="about-img">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/sobre-nos.webp" alt="Sobre nós" width="1200"
                    height="421">
            </div>

            <div class="about-counter">
                <div class="story-counter">
                    <p>+ DE</p>
                    <p class="counter" data-target="5">0</p>
                    <p class="text">Anos de atuação</p>
                </div>

                <div class="story-counter">
                    <p>+ DE</p>
                    <p class="counter" data-target="13">0</p>
                    <p class="text">Coleções ativas</p>
                </div>

                <div class="story-counter">
                    <p>+ DE</p>
                    <p class="counter" data-target="500">0</p>
                    <p class="text">clientes</p>
                </div>

                <div class="story-counter">
                    <p>+ DE</p>
                    <p class="counter" data-target="106">0</p>
                    <p class="text">modelos</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-gallery container">
        <div>
            <p class="subtitle">inspire-se</p>
            <h2 class="title-section">Explore combinações e criações</h2>
            <div class="gallery-content">
                <div class="img">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/inspire-se-1.webp" alt="foto"
                        width="588" height="429">
                </div>
                <div class="img">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/inspire-se-2.webp" alt="foto"
                        width="588" height="429">
                </div>
            </div>
        </div>

        <div class="gallery-content">
            <div class="img">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/inspire-se-3.webp" alt="foto" width="588"
                    height="429">
            </div>
            <div class="img">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/inspire-se-4.webp" alt="foto" width="588"
                    height="429">
            </div>
        </div>
    </section>

    <section class="section-find container">
        <div>
            <p class="subtitle">onde encontrar</p>
            <h2 class="title-section">Encontre peças Sense mais perto de você !</h2>
        </div>

        <a class="btn secondary" href="#">
            <span>conheça todas</span>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/arrow-btn.svg" alt="icone arrow" width="9"
                height="9">
        </a>
    </section>

    <section class="section-blog container">
        <div class="blog-top">
            <div>
                <p class="subtitle">Blog</p>
                <h2 class="title-section">Novidades, inspirações e tudo o que move o universo da cerâmica</h2>
            </div>

            <a class="btn" href="#">
                <span>Ler todas</span>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/arrow-btn.svg" alt="icone arrow" width="9"
                    height="9">
            </a>
        </div>

        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 2,
        );
        $loop = new WP_Query($args);

        if ($loop->have_posts()):
            echo '<div class="blog-cards">';
            while ($loop->have_posts()):
                $loop->the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="blog-card">
                    <?php if (has_post_thumbnail()): ?>
                        <div class="blog-card-img">
                            <?php the_post_thumbnail('medium'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="blog-card-infos">
                        <div class="blog-card-top">
                            <?php
                            $categories = get_the_category();
                            if ($categories): ?>
                                <span class="blog-card-category"><?php echo esc_html($categories[0]->name); ?></span>
                            <?php endif; ?>

                            <?php if (get_field('data_do_post')): ?>
                                <span class="blog-card-date"><?php the_field('data_do_post'); ?></span>
                            <?php endif; ?>
                        </div>

                        <h3 class="blog-card-title"><?php the_title(); ?></h3>

                        <?php if (get_field('descricao_do_post')): ?>
                            <p class="blog-card-description"><?php the_field('descricao_do_post'); ?></p>
                        <?php endif; ?>

                        <p class="blog-card-btn">
                            <span>Leia mais</span>
                        </p>
                    </div>
                </a>
            <?php endwhile;
            echo '</div>';
            wp_reset_postdata();
        endif;
        ?>
    </section>

    <section class="section-social container">
        <div class="blog-top">
            <div>
                <p class="subtitle">instagram</p>
                <h2 class="title-section">@sensedecordesign</h2>
            </div>

            <a class="btn" href="#">
                <span>Seguir</span>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/arrow-btn.svg" alt="icone arrow" width="9"
                    height="9">
            </a>
        </div>
    </section>
</main>

<?php get_footer(); ?>