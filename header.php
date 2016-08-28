<!DOCTYPE html>
<html lang="he">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right');?> <?php bloginfo('name');?></title>
    <meta property="og:title" content="<?php wp_title('|', true, 'right');?> <?php bloginfo('name');?>" />
    <?php wp_head(); ?>
</head>
<body >
    <!-- header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 pull-right">
                    <div class="menu_control">
                        תפריט
                        <div class="burger">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-4 pull-right logo">
                    <a href="<?= home_url();?>" >
                        <?php if ( get_theme_mod( 'themeslug_logo' ) ) : ?>
                            <img src='<?php echo esc_url( get_theme_mod( 'themeslug_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
                        <?php endif; ?>   
                    </a>
                </div>
                <div class="col-lg-1 col-md-2 col-sm-2 col-xs-4 pull-right">
                    <div class="date">18. 02. 2016</div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <nav>
                        <ul>
                            <li><a href="#">מחירון</a></li>
                            <li><a href="http://realestate.alscon-clients.com/posts/">בעל נכסים</a></li>
                            <li><a href="#">כיצד זה עובד</a></li>
                            <li><a href="#">שאלות ותשובות</a></li>
                            <li><a href="#">שרות ואחריות</a></li>
                            <li><a href="#">אודות</a></li>
                            <li><a href="<?= get_page_link(19); ?>">צור קשר</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>