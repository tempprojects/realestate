<!-- padding from header and content -->
    <div class="height_block"></div>
    <!-- padding from header and content -->
    <section class="wrapper list-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h4>חיפוש</h4>
                    <?php get_template_part('searchform'); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- start list content -->
    <section class="wrapper list-page">
        <div class="container">

            <?php 
                $ids=[];
                if ( have_posts() ) : while ( have_posts() ) : the_post();
                                $thePostID=get_the_ID();  
                                $ids[]=$thePostID;
                                $post_images = get_post_meta($id, 'post_images', true);
                                
                if(isJson($post_images)){
                    $post_images_encode=json_decode($post_images, true);
                }
                else{
                    $post_images_encode="";
                } 
            ?>
                    
            <div class="row main-item">
                <div class="content-item">
                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 pull-right">
                        <h3><a href="<?= get_the_permalink()?>"><?= get_the_title() ?></h3></a></h3>
                        <ul class="description">
                            <li class="active"><i class="icon-building"></i><?= get_post_meta($thePostID, "apartment_size",true) ?> <span>מ"ר </span> </li>
                            <li class="active"><i class="icon-plan"></i> <?= get_post_meta($thePostID, "rooms_quantity",true) ?></li>
                            <li class="<?= get_post_meta($thePostID, "elevator",true)=="כן"?"active":""?>"><i class="icon-elevator"></i></li>
                            <li class="<?= get_post_meta($thePostID, "sun_balcony",true)!="אין"?"active":""?>"><i class="icon-sun"></i></li>
                            <li class="<?= get_post_meta($thePostID, "air",true)!="אין"?"active":""?>"><i class="icon-condition"></i></li>
                        </ul>
                        <hr class="sline">
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 pull-left">
                        <!--Gallery slider-->
                        <div class="slider">
                            <div class="gall_in">
                                <?php
                                    $first_img=""; 
                                    if($post_images_encode): 
                                        foreach($post_images_encode as $img): if($img):?>
                                            <div class="item slider"><img src="<?= $img ?>" alt=""></div>
                                <?php
                                    if(!$first_img){
                                        $first_img=$img;
                                    } 
                                    endif; endforeach; endif; 
                                ?>
                            </div>
                           <!--  <h5 class="block">הושכר</h5> -->
                            <div class="thumbGall">
                                <?php if($post_images_encode): 
                                        foreach($post_images_encode as $img): if($img):?>
                                            <div class="thumb"><img src="<?= $img ?>" alt=""></div>
                                <?php endif; endforeach; endif; ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="announcements">
                            <div class="data">
                                <p>תאריך כניסה: <span><?= get_the_date('d.m.Y')?></span></p>
                            </div>
                            <div class="file">
                                <a href="#"><i class="icon-pdf"></i>להורדת החוזה</a>
                            </div>
                        </div>
                        <div class = "gmap" id="map<?= $thePostID ?>"></div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 pull-right">

                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 pull-left">
                            <div class="row mr">
                                <div class="list-content">
                                    <p class="title clear">מידע כללי</p>''
                                    <ul class="lists">
                                        <li>מספר חדרים<span>: <?= get_post_meta($thePostID, "rooms_quantity",true) ?></span></li>
                                        <li>שטח<span>: <?= get_post_meta($thePostID, "apartment_size",true) ?> מ"ר</span></li>
                                        <li>קומה<span>: <?= get_post_meta($thePostID, "floor",true) ?></span></li>
                                        <li>מעלית<span>: <?= get_post_meta($thePostID, "elevator",true) ?></span></li>
                                        <li>מיזוג<span>: <?= get_post_meta($thePostID, "air",true) ?></span></li>
                                        <li>מרפסת שמש<span>: <?= get_post_meta($thePostID, "sun_balcony",true) ?></span></li>
                                        <li>חניה<span>: 
                                            <?= get_post_meta($thePostID, "parking",true) ?>
                                        </span></li>
                                        <li>כיווני אוויר<span>:  <?php 
                                                $j=0;
                                                for ($i=0; $i < 10; $i++) { 
                                                    if(get_post_meta($thePostID, "wind_directions[" . $i . "]")[0] && get_post_meta($thePostID, "wind_directions[" . $i . "]")[0]!=" "){
                                                        echo $j?", ":" ";
                                                        echo get_post_meta($thePostID, "wind_directions[" . $i . "]")[0];
                                                        $j++;
                                                    }
                                                }
                                        ?>
                                    </span></li>
                                    </ul>
                                </div>
                                <div class="duration">
                                    <p class="title">בחר תקופה</p>
                                    <label for="select_perio" class="selects">
                                        <select name="select_perio" class="select_period">
                                        <?php 
                                            if(get_post_meta($thePostID, "period[0]", true)){
                                                echo   '<option value="' . get_post_meta($thePostID, "period_price[0]", true) .  '">0.5 - 2</option>'; 
                                            }elseif(get_post_meta($thePostID, "period[1]", true)) {
                                                echo   '<option value="' . get_post_meta($thePostID, "period_price[1]", true) .  '">0.5 - 2</option>'; 
                                            }elseif(get_post_meta($thePostID, "period[2]", true)) {
                                                echo   '<option value="' . get_post_meta($thePostID, "period_price[2]", true) .  '">0.5 - 2</option>'; 
                                            }elseif(get_post_meta($thePostID, "period[3]", true)) {
                                                echo   '<option value="' . get_post_meta($thePostID, "period_price[3]", true) .  '">0.5 - 2</option>'; 
                                            } 

                                            if(get_post_meta($thePostID, "period[1]", true)){
                                                echo   '<option value="' . get_post_meta($thePostID, "period_price[1]", true) .  '">2.5 - 4</option>'; 
                                                
                                            }elseif(get_post_meta($thePostID, "period[0]", true)) {
                                                echo   '<option value="' . get_post_meta($thePostID, "period_price[0]", true) .  '">2.5 - 4</option>'; 
                                                
                                            }elseif(get_post_meta($thePostID, "period[2]", true)) {
                                                echo   '<option value="' . get_post_meta($thePostID, "period_price[2]", true) .  '">2.5 - 4</option>'; 
                                            }
                                            elseif(get_post_meta($thePostID, "period[3]", true)) {
                                                echo   '<option value="' . get_post_meta($thePostID, "period_price[3]", true) .  '">2.5 - 4</option>'; 
                                            }

                                            if(get_post_meta($thePostID, "period[2]", true)){
                                                echo   '<option value="' . get_post_meta($thePostID, "period_price[2]", true) .  '">4.5 - 5.5</option>'; 
                                                
                                            }elseif(get_post_meta($thePostID, "period[1]", true)) {
                                                echo   '<option value="' . get_post_meta($thePostID, "period_price[1]", true) .  '">4.5 - 5.5</option>'; 
                                                
                                            }elseif(get_post_meta($thePostID, "period[0]", true)) {
                                                echo   '<option value="' . get_post_meta($thePostID, "period_price[0]", true) .  '">4.5 - 5.5</option>'; 
                                            }
                                            elseif(get_post_meta($thePostID, "period[3]", true)) {
                                                echo   '<option value="' . get_post_meta($thePostID, "period_price[3]", true) .  '">4.5 - 5.5</option>'; 
                                            }

                                            if(get_post_meta($thePostID, "period[3]", true)){
                                                echo   '<option value="' . get_post_meta($thePostID, "period_price[3]", true) .  '">5.5 - 7</option>'; 
                                                
                                            }elseif(get_post_meta($thePostID, "period[2]", true)) {
                                                echo   '<option value="' . get_post_meta($thePostID, "period_price[2]", true) .  '">5.5 - 7</option>'; 
                                                
                                            }elseif(get_post_meta($thePostID, "period[1]", true)) {
                                                echo   '<option value="' . get_post_meta($thePostID, "period_price[1]", true) .  '">5.5 - 7</option>'; 
                                            }
                                            elseif(get_post_meta($thePostID, "period[0]", true)) {
                                                echo   '<option value="' . get_post_meta($thePostID, "period_price[0]", true) .  '">5.5 - 7</option>'; 
                                            }
                                        ?>
                                        </select>
                                    </label>
                                    <p class="final_price"><span>5400</span> שייה</p>
                                    <div class="additional-cost">
                                        <a href="#" class="button">See additional cost</a>
                                        <ul>
                                            <li>ארנונה: <span><?= get_post_meta($thePostID, "property_tax", true) ? get_post_meta($thePostID, "property_tax", true) : get_post_meta($thePostID, "property_tax_price", true) ?></span></li>
                                            <li>ועד בית: <span><?= get_post_meta($thePostID, "building_comission", true) ? get_post_meta($thePostID, "building_comission", true) : get_post_meta($thePostID, "building_comission_price", true) ?></span></li>
                                            <li>ביטוח: <span><?= get_post_meta($thePostID, "insurance", true) ? get_post_meta($thePostID, "insurance", true) : get_post_meta($thePostID, "insurance_price", true) ?></span></li>
                                        </ul>
                                    </div>

                                </div>
                                <div class="clearfix"></div>
                                <p class="title clear">בחר תקופה</p>
                                <p class="text">  <?=  get_the_custom_excerpt(get_post_meta(get_the_ID(), "desc_apartment", true), 300)?></p>
                                <p class="title clear">סיכום פרטי החוזה</p>
                                <p class="text">  <?=  get_the_custom_excerpt(get_post_meta(get_the_ID(), "contract_detail", true), 300)?></p>
                            </div>
                        </div>
                        <?php $user_id=get_the_author_id()?>
                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 pull-right ">
                            <div class="row">
                                <ul class="share">
                                    <li><a href="#" class="mail_modal" data-urer="<?= $user_id ?>" data-permalink="<?= get_the_permalink($thePostID) ?>" ><i class="icon-mail"></i></a></li>
                                    <li><a href="http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo urlencode(get_the_title( $thePostID) . ' | ' . get_bloginfo('name'));?>&amp;p[summary]=<?php echo urlencode(get_the_custom_excerpt(get_post_meta(get_the_ID(), 'desc_apartment', true), 300)) ?>&amp;p[url]=<?php echo urlencode(get_the_permalink()); ?>&amp;p[images][0]=<?php echo urlencode($first_img);?>" target="_blank">Share<i class="icon-fb"></i></a></li>
                                    <li><a href="<?= get_post_meta($thePostID, "facebook_event",true)?get_post_meta($thePostID, "facebook_event",true):"#" ?>">Event<i class="icon-fb"></i></a></li>
                                </ul>
                                <div class="content-description">
                               
                                    <p class="title">פרטי הסוכן</p>
                                    <ul class="tel">
                                        <li><a href="#"><i class="icon-user"></i>הסוכן: <?php the_author_firstname(); ?> <?php the_author_lastname(); ?></a></li>
                                        <li><a href="#"><i class="icon-mobile"></i>  נייד: <span><?= get_field('agents_phone_1', 'user_' . $user_id); ?></span></a></li>
                                        <li><a href="#"><i class="icon-officephone"></i> משרד:<span> <?= get_field('agents_office_phone', 'user_' . $user_id); ?></span></a></li>
                                    </ul>
                                </div>
                                <div class="content-description">
                                    <p class="title">איטליה</p>
                                    <div class="datepicker">
                                    <!-- <div class="block"><h5>למכסים נוספים צור קשר</h5></div> -->
                                    
                                    </div>
                            
                                </div>
                                <a href="<?= get_permalink()?>" class="button sitebar">דירה <span> #12546</span> למידע נוסף<i class="icon-arrow"></i></a>
                            </div>  
                        </div>

                    </div>
                </div>
            </div>
        <hr class="sline mt-mb">
    <?php endwhile; endif; ?> 
    <div class="pgination">
        <?php 
            $args = array(
                'base'               => '%_%',
                'format'             => '?paged=%#%',
                'total'              => 1,
                'current'            => 0,
                'show_all'           => false,
                'end_size'           => 1,
                'mid_size'           => 2,
                'prev_next'          => true,
                'prev_text'          => __('<'),
                'next_text'          => __('>'),
                'type'               => 'plain',
                'add_args'           => false,
                'add_fragment'       => '',
                'before_page_number' => '',
                'after_page_number'  => ''
            );
            echo paginate_links( $args ); 
        ?>
    </div>
        </div>
    </section>

 <?php get_template_part('template_part_mailmodal'); ?>
 
    <script>
        
        jQuery(document).ready(function($){
           
            
            google.maps.event.addDomListener(window, 'load', initMaps);

            function initMaps() {
                var styleMap = [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"administrative.country","elementType":"geometry.fill","stylers":[{"visibility":"on"}]},{"featureType":"administrative.province","elementType":"labels.icon","stylers":[{"hue":"#ff0000"},{"visibility":"on"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#46bcec"},{"visibility":"on"}]}];

                    <?php   
                        foreach ($ids as $value): 
                            $map_lat     =   get_post_meta($value, 'map_lat', true);
                            $map_lng     =   get_post_meta($value, 'map_lng', true);
                            $map_address =   get_post_meta($value, 'map_address', true);
                    ?>

                    var mapLatlng<?=  $value ?> = {lat: <?= $map_lat?$map_lat:'32.037140'?>, lng:<?= $map_lng?$map_lng:"34.835411" ?>};
                    mapOptions<?=  $value ?> = {
                        zoom: 11,   
                        center: mapLatlng<?=  $value ?>, 
                        styles: styleMap,
                        title:  '<?= $map_address ?>'
                    };

                    var mapElement<?= $value ?> = document.getElementById('map<?= $value ?>');
                    var map<?= $value ?> = new google.maps.Map(mapElement<?= $value ?>, mapOptions<?= $value ?>);
                    var marker<?= $value ?> = new google.maps.Marker({
                        position: mapLatlng<?= $value ?>,
                        map: map<?= $value ?>,
                        title: "<?= $map_address ?>",
                        icon: directory_uri.stylesheet_directory_uri + '/img/geol.png'
                    });
                <?php endforeach; ?>
            }


            //code for clacularor of the discount
            var base_price=[];
            $(".main-item").each(function(){
                $(this).find(".final_price span").html($(this).find(".select_period").val());
                $(this).find(".final_price span").html($(this).find(".select_period").val());
                base_price[$(this).index()]=$(this).find(".select_period").val();
            });

            $(".select_period").change(function(event){
                var current_object=$(this).parents(".main-item").index();
                if($(this).val()==base_price[current_object]){
                    $(this).parents(".main-item").find(".final_price span").html($(this).val());
                }
                else{
                     $(this).parents(".main-item").find(".final_price span").html($(this).val() + ' <span style="color:red">(' +  (100-((parseInt($(this).val())/parseInt(base_price[current_object]))*100)) + '% -)</span>');   
                }
            });
        });
    </script>