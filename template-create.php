<?php
/*
 *Template Name: Create Real Estate Template
 */
?>
<?php get_header(); ?>
    
    <?php 
        $id = $_GET['id']? $_GET['id']: 0;
        $facebook_event =get_post_meta( $id, 'facebook_event', true);
        $desc_apartment =get_post_meta( $id, 'desc_apartment', true);
        $contract_detail =get_post_meta( $id, 'contract_detail', true);
        $pets =get_post_meta( $id, 'pets', true);
        $closed_parking =get_post_meta( $id, 'closed_parking', true);
        $conditioners =get_post_meta( $id, 'conditioners', true);
        $pillars = get_post_meta( $id, 'pillars', true);
        $above_shop = get_post_meta( $id, 'above_shop', true);
        $parking_price = get_post_meta( $id, 'parking_price', true);
        $air = get_post_meta( $id, 'air', true);
        $air_con_sleeping_room = get_post_meta($id, 'air_con_sleeping_room', true);

        for ($i=0; $i<9; $i++){
            $apartment_condition[$i]=get_post_meta( $id, 'apartment_condition['. $i .']', true);
        }

        $garden =  get_post_meta( $id, 'garden', true);
        $garden_size =  get_post_meta( $id, 'garden_size', true);
        $fence_garden =  get_post_meta( $id, 'fence_garden', true);
        $suitable_roommates =  get_post_meta( $id, 'suitable_roommates', true);
        $warehouse =  get_post_meta( $id, 'warehouse', true);
        $sun_balcony =  get_post_meta( $id, 'sun_balcony', true);
        $balcony_size =  get_post_meta( $id, 'balcony_size', true);
        $bars =  get_post_meta( $id, 'bars', true);

        for ($i=0; $i<4; $i++) {
            $water_heating_system[$i]=get_post_meta( $id, 'water_heating_system['. $i .']', true);
        }
        for ($i=0; $i<4; $i++) {
            $wind_directions[$i]=get_post_meta( $id, 'wind_directions['. $i .']', true);
        }

        $gas_system =  get_post_meta( $id, 'gas_system', true);
        $air_ways =  get_post_meta( $id, 'air_ways', true);
        $parking =  get_post_meta( $id, 'parking', true);
        $property_type =  get_post_meta( $id, 'property_type', true);
        $rooms_quantity =  get_post_meta( $id, 'rooms_quantity', true);

        $apartment_size =  get_post_meta($id, 'apartment_size', true);
        $floor =  get_post_meta($id, 'floor', true);
        $from_x_floors =  get_post_meta($id, 'from_x_floors', true);
        $last_flor =  get_post_meta($id, 'last_flor', true);
        $elevator =  get_post_meta($id, 'elevator', true);
        $safety_room =  get_post_meta($id, 'safety_room', true);
        $post_images = get_post_meta($id, 'post_images', true);
   
        if(isJson($post_images)){
            $post_images_encode=json_decode($post_images, true);
        }
        else{
            $post_images_encode=array(  0=>"",
                                        1=>"",
                                        2=>"",
                                        3=>"",
                                    );
        } 

        //second section
         //second section
        for ($i=0; $i<4; $i++) {
            $period[$i]=get_post_meta( $id, 'period['. $i .']', true);
            $period_price[$i]=get_post_meta( $id, 'period_price['. $i .']', true);  
        }

        $building_comission_price=get_post_meta( $id, 'building_comission_price', true);
        $building_comission=get_post_meta( $id, 'building_comission', true);
        $rent_management_price=get_post_meta( $id, 'rent_management_price', true);
        $rent_management=get_post_meta( $id, 'rent_management', true);
        $property_tax_price=get_post_meta( $id, 'property_tax_price', true);
        $property_tax=get_post_meta( $id, 'property_tax', true);
        $insurance_price=get_post_meta( $id, 'insurance_price', true);
        $insurance=get_post_meta( $id, 'insurance', true);
        $support_lawyer_price=get_post_meta( $id, 'support_lawyer_price', true);
        $support_lawyer=get_post_meta( $id, 'support_lawyer', true);
        $maintenance_hotline=get_post_meta( $id, 'maintenance_hotline', true);
        $account_transfer=get_post_meta( $id, 'account_transfer', true);
        $long_term_fund_maintenance=get_post_meta( $id, 'long_term_fund_maintenance', true);

