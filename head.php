<div class="header-toolbar">
    <div class="header-toolbar-brand">
        <a href="<?php echo esc_url( home_url() );  ?>"> <?php bloginfo('name'); ?> </a>
    </div>

    <div class="header-toolbar-widgets">
        <?php dynamic_sidebar('header-toolbar-widgets'); ?>
    </div>
</div>

<header class="header">
    <div class="title">
        <?php bloginfo('name'); ?>
    </div>
    <div class="text">
        <?php bloginfo('description'); ?>
    </div>
</header>

<nav id="header-menu" class="header-menu" role="navigation">
    <?php
        wp_nav_menu(array( 'theme_location' => 'primary', 'depth' => 3 ));
    ?>
</nav>