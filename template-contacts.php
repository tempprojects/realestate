<?php
/*
 *Template Name: Contact page template
 */
?>
<?php get_header(); ?>



    <!-- padding from header and content -->
    <div class="height_block"></div>
    <!-- padding from header and content -->


    <!-- video-baner -->
    <div class="contact-baner" style="background-image: url(' <?= get_field('header_banner')['url']; ?>')">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="title">   
                        <?= get_field('header_text'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- video-baner -->

    <!-- contact_content -->
    <div class="contact_content">
        <div class="container">
        
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12 pull-right">
                    <!-- right-side -->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 right-side pull-right">
                        <div class="row">
                            <div class="title"><?= get_field('right_section_title'); ?></div>
                            <ul>
                            <?php  
                                if( have_rows( 'Right_section_list' ) ) :
                                    while( have_rows( 'Right_section_list' ) ): the_row(); ?>
                                        <li class='<?= get_sub_field( 'icon' )?>'>
                                            <?= get_sub_field( 'description') ?>
                                        </li>
                                <?php endwhile; endif; ?>

                            </ul>
                        </div>
                    </div>
                    <!-- right-side -->

                    <!-- middle-side -->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 middle-side ">
                        <div class="row">
                            <div class="title"><?= get_field('left_section_title'); ?></div>
                            <ul>
                                <?php  
                                if( have_rows( 'left_section_list' ) ) :
                                    while( have_rows( 'left_section_list' ) ): the_row(); 
                                ?>
                                <li class='<?= get_sub_field( 'icon' )?>'>
                                   <?= get_sub_field( 'description') ?>
                                </li>
                            <?php endwhile; endif; ?>
                            </ul>
                        </div>
                    </div>
                    <!-- middle-side -->
                    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p class='comming'><?= get_field('subtitle') ?></p>
                    </div>
                </div>

                <!-- left-side -->
                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 left-side ">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-12">
                            <?= do_shortcode('[contact-form-7 id="4" title="Contact form 1" html_class="form_cont"]') ?>
                        </div>
                        <div class="col-lg-12 col-md-6 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-12">
                            <div id="contact_map">

                            </div>
                        </div>
                    </div>
                </div>
                <!-- left-side -->
            </div>
        </div>
    </div>
    <!-- contact_content -->


<?php get_footer(); ?>