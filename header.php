<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
    <title>
        <?php if (is_front_page() || is_home()) {
            echo get_bloginfo('name');
        } else {
            echo wp_title('');
        } ?>
    </title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <script src="<?php echo get_template_directory_uri(); ?>/js/vue.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&family=Kumbh+Sans:wght@100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/swiper-bundle.min.css" />
    <?php wp_head(); ?>
</head>

<body>
    <div id="app">

        <?php
        $menu_items = [
            ['label' => 'Diferenciais', 'url' => '#'],
            ['label' => 'Produtos', 'url' => '#'],
            ['label' => 'Sobre nós', 'url' => '#'],
            ['label' => 'Depoimentos', 'url' => '#'],
        ];
        ?>

        <header id="header" role="banner">
            <div class="container">
                <div class="header-content">
                    <a href="/" class="header-logo" aria-label="Ir para a página inicial">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-hidramang.svg"
                            alt="Hidramang - Voltar para página inicial" loading="lazy" width="231" height="44">
                    </a>

                    <div class="menu-header" :class="{ active: activeMenu }" role="navigation"
                        aria-label="Menu principal">
                        <button class="btn-menu" @click="activeMenu = !activeMenu"
                            :aria-expanded="activeMenu ? 'true' : 'false'" aria-controls="menu"
                            aria-label="Abrir ou fechar menu de navegação">
                            <span></span>
                        </button>
                        <ul class="menu-list" id="menu">
                            <?php
                            foreach ($menu_items as $item) {
                                echo '<li>';
                                echo '<a class="item-list" href="' . esc_url($item['url']) . '" aria-label="' . esc_html($item['label']) . '">' . esc_html($item['label']) . '</a>';

                                if (!empty($item['submenu'])) {
                                    echo '<ul class="submenu">';
                                    foreach ($item['submenu'] as $sub) {
                                        echo '<li><a href="' . esc_url($sub['url']) . '" aria-label="' . esc_html($sub['label']) . '">' . esc_html($sub['label']) . '</a></li>';
                                    }
                                    echo '</ul>';
                                }

                                echo '</li>';
                            }
                            ?>
                            <li>
                                <a href="#" class="btn">
                                    <span>Entre em contato</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>