<?php get_header(); ?>
<?php 
    global $post;
    $thePostID = $post->ID;
    $post_images = get_post_meta($thePostID, 'post_images', true);
    $user_id=$post->post_author;
    
    if(isJson($post_images)){
        $post_images_encode=json_decode($post_images, true);
    }
    else{
        $post_images_encode="";
    } 
?>
        <!-- padding from header and content -->
        <div class="height_block"></div>
        <!-- padding from header and content -->
        
        <!-- appart_baner -->
        <div class="appart_baner">
            <!-- Top part of the slider -->
            <div class="appart_slider pull-right">
                <div  id="carousel-bounding-box">
                    <div class="carousel slide" id="appartSlider">
                        <!-- Carousel items -->
                        <div class="title">
                            <p><?= get_the_title() ?></p>
                        </div>
                        <div class="carousel-inner">
                        <?php 
                        $first_img="";
                        if($post_images_encode): 
                            $flag=0;
                            foreach($post_images_encode as $img): if($img):?>
                                <div class="<?= !$flag? "active ": ""?>item" data-slide-number="<?= $flag ?>">
                                    <img src="<?= $img ?>" alt="">
                                </div>     
                            <?php
                                if(!$first_img){
                                   $first_img=$img;
                                }
                                $flag++;
                                endif; endforeach; endif;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="hidden-xs thumbAppart carousel slide" id="slider-thumbs">
                    <ul class=" carousel-inner" >
                        <li class="active item">
                        <?php 
                            if($post_images_encode): 
                        $flag=0;
                        foreach($post_images_encode as $img): if($img):?>
                              <a class="thumb" id="carousel-selector-<?= $flag ?>"><img src="<?= $img ?>" alt=""></a>
                              <?php if($flag==2): ?>
                                </li>
                                <li class="item">
                        <?php endif; $flag++; endif; endforeach; endif;?>
                    </ul>  
                    <a class="left_slide" href="#slider-thumbs" role="button" data-slide="prev">
                        <img src="<?= THEMROOT ?>/img/arrows.png" alt="slide left">                        
                    </a>
                    <a class="right_slide" href="#slider-thumbs" role="button" data-slide="next">
                        <img src="<?= THEMROOT ?>/img/arrows.png" alt="slide right">
                    </a>    
                </div>
            </div>
            <!-- map -->
            <div id="appart_map" class="appart_map pull-left"></div>    
            <!-- map -->
        </div>
        <!-- appart_baner -->
        <div class="social_line">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12 pull-right">
                        <ul>
                            <li><a href="<?=  get_post_meta($thePostID, "facebook_event")[0] ? get_post_meta($thePostID, "facebook_event")[0] : "#"?>" ='fb'>Event</a></li>
                            <!-- <li><a href="http://www.facebook.com/sharer.php?u=<?= get_the_permalink() ?>" class='fb' target="_blank">Share</a></li> -->
                            <li><a href="http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo urlencode(get_the_title( $thePostID) . ' | ' . get_bloginfo('name'));?>&amp;p[summary]=<?php echo urlencode(get_the_custom_excerpt(get_post_meta(get_the_ID(), 'desc_apartment', true), 300)) ?>&amp;p[url]=<?php echo urlencode(get_the_permalink()); ?>&amp;p[images][0]=<?php echo urlencode($first_img);?>" class='fb' target="_blank">Share</a></li>
                            <li><a href="#" data-urer="<?= $user_id ?>" data-permalink="<?= get_the_permalink($thePostID) ?>"   class='mail mail_modal'></a></li>
                        </ul>
                        <div class="data-post">תאריך כניסה: <span><?= get_the_date('d.m.Y', $thePostID)?></span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="appart_content">
            <!-- two column block -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-1 col-md-6 col-md-offset-0 col-sm-6 col-xs-12 pull-right">
                        <div class="about">
                            <div class="title">
                                תיאור דירה
                            </div>
                            <p style="margin-bottom: 15px;"><strong>מצב הדירה: </strong><?php
                                $j=0;
                                for ($i=0; $i < 10; $i++) { 
                                    if(get_post_meta($thePostID, "apartment_condition[" . $i . "]")[0]){
                                        echo $j?", ":" ";
                                        echo get_post_meta($thePostID, "apartment_condition[" . $i . "]")[0];
                                        $j++;
                                    }
                                }?>
                            </p>
                            <p>
                                <?=  get_post_meta($thePostID, "desc_apartment")[0]?>
                            </p>
                        </div>
                        <div class="about">
                            <div class="title">
                                סיכום פרטי החוזה
                            </div>
                            <p>
                                <?=  get_post_meta($thePostID, "contract_detail")[0]?>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">          
                        <form action="" class="form_calc">
                            <div class="title">
                                בחר תקופה
                            </div>
                            <div class="select">
                                <select id="select_period">
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
                            </div>
                            <div class="count" id="final_price"><span>5400</span> שייה</div>

                            <div class="title">
                                בחר תקופה
                            </div>
                            <ul>
                                <li><strong>הצמדה: </strong> 123</li>
                                <li><strong>דמי ועד לחודש: </strong> <?= get_post_meta($thePostID, "building_comission", true) ? get_post_meta($thePostID, "building_comission", true) : get_post_meta($thePostID, "building_comission_price", true) ?></li>
                                <li><strong>ארנונה לחודש:</strong> <?= get_post_meta($thePostID, "property_tax", true) ? get_post_meta($thePostID, "property_tax", true) : get_post_meta($thePostID, "property_tax_price", true) ?></li>
                                <li><strong>דמי ניהול לחודש:</strong> <?= get_post_meta($thePostID, "rent_management", true) ? get_post_meta($thePostID, "rent_management", true) : get_post_meta($thePostID, "rent_management_price", true) ?></li>
                                <li><strong>קרן תחזוקה:</strong> <?=get_post_meta($thePostID, "long_term_fund_maintenance", true);?></li>
                                <li><strong>חניה:</strong> <?= get_post_meta($thePostID, 'parking', true);?></li>
                            </ul>
                        </form></div>
                    </div>
                </div>
                <!-- two column block -->


                <div class="container appart_listing">
                    <div class="title">פרטי הנכס</div>
                    <div class="col-lg-3 col-md-3 col-md-offset-0 col-sm-5 col-sm-offset-2 col-xs-12 pull-right">
                        <ul>
                            <li class="item_1"><strong>סוג הנכס: </strong><?= get_post_meta($thePostID, "property_type")[0]?></li>
                            <li class="item_2"><strong>מספר חדרים: </strong><?= get_post_meta($thePostID, "rooms_quantity")[0]?></li>
                            <li class="item_3"><strong>שטח הדירה: </strong><?= get_post_meta($thePostID, "apartment_size")[0]?></li>
                            <li class="item_4"><strong>קומה: </strong><?= get_post_meta($thePostID, "floor")[0]?></li>
                            <li class="item_5"><strong>מתוך: X קומות: </strong><?= get_post_meta($thePostID, "floor")[0]?></li>
                            <li class="item_6"><strong>בקומה אחרונה: </strong><?= get_post_meta($thePostID, "last_flor")[0]?></li>
                            <li class="item_7"><strong>מעלית: </strong><?= get_post_meta($thePostID, "elevator")[0]?></li>
                            <li class="item_8"><strong>חדר בטחון: </strong><?= get_post_meta($thePostID, "safety_room")[0]?></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12 pull-right">
                        <ul>
                            <li class="item_9"><strong>מחסן: </strong><?= get_post_meta($thePostID, "warehouse")[0]?></li>
                            <li class="item_10"><strong>מרפסת שמש: </strong><?= get_post_meta($thePostID, "sun_balcony")[0]?></li>
                            <li class="item_11"><strong>שטח מרפסת: </strong><?= get_post_meta($thePostID, "balcony_size")[0]?></li>
                            <li class="item_12"><strong>סורגים: </strong><?= get_post_meta($thePostID, "bars")[0]?></li>
                            <li class="item_13"><strong>מערכת חימום מים: </strong>
                            <?php 
                                $j=0;
                                for ($i=0; $i < 10; $i++) { 
                                    if(get_post_meta($thePostID, "water_heating_system[" . $i . "]")[0]){
                                        echo $j?", ":" ";
                                        echo get_post_meta($thePostID, "water_heating_system[" . $i . "]")[0];
                                        $j++;
                                    }
                                }?>
                            </li>
                            <li class="item_14"><strong>מערכת גז: </strong><?= get_post_meta($thePostID, "gas_system")[0]?></li>
                            <li class="item_15"><strong>כיווני אוויר: </strong>
                            <?php 
                                $j=0;
                                for ($i=0; $i < 10; $i++) { 
                                    if(get_post_meta($thePostID, "wind_directions[" . $i . "]")[0]){
                                        echo $j?", ":" ";
                                        echo get_post_meta($thePostID, "wind_directions[" . $i . "]")[0];
                                        $j++;
                                    }
                            }?>
                            </li>
                            <li class="item_16"><strong>חניה: </strong><?= get_post_meta($thePostID, "parking")[0]?></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-3 col-md-offset-0 col-sm-5 col-sm-offset-2 col-xs-12 pull-right">
                        <ul>
                            <li class="item_17"><strong>מחיר חניה: </strong><?= get_post_meta($thePostID, "parking_price")[0]?></strong></li>
                            <li class="item_18"><strong>מיזוג: </strong><?= get_post_meta($thePostID, "air")[0]?></li>
                            <li class="item_19"><strong>מיזוג בסלון: </strong><?= get_post_meta($thePostID, "air_con_sleeping_room")[0]?></li>
                            <li class="item_20"><strong>מצב הדירה: </strong>
                            <?php
                                $j=0;
                                for ($i=0; $i < 10; $i++) { 
                                    if(get_post_meta($thePostID, "apartment_condition[" . $i . "]")[0]){
                                        echo $j?", ":" ";
                                        echo get_post_meta($thePostID, "apartment_condition[" . $i . "]")[0];
                                        $j++;
                                    }
                                }?></li>
                            <li class="item_21"><strong>חצר: </strong><?= get_post_meta($thePostID, "garden")[0]?></li>
                            <li class="item_22"><strong>שטח חצר: </strong><?= get_post_meta($thePostID, "garden_size")[0]?></li>
                            <li class="item_23"><strong>חצר מגודרת: </strong><?= get_post_meta($thePostID, "fence_garden")[0]?></li>
                            <li class="item_24"><strong>מתאימה לשותפים: </strong><?= get_post_meta($thePostID, "suitable_roommates")[0]?></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12">
                        <ul>
                            <li class="item_25"><strong>בעלי חיים: </strong><?= get_post_meta($thePostID, "pets")[0]?></li>
                            <li class="item_26"><strong>קירוי חניה: </strong><?= get_post_meta($thePostID, "closed_parking")[0]?></li>
                            <li class="item_27"><strong>מספר מזגנים בחדרי שינה: </strong><?= get_post_meta($thePostID, "conditioners")[0]?></li>
                            <li class="item_28"><strong>מעל קומת עמודים: </strong><?= get_post_meta($thePostID, "pillars")[0]?></li>
                            <li class="item_29"><strong>מעל קומת חנויות: </strong><?= get_post_meta($thePostID, "above_shop")[0]?></li>
                        </ul>
                    </div>
                </div>

                <!-- date_cont -->
                <div class="container date_cont">
                    <div class="row">
                        <div class="col-lg-5 col-lg-offset-2 col-md-6 col-sm-7 col-xs-12 pull-right">

                            <div class="title">באמצעות היומן תוכל לראות את הנכס בזמן שנוח לך</div>
                            <div class="select_date"></div>

                            <div class="select_free_date">
                                        <div class="wrapp_form">
                                <div class="reseve_date"></div> 
                                <form action="" class='form_reserve form_cont'>

                                    <div class="timeline">
                                        <span><input type="radio" name="time_reserve" id="time_1" disabled><label for="time_1">8:00</label></span>
                                        <span><input type="radio" name="time_reserve" id="time_2" disabled><label for="time_2">9:00</label></span>
                                        <span><input type="radio" name="time_reserve" id="time_3" disabled><label for="time_3">10:00</label></span>
                                        <span><input type="radio" name="time_reserve" id="time_4" ><label for="time_4">11:00</label></span>
                                        <span><input type="radio" name="time_reserve" id="time_5"><label for="time_5">12:00</label></span>
                                        <span><input type="radio" name="time_reserve" id="time_6"><label for="time_6">13:00</label></span>
                                        <span><input type="radio" name="time_reserve" id="time_7"><label for="time_7">14:00</label></span>
                                        <span><input type="radio" name="time_reserve" id="time_8"><label for="time_8">15:00</label></span>
                                        <span><input type="radio" name="time_reserve" id="time_9" disabled><label for="time_9">16:00</label></span>
                                        <span><input type="radio" name="time_reserve" id="time_10"><label for="time_10">17:00</label></span>
                                        <span><input type="radio" name="time_reserve" id="time_11"><label for="time_11">18:00</label></span>
                                        <span><input type="radio" name="time_reserve" id="time_12"><label for="time_12">19:00</label></span>
                                        <span><input type="radio" name="time_reserve" id="time_13"><label for="time_13">20:00</label></span>
                                        <span><input type="radio" name="time_reserve" id="time_14"><label for="time_14">21:00</label></span>
                                        <span><input type="radio" name="time_reserve" id="time_15"><label for="time_15">22:00</label></span>
                                    </div>
                                    <div class="content">
                                        <div class='text'>
                                            <i class='icon-user'></i>
                                            <input type="text" placeholder='שם מלא'>
                                        </div>
                                        <div class='tel'>
                                            <input type="tel" placeholder='טלפון'>
                                        </div>
                                        <div class='email'>
                                            <input type="email" placeholder='דוא"ל'>
                                        </div>
                                        <div class="submit">
                                            <input type="submit" value="גןללןדנכנכגב">  
                                        </div>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-lg-offset-1 col-md-5 col-md-offset-0 col-sm-5 col-sm-offset-0 col-xs-12">
                            <div class="title">רוצה לתאם טלפונית? התקשר לנציג</div>
                            <ul>
                                <li class='user'><strong>הסוכן:</strong> <?= get_user_meta($user_id, 'first_name', true); ?> <?= get_user_meta($user_id, 'last_name', true);; ?></li>
                                <li class='mob'><strong>נייד:</strong><?= get_field('agents_phone_1', 'user_' . $user_id); ?></li>
                                <li class='tel'><strong>משרד:</strong><?= get_field('agents_office_phone', 'user_' . $user_id); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- date_cont -->


                <!-- doc -->
                <div class="container doc">
                    <div class="row">
                        <div class="col-lg-5 col-lg-offset-2 col-md-6 col-sm-7 col-xs-12 pull-right">
                            <form class="form_cont" id="send_form" action="" method="post">
                                <input type="hidden" name="user_id" value="<?= $user_id ?>">
                                <input type="hidden" name="permalik" value="<?= get_the_permalink($thePostID) ?>">
                                <div class="title">כתבו ונחזור אליכם</div>
                                <div class='text'>
                                    <i class='icon-user'></i>
                                    <input type="text" name="name" placeholder='שם מלא' required>
                                </div>
                                <div class='tel'>
                                    <input type="tel" name="tel" placeholder='טלפון' required>
                                </div>
                                <div class='email'>
                                    <input type="email" name="email" placeholder='דוא"ל' required>
                                </div>
                                <div class='textarea'>
                                    <textarea placeholder="הודעה" name="message" required></textarea>
                                </div>
                                <div class="submit">
                                    <input type="submit" value="גןללןדנכנכגב">  
                                </div>
                                <div id="message"></div>
                            </form>

                        </div>
                        <div class="col-lg-4 col-lg-offset-1 col-md-5 col-sm-5 col-xs-12 pdf">
                            <div class="title">שקיפות היא ערך, צפה בהסכם השכירות</div>
                            <div class="download">
                                <img src="<?= THEMROOT?>/img/pdf.jpg" alt="">
                                <a href="#">
                                    <span calss='icon-pdf'></span>
                                    להורדת החוזה
                                </a>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        <?php get_template_part('template_part_mailmodal'); ?>

                <?php 
                    $map_lat     =   get_post_meta($value, 'map_lat', true);
                    $map_lng     =   get_post_meta($value, 'map_lng', true);
                    $map_address =   get_post_meta($value, 'map_address', true);
                ?>
            <script>
                jQuery(document).ready(function ($) {
                    //Map
                    google.maps.event.addDomListener(window, 'load', single_init);
                    function single_init(){
                        var appartLatlng<?=  $value ?> = {lat: <?= $map_lat?$map_lat:'32.037140'?>, lng:<?= $map_lng?$map_lng:"34.835411" ?>};

                        var styleMap = [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"administrative.country","elementType":"geometry.fill","stylers":[{"visibility":"on"}]},{"featureType":"administrative.province","elementType":"labels.icon","stylers":[{"hue":"#ff0000"},{"visibility":"on"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#46bcec"},{"visibility":"on"}]}];

                        /*map options*/
                        var appartOptions = {
                            zoom: 11,   
                            center: appartLatlng, 
                            styles: styleMap
                        };

                        var appart = document.getElementById('appart_map');
                        var appart_map = new google.maps.Map(appart, appartOptions);
                        var markerAppart = new google.maps.Marker({
                            position: appartLatlng,
                            map: appart_map,            
                            title: "<?= $map_address ?>",
                            icon: directory_uri.stylesheet_directory_uri + '/img/geol.png'
                        });
                    }

                    //Calculator
                        var base_price=$("#select_period").val();
                        $("#final_price span").html($("#select_period").val());

                        $("#select_period").change(function(event) {
                            if($(this).val()==base_price){
                                $("#final_price span").html($(this).val());
                            }
                            else{
                                $("#final_price span").html($(this).val() + ' <span style="color:red">(' +  (100-((parseInt($(this).val())/parseInt(base_price))*100)) + '% -)</span>');   
                            }
                        });






                    $.datepicker.setDefaults( $.datepicker.regional[ "he" ] );
                    $( ".select_date" ).datepicker({
                        showOtherMonths: true,
                        selectOtherMonths: true,
                        dateFormat: 'd M yy',
                        minDate: 0,
                        onSelect: function (date) {
                            var selectDate = date;
                            $('.reseve_date').html('');
                            $('.reseve_date').html(selectDate);                 
                            $('.wrapp_form').hide();
                            $('.wrapp_form').show();
                        }
                    });



                    $('#appartSlider').carousel({
                        interval: 2000
                    });
                    $('[id^=carousel-selector-]').click( function(){
                        var id = this.id.substr(this.id.lastIndexOf("-") + 1);
                        var id = parseInt(id);
                        $('#appartSlider').carousel(id);
                    });

                    $('#appartSlider').on('slid.bs.carousel', function (e) {
                        var id = $('.item.active').data('slide-number');
                    });
                    $("#appartSlider").swiperight(function() {  
                        $(this).carousel('prev');  
                    });  
                    $("#appartSlider").swipeleft(function() {  
                        $(this).carousel('next');  
                    });
                });
            </script>
<?php get_footer(); ?>