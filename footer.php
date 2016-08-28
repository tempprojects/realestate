    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-7 col-sm-7 col-xs-3 pull-right ">
                    <div class="copy"><?= the_field('copyright_text', 'option'); ?></div>
                    <a href="<?= home_url();?>" class="logo hidden-xs">
                        <?php if ( get_theme_mod( 'themeslug_logo' ) ) : ?>
                            <img src='<?php echo esc_url( get_theme_mod( 'themeslug_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
                        <?php endif; ?>  
                    </a>
                </div>

                <div class="col-lg-7 visible-lg pull-right navigation">
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

                <div class="col-lg-3 col-md-5 col-sm-5 col-xs-9 pull-right search">
                    <label for="foo_search"><input type="text" name=""  placeholder="Ads" id="foo_search" /></label>
                    <div class="social">
                        <a href="<?= the_field('google_plus', 'option'); ?>"><span class="icon-gp"></span></a>
                        <a href="<?= the_field('facebook_link', 'option'); ?>"><span class="icon-fb"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

<?php wp_footer(); ?>
</body>
</html>