?>
        <!-- padding from header and content -->
        <div class="height_block"></div>
        <!-- padding from header and content -->

        <?php  
            if($id){
                $categories = wp_get_post_categories($id, array('fields' => 'all'));
            }
            else{
                $categories="";
            }
        ?>
        <!-- start list content -->
        <section class="wrapper personal">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="pr-ap">
                            <a href="#" >כעהכהנ</a>
                            <a href="#" class="active">כעהכהנ</a>
                        </div>
                        <hr class="sline">
                        <h4>כעהכהנ</h4>

                        <form action="<?= get_the_permalink() ?>"  method="post" enctype="multipart/form-data">
                            <input type="hidden" value="<?= $id ?>" name="createorupdateid">
                            <!-- <label for="title"><span>-</span> Title:</label>
                            <input type="text" name="title" value="<?= $id?get_the_title($id): "" ?>"> -->
                            <div class="properties">
                                <p class="selects">
                                    <label for="categories"><span>-</span> Status (סטאטוס מסוג:):</label>
                                    <select name="categories" id="categories">
                                        <option class = "categories" value="active"   <?= $categories[0]->slug=="active"?'selected="selected"':'' ?>>Active</option>
                                        <option class = "categories" value="frozen"   <?= $categories[0]->slug=="frozen"?'selected="selected"':'' ?>>Frozen</option>
                                        <option class = "categories" value="rented"   <?= $categories[0]->slug=="rented"?'selected="selected"':'' ?>>Rented</option>
                                        <option class = "categories" value="rented_not_for_preview"   <?= $categories[0]->slug=="rented_not_for_preview"?'selected="selected"':'' ?>>Rented not for preview</option>
                                        <option class = "categories" value="delete"   <?= $categories[0]->slug=="delete"?'selected="selected"':'' ?>>Delete</option>
                                        <option class = "categories" value="archive"  <?= $categories[0]->slug=="archive"?'selected="selected"':'' ?>>Archive</option>
                                    </select>
                                </p>
                                <p class="text active" style="display:<?= (!$categories || $categories[0]->slug=='active')? 'block':'none' ?>;">לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית הועניב היושבב שערש שמחויט - שלושע ותלברו חשלו שעותלשך וחאית נובש ערששף. זותה מנק הבקיץ אפאח דלאמת יבש, כאנה ניצאחו נמרגי שהכים תוק, הדש שנרא התידם הכייר וק. לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית. סת אלמנקום ניסי נון ניבאה. דס איאקוליס וולופטה דיאם. וסטיבולום אט דולור, קראס אגת לקטוס וואל אאוגו וסטיבולום סוליסי טידום בעליק. לפרומי בלוף קינץ תתיח לרעח. לת צשחמי צש בליא, מנסוטו צמלח לביקו ננבי, צמוקו בלוקריה שיצמה ברורק. קונסקטוררדיפ 1111111</p>
                                <p class="text frozen" style="display:<?= ( $categories[0]->slug=='frozen')? 'block':'none' ?>;">לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית הועניב היושבב שערש שמחויט - שלושע ותלברו חשלו שעותלשך וחאית נובש ערששף. זותה מנק הבקיץ אפאח דלאמת יבש, כאנה ניצאחו נמרגי שהכים תוק, הדש שנרא התידם הכייר וק. לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית. סת אלמנקום ניסי נון ניבאה. דס איאקוליס וולופטה דיאם. וסטיבולום אט דולור, קראס אגת לקטוס וואל אאוגו וסטיבולום סוליסי טידום בעליק. לפרומי בלוף קינץ תתיח לרעח. לת צשחמי צש בליא, מנסוטו צמלח לביקו ננבי, צמוקו בלוקריה שיצמה ברורק. קונסקטוררדיפ 222222222</p>
                                <p class="text rented" style="display:<?= ($categories[0]->slug=='rented')? 'block':'none' ?>;">לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית הועניב היושבב שערש שמחויט - שלושע ותלברו חשלו שעותלשך וחאית נובש ערששף. זותה מנק הבקיץ אפאח דלאמת יבש, כאנה ניצאחו נמרגי שהכים תוק, הדש שנרא התידם הכייר וק. לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית. סת אלמנקום ניסי נון ניבאה. דס איאקוליס וולופטה דיאם. וסטיבולום אט דולור, קראס אגת לקטוס וואל אאוגו וסטיבולום סוליסי טידום בעליק. לפרומי בלוף קינץ תתיח לרעח. לת צשחמי צש בליא, מנסוטו צמלח לביקו ננבי, צמוקו בלוקריה שיצמה ברורק. קונסקטוררדיפ 333333333</p>
                                <p class="text rented_not_for_preview" style="display:<?= ($categories[0]->slug=='rented_not_for_preview')? 'block':'none' ?>;">לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית הועניב היושבב שערש שמחויט - שלושע ותלברו חשלו שעותלשך וחאית נובש ערששף. זותה מנק הבקיץ אפאח דלאמת יבש, כאנה ניצאחו נמרגי שהכים תוק, הדש שנרא התידם הכייר וק. לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית. סת אלמנקום ניסי נון ניבאה. דס איאקוליס וולופטה דיאם. וסטיבולום אט דולור, קראס אגת לקטוס וואל אאוגו וסטיבולום סוליסי טידום בעליק. לפרומי בלוף קינץ תתיח לרעח. לת צשחמי צש בליא, מנסוטו צמלח לביקו ננבי, צמוקו בלוקריה שיצמה ברורק. קונסקטוררדיפ 444444444</p>
                                <p class="text delete" style="display:<?= ($categories[0]->slug=='delete')? 'block':'none' ?>;">לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית הועניב היושבב שערש שמחויט - שלושע ותלברו חשלו שעותלשך וחאית נובש ערששף. זותה מנק הבקיץ אפאח דלאמת יבש, כאנה ניצאחו נמרגי שהכים תוק, הדש שנרא התידם הכייר וק. לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית. סת אלמנקום ניסי נון ניבאה. דס איאקוליס וולופטה דיאם. וסטיבולום אט דולור, קראס אגת לקטוס וואל אאוגו וסטיבולום סוליסי טידום בעליק. לפרומי בלוף קינץ תתיח לרעח. לת צשחמי צש בליא, מנסוטו צמלח לביקו ננבי, צמוקו בלוקריה שיצמה ברורק. קונסקטוררדיפ 555555555</p>
                                <p class="text archive" style="display:<?= ($categories[0]->slug=='archive')? 'block':'none' ?>;">לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית הועניב היושבב שערש שמחויט - שלושע ותלברו חשלו שעותלשך וחאית נובש ערששף. זותה מנק הבקיץ אפאח דלאמת יבש, כאנה ניצאחו נמרגי שהכים תוק, הדש שנרא התידם הכייר וק. לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית. סת אלמנקום ניסי נון ניבאה. דס איאקוליס וולופטה דיאם. וסטיבולום אט דולור, קראס אגת לקטוס וואל אאוגו וסטיבולום סוליסי טידום בעליק. לפרומי בלוף קינץ תתיח לרעח. לת צשחמי צש בליא, מנסוטו צמלח לביקו ננבי, צמוקו בלוקריה שיצמה ברורק. קונסקטוררדיפ 6666666666</p>
                            </div>
                           

                            <div class="clearfix"></div>
                            <label for="#"><span>-</span> Photos:</label>

                            <!-- <div class="dropzones">
                                <div class="dropzone">
                                    <div>
                                        <img src="<?= (isset($post_images_encode[0]) && $post_images_encode[0])? $post_images_encode[0]:"" ?>" alt="">
                                    </div>
                                    <input type="file" accept="image/jpeg, image/png" name="post_images[]"/>
                                    <p class="name-file"></p>
                                </div>
                                <div class="dropzone">
                                    <div>
                                        <img src="<?= (isset($post_images_encode[1]) && $post_images_encode[1])? $post_images_encode[1]:"" ?>" alt="">
                                    </div>
                                    <input type="file" accept="image/jpeg, image/png" name="post_images[]"/>
                                    <p class="name-file"</p>
                                </div>
                                <div class="dropzone">
                                    <div>
                                        <img src="<?= (isset($post_images_encode[2]) && $post_images_encode[2])? $post_images_encode[2]:"" ?>" alt="">
                                    </div>
                                    <input type="file" accept="image/jpeg, image/png" name="post_images[]"/>
                                    <p class="name-file"></p>
                                </div>
                                <div class="dropzone">
                                    <div>
                                        <img src="<?= (isset($post_images_encode[3]) && $post_images_encode[3])? $post_images_encode[3]:"" ?>" alt="">
                                    </div>
                                    <input type="file" accept="image/jpeg, image/png" name="post_images[]"/>
                                    <p class="name-file"></p>
                                </div>
                            </div> -->
                            





                            <div class="dropzones">
                                <ul class="nav nav-tabs" id="myTab">
                                    <li class="active" ><a href="#tab" data-toggle="tab">תוכנית דירה</a></li>
                                    <li><a href="#tab-2" data-toggle="tab">סלון</a></li>
                                    <li><a href="#tab-3" data-toggle="tab">מטבח</a></li>
                                    <li><a href="#tab-4" data-toggle="tab">חדר רחצה 1</a></li>
                                    <li><a href="#tab-5" data-toggle="tab">חדר רחצה 2</a></li>
                                    <li><a href="#tab-6" data-toggle="tab">בניין</a></li>
                                    <li><a href="#tab-7" data-toggle="tab">כניסה</a></li>
                                    <li><a href="#tab-8" data-toggle="tab">מרפסת</a></li>
                                    <li><a href="#tab-9" data-toggle="tab">פינת אוכל</a></li>
                                    <li><a href="#tab-10" data-toggle="tab">חדר שינה 1</a></li>
                                    <li><a href="#tab-11" data-toggle="tab">חדר שינה 2</a></li>

                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab">
                                        <div class="drop">
                                            <div class="cont">
                                            </div>
                                            <output class="list" id="list">
                                                
                                                <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/1.jpg" alt=""></span>
                                                <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/object-img.png" alt=""></span>
                                                <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/2.jpg" alt=""></span>
                                                <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/3.jpg" alt=""></span>
                                            </output>
                                            <input class="files" multiple="true" name="post_images[plan][]" type="file" />
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane" id="tab-2">
                                        <div class="drop">
                                                <div class="cont">
                                                </div>
                                                <output class="list">
                                                    <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/1.jpg" alt=""></span>
                                                    <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/object-img.png" alt=""></span>
                                                    <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/2.jpg" alt=""></span>
                                                    <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/3.jpg" alt=""></span>
                                                </output>
                                                <input class="files" multiple="true" name="post_images[livingroom][]" type="file" />
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="tab-3">
                                        <div class="drop">
                                                <div class="cont">
                                                </div>
                                                <output class="list">
                                                    <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/1.jpg" alt=""></span>
                                                    <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/object-img.png" alt=""></span>
                                                    <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/2.jpg" alt=""></span>
                                                    <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/3.jpg" alt=""></span>
                                                </output>
                                                <input class="files" multiple="true" name="post_images[kitchen][]" type="file" />
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="tab-4">
                                        <div class="drop">
                                            <div class="cont">
                                            </div>
                                            <output class="list">
                                                <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/1.jpg" alt=""></span>
                                                <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/object-img.png" alt=""></span>
                                                <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/2.jpg" alt=""></span>
                                                <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/3.jpg" alt=""></span>
                                            </output>
                                            <input class="files" multiple="true" name="post_images[bathroom1][]" type="file" />
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="tab-5">
                                        <div class="drop">
                                            <div class="cont">
                                            </div>
                                            <output class="list">
                                                <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/1.jpg" alt=""></span>
                                                <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/object-img.png" alt=""></span>
                                                <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/2.jpg" alt=""></span>
                                                <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/3.jpg" alt=""></span>
                                            </output>
                                            <input class="files" multiple="true" name="post_images[bathroom2][]" type="file" />
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="tab-6">
                                        <div class="drop">
                                            <div class="cont">
                                            </div>
                                            <output class="list">
                                                <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/1.jpg" alt=""></span>
                                                <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/object-img.png" alt=""></span>
                                                <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/2.jpg" alt=""></span>
                                                <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/3.jpg" alt=""></span>
                                            </output>
                                            <input class="files" multiple="true" name="post_images[building][]" type="file" />
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="tab-7">
                                        <div class="drop">
                                            <div class="cont">
                                            </div>
                                            <output class="list">
                                                <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/1.jpg" alt=""></span>
                                                <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/object-img.png" alt=""></span>
                                                <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/2.jpg" alt=""></span>
                                                <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/3.jpg" alt=""></span>
                                            </output>
                                            <input class="files" multiple="true" name="post_images[entrance][]" type="file" />
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="tab-8">
                                        <div class="drop">
                                            <div class="cont">
                                            </div>
                                            <output class="list">
                                                <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/1.jpg" alt=""></span>
                                                <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/object-img.png" alt=""></span>
                                                <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/2.jpg" alt=""></span>
                                                <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/3.jpg" alt=""></span>
                                            </output>
                                            <input class="files" multiple="true" name="post_images[balcony][]" type="file" />
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="tab-9">
                                        <div class="drop">
                                            <div class="cont">
                                            </div>
                                            <output class="list">
                                                <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/1.jpg" alt=""></span>
                                                <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/object-img.png" alt=""></span>
                                                <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/2.jpg" alt=""></span>
                                                <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/3.jpg" alt=""></span>
                                            </output>
                                            <input class="files" multiple="true" name="post_images[dining][]" type="file" />
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane" id="tab-10">
                                        <div class="drop">
                                            <div class="cont">
                                            </div>
                                            <output class="list">
                                                <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/1.jpg" alt=""></span>
                                                <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/object-img.png" alt=""></span>
                                                <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/2.jpg" alt=""></span>
                                                <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/3.jpg" alt=""></span>
                                            </output>
                                            <input class="files" multiple="true" name="post_images[bedroom1][]" type="file" />
                                        </div>
                                    </div>

                                    <div class="tab-pane " id="tab-11">
                                        <div class="drop">
                                            <div class="cont">
                                            </div>
                                            <output class="list">
                                                <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/1.jpg" alt=""></span>
                                                <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/object-img.png" alt=""></span>
                                                <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/2.jpg" alt=""></span>
                                                <span><p class="del">X</p><img class="thumb" src="<?= THEMROOT ?>/img/3.jpg" alt=""></span>
                                            </output>
                                            <input class="files" multiple="true" name="post_images[bedroom2]" type="file" />
                                        </div>
                                    </div>
                                </div>
                                <h5 class="error">Sorry no more 8 photos</h5>
                            </div>





                            <div id="maps"></div> 

                            <div class="maps-input">
                                <label for="title"><span>-</span> Map:</label>
                                <input type="text" id="title" name="title" value="<?= $id?get_the_title($id): "" ?>" required>
                            </div>
                            <div class="clearfix"></div>
                            <label for="#"><span>-</span> Facebook event:</label>
                            <input type="text" name="facebook_event" value="<?= $facebook_event?>">
                            <label for="#"><span>-</span> Description Apartment:</label>
                            <textarea name="desc_apartment" id="#" cols="30" rows="10"><?= $desc_apartment ?></textarea>
                            <label for="#"><span>-</span> Summary details of the contract:</label>
                            <textarea name="contract_detail" id="#" ><?= $contract_detail?></textarea>

                            
                                <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

                            <div class="mini-select">
                                <h4>מחיר ועלויות נוספות</h4>
                                <p class="selects">
                                    <label for="period"><span>-</span> תקופה:</label>
                                    <select name="period[0]" id="period">
                                        <option value="" <?= !$period[0]?"selected":""?>></option>
                                        <option value="0.5" <?= ($period[0]=="0.5")?"selected":""?> >0.5</option>
                                        <option value="1" <?= ($period[0]=="1")?"selected":""?> >1</option>
                                        <option value="1.5" <?= ($period[0]=="1.5")?"selected":""?> >1.5</option>
                                        <option value="2" <?= ($period[0]=="2")?"selected":""?>>2</option>
                                    </select>
                                </p>
                                <p>
                                    <label for="period_price"><span>-</span> מחיר:</label>
                                    <input type="text" name="period_price[0]" id="period_price" value="<?= ($period[0])?$period_price[0]:"" ?>" pattern="[\d]{0,5}">
                                </p>
                                <p class="selects">
                                    <select name="period[1]">
                                        <option value="" <?= (!$period[1])?"selected":""?>></option>
                                        <option value="2.5" <?= ($period[1]=="2.5")?"selected":""?>>2.5</option>
                                        <option value="3" <?= ($period[1]=="3")?"selected":""?>>3</option>
                                        <option value="3.5" <?= ($period[1]=="3.5")?"selected":""?> >3.5</option>
                                        <option value="4" <?= ($period[1]=="4")?"selected":""?> >4</option>
                                    </select>
                                </p>
                                <p>
                                    <input type="text" name="period_price[1]" value="<?= ($period[1])?$period_price[1]:"" ?>" pattern="[\d]{0,5}">
                                </p>
                                <p class="selects">
                                     <select name="period[2]">
                                        <option value="" <?= (!$period[2])?"selected":""?> ></option>
                                        <option value="4.5" <?= ($period[2]=="4.5")?"selected":""?>>4.5</option>
                                        <option value="5" <?= ($period[2]=="5")?"selected":""?>>5</option>
                                        <option value="5.5" <?= ($period[2]=="5.5")?"selected":""?>>5.5</option>
                                    </select>
                                </p>
                                <p>
                                    <input type="text" name="period_price[2]" value="<?= ($period[2])?$period_price[2]:"" ?>" pattern="[\d]{0,5}">
                                </p>
                                <p class="selects">
                                    <select name="period[3]">
                                        <option value="" <?= (!$period[3])?"selected":""?> ></option>
                                        <option value="6" <?= ($period[3]=="6")?"selected":""?> >6</option>
                                        <option value="6.5" <?= ($period[3]=="6.5")?"selected":""?> >6.5</option>
                                        <option value="7" <?= ($period[3]=="7")?"selected":""?> >7</option>
                                    </select>
                                </p>
                                <p>
                                    <input type="text" name="period_price[3]" value="<?= ($period[3])?$period_price[3]:"" ?>" pattern="[\d]{0,5}">
                                </p>
                            </div>

                            <h4>מחיר ועלויות נוספות</h4>
                            <div class="select-radio">
                                <p>
                                    <label for="radio-1"><span>-</span> בקרה וניהול שכירות:</label>
                                    <input name="rent_management_price"  type="text" value="<?= !$rent_management ? $rent_management_price : "" ?>">
                                </p>
                                <p class="radio">
                                    <input name="rent_management" id="radio-1" type="radio" value="" <?= !$rent_management ? "checked='checked'": ""?>>
                                    <label for="radio-1"></label>
                                </p>
                                <p class="radio">
                                    <input name="rent_management" id="radio-2" type="radio" value="כולל"  <?= $rent_management=="כולל" ? "checked='checked'": ""?>>
                                    <label for="radio-2">כולל</label>
                                </p>
                                <p class="radio">
                                    <input name="rent_management" id="radio-3" type="radio" value="לא ידוע"  <?= $rent_management=="לא ידוע" ? "checked='checked'": ""?>>
                                    <label for="radio-3">לא ידוע</label>
                                </p>
                            </div>

                            <div class="select-radio">
                                <p>
                                    <label for="#" ><span>-</span> ועד בית:</label>
                                     <input type="text" name="building_comission_price" value="<?= !$building_comission ? $building_comission_price : "" ?>">
                                </p>
                                <p class="radio">
                                    <input name="building_comission" id="radio-4" type="radio" value="" <?= !$building_comission ? "checked='checked'": ""?>>
                                    <label for="radio-4"></label>
                                </p>
                                <p class="radio">
                                    <input name="building_comission" id="radio-5" type="radio" value="כולל" <?= $building_comission=="כולל" ? "checked='checked'": ""?>>
                                    <label for="radio-5">כולל</label>
                                </p>
                                <p class="radio">
                                    <input name="building_comission" id="radio-6" type="radio" value="לא ידוע" <?= $building_comission=="לא ידוע" ? "checked='checked'": ""?>>
                                    <label for="radio-6">לא ידוע</label>
                                </p>
                            </div>

                            <div class="select-radio">
                                <p>
                                    <label for="#"><span>-</span>ארנונה לחודש:</label>
                                    <input type="text" name="property_tax_price" value="<?= !$property_tax ? $property_tax_price : "" ?>">
                                </p>
                                <p class="radio">
                                   <input name="property_tax" id="radio-7" type="radio" value="" <?= !$property_tax ? "checked='checked'": ""?>>
                                    <label for="radio-7"></label>
                                </p>
                                <p class="radio">
                                    <input name="property_tax" id="radio-8" type="radio" value="כולל" <?= $property_tax=="כולל" ? "checked='checked'": ""?>>
                                    <label for="radio-8">כולל</label>
                                </p>
                                <p class="radio">
                                    <input name="property_tax" id="radio-9" type="radio" value="חינם" <?= $property_tax=="חינם" ? "checked='checked'": ""?>>
                                    <label for="radio-9">חינם</label>
                                </p>
                            </div>

                            <div class="select-radio">
                                <p>
                                    <label for="#"><span>-</span> ביטוח:</label>
                                    <input type="text" name="insurance_price" value="<?= !$insurance ? $insurance_price : "" ?>">
                                </p>
                                <p class="radio">
                                    <input name="insurance" id="radio-10" type="radio" value="" <?= !$insurance ? "checked='checked'": ""?>>
                                    <label for="radio-10"></label>
                                </p>
                                <p class="radio">
                                    <input name="insurance" id="radio-11" type="radio" value="כולל" <?= $insurance=="כולל" ? "checked='checked'": ""?>>
                                    <label for="radio-11">כולל</label>
                                </p>
                                <p class="radio">
                                    <input name="insurance" id="radio-12" type="radio" value="חינם" <?= $insurance=="חינם" ? "checked='checked'": ""?>>
                                    <label for="radio-12">חינם</label>
                                </p>
                            </div>

                            <div class="select-radio no-text-inp">
                                <p>
                                    <label for="#"><span>-</span> מוקד תחזוקה:</label>
                                </p>
                                <p class="radio">
                                    <input name="maintenance_hotline" id="radio-13" type="radio" name="כולל" <?= $maintenance_hotline=="כולל" ? "checked='checked'": ""?>>
                                    <label for="radio-13">כולל</label>
                                </p>
                                <p class="radio">
                                    <input name="maintenance_hotline" id="radio-14" type="radio" name="לא כולל" <?= $maintenance_hotline=="לא כולל" ? "checked='checked'": ""?>>
                                    <label for="radio-14">לא כולל</label>
                                </p>
                                <p class="radio">
                                    <input name="maintenance_hotline" id="radio-15" type="radio" name="לא רלוונטי" <?= $maintenance_hotline=="לא רלוונטי" ? "checked='checked'": ""?>>
                                    <label for="radio-15">לא רלוונטי</label>
                                </p>
                            </div>

      <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->




                            <h4>(כעהכהנ) Properties</h4>
                            <div class="properties">
                                <p class="selects">
                                    <label for="property_type"><span>-</span> Property Type:</label>
                                    <select name="property_type" id="property_type">
                                        <option value="דירה"   <?= $property_type=='דירה'?'selected="selected"':'' ?>>דירה</option>
                                            <option value="דירת גן" <?= $property_type=='דירת גן'?'selected="selected"':'' ?>>דירת גן</option>
                                            <option value="דירת גג"   <?= $property_type=='דירת גג'?'selected="selected"':'' ?>>דירת גג</option>
                                            <option value="פנטהאוס"   <?= $property_type=='פנטהאוס'?'selected="selected"':'' ?>>פנטהאוס</option>
                                            <option value="בית פרטי"   <?= $property_type=='בית פרטי'?'selected="selected"':'' ?>>בית פרטי</option>
                                            <option value="בית דו-משפחתי"   <?= $property_type=='בית דו-משפחתי'?'selected="selected"':'' ?>>בית דו-משפחתי</option>
                                    </select>
                                </p>
                                <p class="selects">
                                    <label for="rooms_quantityrooms_quantity"><span>-</span> Rooms:</label>
                                    <select name="rooms_quantity" id="rooms_quantity">
                                         <option value="1"   <?= $rooms_quantity==1?'selected="selected"':'' ?>>1</option>
                                        <option value="1.5" <?= $rooms_quantity==1.5?'selected="selected"':'' ?>>1.5</option>
                                        <option value="2"   <?= $rooms_quantity==2?'selected="selected"':'' ?>>2</option>
                                        <option value="2.5"   <?= $rooms_quantity==2.5?'selected="selected"':'' ?>>2.5</option>
                                        <option value="3"   <?= $rooms_quantity==3?'selected="selected"':'' ?>>3</option>
                                        <option value="3.5"   <?= $rooms_quantity==3.5?'selected="selected"':'' ?>>3.5</option>
                                        <option value="4"   <?= $rooms_quantity==4?'selected="selected"':'' ?>>4</option>
                                        <option value="4.5"   <?= $rooms_quantity==4.5?'selected="selected"':'' ?>>4.5</option>
                                        <option value="5"   <?= $rooms_quantity==5?'selected="selected"':'' ?>>5</option>
                                        <option value="5.5"   <?= $rooms_quantity==5.5?'selected="selected"':'' ?>>5.5</option>
                                        <option value="6"   <?= $rooms_quantity==6?'selected="selected"':'' ?>>6</option>
                                        <option value="6.5"   <?= $rooms_quantity==6.5?'selected="selected"':'' ?>>6.5</option>
                                        <option value="7"   <?= $rooms_quantity==7?'selected="selected"':'' ?>>7</option>
                                    </select>
                                </p>
                                <p>
                                    <label for="apartment_size"><span>-</span> Apartment size:</label>
                                    <input type="text" name="apartment_size" id="apartment_size" value="<?php echo $apartment_size; ?>" pattern="[123456789][0-9]{0,2}" required>
                                </p>
                                <p>
                                    <label for="floor"><span>-</span> Floor:</label>
                                    <input type="text" name="floor" id="floor" value="<?php echo $floor; ?>" pattern="[123456789][0-9]{0,1}" required>
                                </p>
                                <p>
                                    <label for="from_x_floors"><span>-</span> From: X Floors:</label>
                                    <input type="text" name="from_x_floors" id="from_x_floors" value="<?php echo $from_x_floors; ?>" pattern="[123456789][0-9]{0,1}" required>
                                </p>
                                <p class="selects">
                                    <label for="last_flor"><span>-</span> Last floor:</label>
                                    <select name="last_flor" id="last_flor">
                                        <option class = "last_flor" value="לא"   <?= $last_flor=="לא"?'selected="selected"':'' ?>>לא</option>
                                        <option class = "last_flor" value="כן"   <?= $last_flor=="כן"?'selected="selected"':'' ?>>כן</option>
                                    </select>
                                </p>
                                <p class="selects">
                                    <label for="elevator"><span>-</span> Elevator:</label>
                                    <select name="elevator" id="elevator">
                                        <option class = "elevator" value="לא"   <?= $elevator=="לא"?'selected="selected"':'' ?>>לא</option>
                                        <option class = "elevator" value="כן"   <?= $elevator=="כן"?'selected="selected"':'' ?>>כן</option>
                                    </select>
                                </p>
                                <p class="selects">
                                    <label for="safety_room"><span>-</span> Safety room:</label>
                                    <select name="safety_room" id="safety_room">
                                        <option class = "safety_room" value="אין"   <?= $safety_room=="אין"?'selected="selected"':'' ?>>אין</option>
                                        <option class = "safety_room" value="מקלט"   <?= $safety_room=="מקלט"?'selected="selected"':'' ?>>מקלט</option>
                                        <option class = "safety_room" value="משותף"   <?= $safety_room=="משותף"?'selected="selected"':'' ?>>משותף</option>
                                    </select>
                                </p>
                                <p class="selects">
                                    <label for="warehouse"><span>-</span> Warehouse:</label>
                                    <select name="warehouse" id="warehouse">
                                        <option class = "warehouse" value="אין"   <?= $warehouse=="אין"?'selected="selected"':'' ?>>אין</option>
                                        <option class = "warehouse" value="פרטי"   <?= $warehouse=="פרטי"?'selected="selected"':'' ?>>פרטי</option>
                                        <option class = "warehouse" value="משותף"   <?= $warehouse=="משותף"?'selected="selected"':'' ?>>משותף</option>
                                    </select>
                                </p>
                                <p class="selects">
                                    <label for="sun_balcony"><span>-</span> Sun Balcony:</label>
                                    <select name="sun_balcony" id="sun_balcony">
                                        <option class = "sun_balcony" value="אין"   <?= $sun_balcony=="אין"?'selected="selected"':'' ?>>אין</option>
                                        <option class = "sun_balcony" value="מרפסת שמש"   <?= $sun_balcony=="מרפסת שמש"?'selected="selected"':'' ?>>מרפסת שמש</option>
                                        <option class = "sun_balcony" value="מרפסת סגורה"   <?= $sun_balcony=="מרפסת סגורה"?'selected="selected"':'' ?>>מרפסת סגורה</option>
                                    </select>
                                </p>
                                <p>
                                    <label for="balcony_size"><span>-</span> Balcony size:</label>
                                    <input type="text" name="balcony_size" id="balcony_size" value="<?php echo $balcony_size; ?>"  pattern="[\d]{0,3}">
                                </p>
                                <p class="selects">
                                    <label for="bars"><span>-</span> Bars:</label>
                                    <select name="bars"  id="bars">
                                        <option class = "bars" value="כל הבית"   <?= $bars=="כל הבית"?'selected="selected"':'' ?>>כל הבית</option>
                                        <option class = "bars" value="חלקי"   <?= $bars=="חלקי"?'selected="selected"':'' ?>>חלקי</option>
                                        <option class = "bars" value="אין"   <?= $bars=="אין"?'selected="selected"':'' ?>>אין</option>
                                    </select>
                                </p>
                                <label ><span>-</span> Water Heating System: </label>
                                <div class="checkboxs">
                                    <p class="checkbox">
                                        <input id="checkbox" type="checkbox" name="water_heating_system[0]" <?= $water_heating_system[0]?"checked='checked'":"" ?> value="אטמור">
                                        <label for="checkbox">אטמור</label>
                                    </p>
                                    <p class="checkbox">
                                        <input id="checkbox-2" type="checkbox"  name="water_heating_system[1]" <?= $water_heating_system[1]?"checked='checked'":"" ?> value="גז">
                                        <label for="checkbox-2">גז</label>
                                    </p>
                                    <p class="checkbox">
                                        <input id="checkbox-3" type="checkbox" name="water_heating_system[2]" <?= $water_heating_system[2]?"checked='checked'":"" ?> value="דוד חשמל">
                                        <label for="checkbox-3">דוד חשמל</label>
                                    </p>
                                    <p class="checkbox">
                                        <input id="checkbox-4" type="checkbox" name="water_heating_system[3]" <?= $water_heating_system[3]?"checked='checked'":"" ?> value="דוד שמש">
                                        <label for="checkbox-4">דוד שמש</label>
                                    </p>
                                </div>
                                <p class="selects">
                                    <label for="#"><span>-</span> :Gas System</label>
                                    <select name="gas_system" id="#">
                                        <option class = "gas_system" value="אין"   <?= $gas_system=="אין"?'selected="selected"':'' ?>>אין</option>
                                        <option class = "gas_system" value="צובר מרכזי"  <?= $gas_system=="צובר מרכזי"?'selected="selected"':'' ?>>צובר מרכזי</option>
                                        <option class = "gas_system" value="בלונים"   <?= $gas_system=="בלונים"?'selected="selected"':'' ?>>בלונים</option>
                                    </select>
                                </p>
                                <label  class="mt"><span>-</span> Wind directions: </label>
                                <div class="checkboxs">
                                    <p class="checkbox">
                                        <input id="checkbox-5" type="checkbox" name="wind_directions[0]" <?= $wind_directions[0]?"checked":"" ?> value="צפון">
                                        <label for="checkbox-5">צפון</label>
                                    </p>
                                    <p class="checkbox">
                                        <input id="checkbox-6" type="checkbox" name="wind_directions[1]" <?= $wind_directions[1]?"checked":"" ?> value="דרום">
                                        <label for="checkbox-6">דרום</label>
                                    </p>
                                    <p class="checkbox">
                                        <input id="checkbox-7" type="checkbox" name="wind_directions[2]" <?= $wind_directions[2]?"checked":"" ?> value="מזרח">
                                        <label for="checkbox-7">מזרח</label>
                                    </p>
                                    <p class="checkbox">
                                        <input id="checkbox-8" type="checkbox" name="wind_directions[3]" <?= $wind_directions[3]?"checked":"" ?> value="מערב">
                                        <label for="checkbox-8">לא מערב</label>
                                    </p>
                                </div>

                                <p class="selects">
                                    <label for="parking"><span>-</span> :Parking</label>
                                    <select name="parking" id="parking">
                                            <option value="אין"   <?= $parking=='אין'?'selected="selected"':'' ?>>אין</option>
                                            <option value="בטאבו" <?= $parking=='בטאבו'?'selected="selected"':'' ?>>בטאבו</option>
                                            <option value="פרטית"   <?= $parking=='פרטית'?'selected="selected"':'' ?>>פרטית</option>
                                            <option value="משותפת"   <?= $parking=='משותפת'?'selected="selected"':'' ?>>משותפת</option>
                                            <option value="רחוב ללא בעיות חניה"   <?= $parking=='רחוב ללא בעיות חניה'?'selected="selected"':'' ?>>רחוב ללא בעיות חניה</option>
                                    </select>
                                </p>
                                 <p class="selects">
                                    <label for="#"><span>-</span> Parking price:</label>
                                    <select name="parking_price_s" id="parking_price_s">
                                        <option value="בחינם"   <?= (!$parking_price)?'selected="selected"':'' ?>>בחינם</option>
                                        <option value="בתשלום"   <?= ($parking_price)?'selected="selected"':'' ?>>בתשלום</option>
                                    </select>
                                    
                                </p>
                                <p id="parking_price_number_p" style="display:none" >
                                        <label for="parking_price">Parking price number(מחיר חניה:)</label>
                                        <input  type = "text" name="parking_price" id="parking_price" value="<?php echo $parking_price;?>">
                                </p>
                                    <!-- 
                                        For parking price section
                                    -->
                                    <script>  
                                        var selectPrice        = document.getElementById('parking_price_s');
                                        var selectPriceVal     = document.getElementById('parking_price_s').value;
                                        var pricENumberSection = document.getElementById('parking_price_number_p');
                                        if(selectPriceVal=="בתשלום"){
                                            pricENumberSection.style.display = "block";
                                        }
                                        selectPrice.onchange=function(){
                                            var newSelectPriceVal=this.value;
                                            if(newSelectPriceVal=="בתשלום"){
                                                pricENumberSection.style.display = "block";
                                            }
                                            else{
                                                pricENumberSection.style.display = "none";
                                                document.getElementById('parking_price').value="";

                                            }
                                        };
                                    </script>

                                    
                                <div class="clearfix"></div>
                                <div class="properties">
                                <p class="selects">
                                    <label for="#"><span>-</span> Air conditioner: </label>
                                     <select name="air" id="air">
                                        <option value="אין"   <?= $air=="אין"?'selected="selected"':'' ?>>אין</option>
                                        <option value="עילי"  <?= $air=="עילי"?'selected="selected"':'' ?>>עילי</option>
                                        <option value="מרכזי" <?= $air=="מרכזי"?'selected="selected"':'' ?>>מרכזי</option>
                                    </select>
                                </p>
                                 <p class="selects">
                                    <label for="#"><span>-</span> Air con in sleeping rooms: </label>
                                    <select name="air_con_sleeping_room_select" id="air_con_sleeping_room_select">
                                        <option class = "air_con_sleeping_room_select" value="כן"   <?= $air_con_sleeping_room=="כן"?'selected="selected"':'' ?>>כן</option>
                                        <option class = "air_con_sleeping_room_select" value="לא"   <?= (!$air_con_sleeping_room)=="לא"?'selected="selected"':'' ?>>לא</option>
                                    </select>
                                    <p id="air_con_sleeping_room_section" style="display:none;">
                                        <label for="air_con_sleeping_room">Amount of air con in sleeping rooms:</label>
                                        <input type="text" name="air_con_sleeping_room" id="air_con_sleeping_room" value="<?php echo $air_con_sleeping_room; ?>" pattern="[\d]{0,2}">
                                    </p>
                                </p>
                                    <!-- 
                                        For amount of air con in sleeping rooms
                                    -->
                                    <script>  
                                        var selectAir        = document.getElementById('air_con_sleeping_room_select');
                                        var selectAirVal     = document.getElementById('air_con_sleeping_room_select').value;
                                        var amountAirConditionSection = document.getElementById('air_con_sleeping_room_section');
                                        if(selectAirVal=="כן"){
                                            amountAirConditionSection.style.display = "block";
                                        }
                                        selectAir.onchange=function(){
                                            var newSelectPriceVal=this.value;
                                            if(newSelectPriceVal=="כן"){
                                                amountAirConditionSection.style.display = "block";
                                            }
                                            else{
                                                amountAirConditionSection.style.display = "none";
                                                document.getElementById('air_con_sleeping_room').value="";
                                            }
                                        };
                                    </script>
                            </div>

                                <label><span>-</span> Apartment condition:</label>
                                <div class="checkboxs">
                                    <p class="checkbox">
                                        <input name="apartment_condition[0]" <?= $apartment_condition[0]?"checked":"" ?> value="לא משופצת" id="checkbox-9" type="checkbox">
                                        <label for="checkbox-9">לא משופצת</label>
                                    </p>
                                    <p class="checkbox">
                                        <input name="apartment_condition[1]" <?= $apartment_condition[1]?"checked":"" ?> value="לאחר שיפוץ כללי" id="checkbox-10" type="checkbox">
                                        <label for="checkbox-10">לאחר שיפוץ כללי</label>
                                    </p>
                                    <p class="checkbox">
                                        <input name="apartment_condition[2]" <?= $apartment_condition[2]?"checked":"" ?> value="חדשה" id="checkbox-11" type="checkbox">
                                        <label for="checkbox-11">חדשה</label>
                                    </p>
                                    <p class="checkbox">
                                        <input name="apartment_condition[3]" <?= $apartment_condition[3]?"checked":"" ?> value="הוחלף ריצוף" id="checkbox-12" type="checkbox">
                                        <label for="checkbox-12">הוחלף ריצוף</label>
                                    </p>
                                    <p class="checkbox">
                                        <input name="apartment_condition[4]" <?= $apartment_condition[4]?"checked":"" ?> value="מטבח משופץ" id="checkbox-13" type="checkbox">
                                        <label for="checkbox-13">מטבח משופץ</label>
                                    </p>
                                    <p class="checkbox">
                                        <input name="apartment_condition[5]" <?= $apartment_condition[5]?"checked":"" ?> value="מטבח מודרני" id="checkbox-14" type="checkbox">
                                        <label for="checkbox-14">מטבח מודרני</label>
                                    </p>
                                    <p class="checkbox">
                                        <input name="apartment_condition[6]" <?= $apartment_condition[6]?"checked":"" ?> value="חדרי רחצה משופצים" id="checkbox-15" type="checkbox">
                                        <label for="checkbox-15">חדרי רחצה משופצים</label>
                                    </p>
                                    <p class="checkbox">
                                        <input name="apartment_condition[7]" <?= $apartment_condition[7]?"checked":"" ?> value="נקיה" id="checkbox-16" type="checkbox">
                                        <label for="checkbox-16">נקיה</label>
                                    </p>
                                    <p class="checkbox">
                                        <input name="apartment_condition[8]" <?= $apartment_condition[8]?"checked":"" ?> value="אחרי צביעה" id="checkbox-17" type="checkbox">
                                        <label for="checkbox-17">אחרי צביעה</label>
                                    </p>
                                </div>
                                <p class="selects">
                                    <label for="garden"><span>-</span> Garden:</label>
                                     <select name="garden"  id="garden">
                                        <option value="אין" <?= $garden=="אין"?'selected="selected"':'' ?>>אין</option>
                                        <option value="יש" <?= $garden=="יש"?'selected="selected"':'' ?>>יש</option>
                                        <option value="משותפת" <?= $garden=="משותפת"?'selected="selected"':'' ?>>משותפת</option>
                                    </select>
                                </p>
                                <p>
                                    <label for="#"><span>-</span> Garden size:</label>
                                    <input type="text" name="garden_size" id="garden_size" value="<?php echo $garden_size; ?>" placeholder="מר">
                                </p>
                                <p class="fence_garden">
                                    <label for="#"><span>-</span> Garden with a fence:</label>
                                    <select name="fence_garden" id="fence_garden">
                                        <option class = "fence_garden" value="כן" <?= $fence_garden=="כן"?'selected="selected"':'' ?>>כן</option>
                                        <option class = "fence_garden" value="לא" <?= $fence_garden=="לא"?'selected="selected"':'' ?>>לא</option>
                                    </select>
                                </p>
                                <p class="selects">
                                    <label for="suitable_roommates"><span>-</span> Suitable for roommates:</label>
                                     <select name="suitable_roommates" id="suitable_roommates">
                                        <option class = "suitable_roommates" value="כן" <?= $suitable_roommates=="כן"?'selected="selected"':'' ?>>כן</option>
                                        <option class = "suitable_roommates" value="לא" <?= $suitable_roommates=="לא"?'selected="selected"':'' ?>>לא</option>
                                    </select>
                                </p>
                                <p class="selects">
                                    <label for="#"><span>-</span> Suitable for animals:</label>
                                    <select name="pets" id="#">
                                        <option value="כן" <?= $pets=="כן"?'selected="selected"':'' ?>>כן</option>
                                        <option value="לא" <?= $pets=="לא"?'selected="selected"':'' ?>>לא</option>
                                    </select>
                                </p>
                                <p class="selects">
                                    <label for="#"><span>-</span> Closed parking space:</label>
                                    <select name="#" id="#" name="closed_parking">
                                        <option value="כן" <?= $closed_parking=="כן"?'selected="selected"':'' ?>>כן</option>
                                        <option value="לא" <?= $closed_parking=="לא"?'selected="selected"':'' ?>>לא</option>
                                    </select>
                                </p>
                                <p>
                                    <label for="#"><span>-</span> Number of air conditioners in bedrooms:</label>
                                    <input type="text" value="<?php echo $conditioners; ?>" pattern="[\d]{0,2}">
                                </p>
                                <p class="selects">
                                    <label for="#"><span>-</span> Floor above pillars:</label>
                                     <select name="pillars" id="#">
                                        <option  value="כן" <?= $pillars=="כן"?'selected="selected"':'' ?>>כן</option>
                                        <option  value="לא" <?= $pillars=="לא"?'selected="selected"':'' ?>>לא</option>
                                    </select>
                                </p>
                                <p class="selects">
                                    <label for="#"><span>-</span> Above shop:</label>
                                    <select name="above_shop" id="#">
                                        <option value="כן" <?= $above_shop=="כן"?'selected="selected"':'' ?>>כן</option>
                                        <option value="לא" <?= $above_shop=="לא"?'selected="selected"':'' ?>>לא</option>
                                    </select>
                                </p>





      <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

                                <h4>פרטי הלקוח</h4>
                                <div class="select-radio no-text-inp bottom">

                                    <p>
                                        <label for="#"><span>-</span> עריכת הסכם וליווי משפטי-עורך דין:</label>
                                        <input type="text" name="support_lawyer_price" value="<?= !$support_lawyer ? $support_lawyer_price : "" ?>">
                                    </p>
                                    <p class="radio">
                                       <input name="support_lawyer" id="radio-21" type="radio" value="" <?= !$support_lawyer ? "checked='checked'": ""?>>
                                        <label for="radio-21"></label>
                                    </p>
                                    <p class="radio">
                                        <input name="support_lawyer" id="radio-22" type="radio" value="כולל"  <?= $support_lawyer=="כולל" ? "checked='checked'": ""?>>
                                        <label for="radio-22">כולל</label>
                                    </p>
                                    <p class="radio">
                                        <input name="support_lawyer" id="radio-23" type="radio" value="לא ידוע"  <?= $support_lawyer=="לא ידוע" ? "checked='checked'": ""?>>
                                        <label for="radio-23">לא ידוע</label>
                                    </p>
                                </div>

                                <div class="clearfix"></div>
                                <p class="selects ml">
                                    <label for="#"><span>-</span> העברת חשבונות:</label>
                                    <select name="account_transfer" id="#" >
                                        <option value="כולל" <?= $account_transfer=="כולל"?'selected="selected"':'' ?> >כולל</option>
                                        <option value="לא כולל" <?= $account_transfer=="לא כולל"?'selected="selected"':'' ?> >לא כולל</option>
                                        <option value="לא רלוונטי" <?= $account_transfer=="לא רלוונטי"?'selected="selected"':'' ?>>לא רלוונטי</option>
                                    </select>
                                </p>
                                <p class="selects">
                                    <label for="#"><span>-</span> קרן תחזוקה רב-שנתית:</label>
                                    <select name="long_term_fund_maintenance" id="#" >
                                        <option value="כולל" <?= $long_term_fund_maintenance=="כולל"?'selected="selected"':'' ?>>כולל</option>
                                        <option value="לא כולל" <?= $long_term_fund_maintenance=="לא כולל"?'selected="selected"':'' ?>>לא כולל</option>
                                        <option value="לא רלוונטי" <?= $long_term_fund_maintenance=="לא רלוונטי"?'selected="selected"':'' ?>>לא רלוונטי</option>
                                    </select>
                                </p>
                                <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

                                <input type="submit" class="button" value="גןללןדנכנכגב" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>  
        
        <script>
           jQuery(function($) {
                // $('.dropzone').on('dragover', function() {
                //     $(this).addClass('hover');
                // });

                // $('.dropzone').on('dragleave', function() {
                //     $(this).removeClass('hover');
                // });
                // $('.dropzone').each(function(){
                //     var _this = $(this);
                //     _thisInput = _this.children('input');
                    
                    
                //     _thisInput.on('change', function(e) {
                //         var file = this.files[0];
                //         console.log(1);
                //         _this.removeClass('hover');

                //         if (this.accept && $.inArray(file.type, this.accept.split(/, ?/)) == -1) {
                //             return alert('File type not allowed.');
                //         }

                //         _this.addClass('dropped');
                //         _this.children('img').remove();

                //         if ((/^image\/(gif|png|jpeg)$/i).test(file.type)) {
                //             var reader = new FileReader(file);

                //             reader.readAsDataURL(file);

                //             reader.onload = function(e) {
                //                 var data = e.target.result,
                //                     $img = $('<img />').attr('src', data).fadeIn();

                //                 _this.children('div').html($img);


                //             };
                //         } else {
                //             var ext = file.name.split('.').pop();

                //             _this.children('div').html(ext);
                //         }
                //     });
                // });

                //Dropezobes categories switcher
                $(function () {
                    $('#myTab first').tab('show');
                })

                //START DROPEZONE
                
                var drop = $("input");

                drop.on('dragenter', function (e) {
                    $(".drop").css({
                        "border": "4px dashed #09f",
                        "background": "rgba(0, 153, 255, .05)"
                    });
                    $(".cont").css({
                        "color": "#09f"
                    });
                }).on('dragleave dragend mouseout drop', function (e) {
                    $(".drop").css({
                        "border": "3px dashed #DADFE3",
                        "background": "transparent"
                    });
                    $(".cont").css({
                        "color": "#8E99A5"
                    });
                });



                function handleFileSelect(evt, lists) {
                    var files = evt.target.files; // FileList object

                    // Loop through the FileList and render image files as thumbnails.
                    for (var i = 0, f; f = files[i]; i++) {
                        // Only process image files.
                        if (!f.type.match('image.*')) {
                            continue;
                        }

                        var reader = new FileReader();

                        // Closure to capture the file information.
                        reader.onload = (function(theFile) {
                            return function(e) {
                                // Render thumbnail.
                                var span = document.createElement('span');
                                span.innerHTML = ['<p class="del">X</p>','<img class="thumb" src="', e.target.result,
                                                  '" title="', escape(theFile.name), '"/>'].join('');
                                                  // console.log(document.getElementById('list'));
                                                  // console.log( lists.parentNode.childNodes[3]);


                                lists.parentNode.childNodes[3].insertBefore(span, null);
                        
                            };
                        })(f);
                        
                        // Read in the image file as a data URL.
                        reader.readAsDataURL(f);
                    }
                }
                
                $('.files').change(function(event){
                    handleFileSelect(event, this);
                });   

                $("body").delegate(".del", "click", function(){
                    $(this).parent().remove()
                });
                //END DROPEZONE



                    google.maps.event.addDomListener(window, 'load', initMyMap);
                    function initMyMap() {
                        var mapsLatlng    = {lat:32.037140, lng:34.835411};
                        //map
                        var styleMap = [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"administrative.country","elementType":"geometry.fill","stylers":[{"visibility":"on"}]},{"featureType":"administrative.province","elementType":"labels.icon","stylers":[{"hue":"#ff0000"},{"visibility":"on"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#46bcec"},{"visibility":"on"}]}];

                       
                        /*map options*/
                        var mapsOptions = {
                            zoom: 10,   
                            center: mapsLatlng, 
                            styles: styleMap
                    };


                    var input = document.getElementById('title');
                    var autocomplete = new google.maps.places.Autocomplete(input);


                    if( $('#maps').length ){
                        var mapsElement = document.getElementById('maps');
                        var maps = new google.maps.Map(mapsElement, mapsOptions);
                        var marker = new google.maps.Marker({
                            position: mapsLatlng,
                            map: maps,
                            icon: directory_uri.stylesheet_directory_uri + '/img/geol.png',
                            title:  $("input[name='title']").val(),
                        });

                    
                        geocoder = new google.maps.Geocoder();
                        function codeAddress(){
                            //In this case it gets the address from an element on the page, but obviously you  could just pass it to the method instead
                            var address = document.getElementById("title").value;
                            if(address){
                                    geocoder.geocode( { 'address': address}, function(results, status) {
                                    if (status == google.maps.GeocoderStatus.OK) {
                                        //In this case it creates a marker, but you can get the lat and lng from the location.LatLng
                                        //console.log(results[0].geometry.location);
                                        maps.setCenter(results[0].geometry.location);
                                        marker = new google.maps.Marker({
                                            map: maps, 
                                            position: results[0].geometry.location,
                                            icon: directory_uri.stylesheet_directory_uri + '/img/geol.png',
                                        });
                                        maps.panTo(marker.getPosition());
                                    } 
                                });
                            }  
                        }

                        $("#title").change(function(argument) {
                            argument.preventDefault();
                            marker.setMap(null);
                            codeAddress();
                        });

                        $('#title').keydown(function(e){
                           
                            if(e.keyCode == 13)
                            {
                                e.preventDefault();
                                marker.setMap(null);
                                codeAddress();
                                return false;
                            }
                            return true;
                        });
                        var my_address= $("input[name='title']").val();
                        if(my_address){
                            marker.setMap(null);
                            codeAddress();
                        }
                        // var my_address=$("input[name='title']").val();
                        // if(my_address){
                        //     var e = jQuery.Event("keydown");
                        //     e.which = 13; // # Some key code value
                        //     $("#title").trigger(e);
                        // }  

                        // maps.addListener('click', function(event) {
                        //     var lat = event.latLng.lat();
                        //     var lng = event.latLng.lng();

                        //     console.log("Lat=" + lat + "; Lng=" + lng);
                        //     $("input[name='map_lat']").attr("value", lat);
                        //     $("input[name='map_lng']").attr("value", lng);
                        //     marker.setMap(null);
                        //     placeMarkerAndPanTo(event.latLng, maps);
                        // });

                        // function placeMarkerAndPanTo(latLng, map){
                        //     marker = new google.maps.Marker({
                        //         position: latLng,
                        //         map: maps,
                        //         icon: directory_uri.stylesheet_directory_uri + '/img/geol.png',
                        //         title:  $("input[name='title']").val()
                        //     });
                        //     map.panTo(latLng);
                        // }
                        // maps.event.addListener(mapsElement, "rightclick", function(event) {
                        //     var lat = event.latLng.lat();
                        //     var lng = event.latLng.lng();
                        //     // populate yor box/field with lat, lng
                        //     alert("Lat=" + lat + "; Lng=" + lng);
                        // });
                    }
                }

                jQuery(function($) {
                    $( "#categories" ).change(function(e) {
                        $(".properties .text").hide();
                        $("." + $(this).val()).show(); 
                    });
                }); 
            });
        </script>
<!-- end list content -->
<?php get_footer(); ?>