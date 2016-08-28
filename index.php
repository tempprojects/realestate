<?php
    global $post;
    $id_page = $post->ID;
?>
<?php get_header(); ?>
    <!-- header -->
    <!-- padding from header and content -->
    <div class="height_block"></div>
    <!-- padding from header and content -->

    <!-- video-baner -->
    <div class="video-baner">
        <video autoplay loop muted poster="" id="bg-video">
            <source src="<?= get_field('vigeo', $id_page)['url']?>" type="video/mp4"/>
        </video>
        <div class="how_we_work"><a href="<?= get_field('video_button_link', $id_page)?>"><?= get_field('video_button_text', $id_page)?></a></div>
    </div>
    <!-- video-baner -->

    <div class="estate">
        <div class="container">
            <div class="row">
            
                <div class="col-lg-5 col-lg-offset-2 col-md-6 col-md-offset-0 col-sm-6  col-lg-12 <?= get_field('right_section_icon', $id_page)?> pull-right">
                    <a href="<?= get_field('right_section_link', $id_page)?>">        
                        <i></i>
                        <?= get_field('right_section_title', $id_page)?>
                    </a>
                    <p>
                        <?= get_field('right_section_description', $id_page)?>
                    </p>

                    <span class="video">
                        <iframe src="<?= get_field('right_section_youtube_link', $id_page)?>" frameborder="0" allowfullscreen></iframe>
                    </span>
                </div>
        
                <div class="col-lg-5  col-md-6 col-sm-6 col-lg-12  <?= get_field('left_section_icon', $id_page)?>" >
                    <a href="#">
                        <i></i>
                        <?= get_field('left_section_title', $id_page)?>
                    </a>
                    <p>
                        <?= get_field('left_section_description', $id_page)?>
                    </p>
                    <span class="video">
                        <iframe src="<?= get_field('left_section_youtube_link', $id_page)?>" frameborder="0" allowfullscreen></iframe>
                    </span>
                </div>


            </div>
        </div>
    </div>
   
<?php get_footer(); ?>