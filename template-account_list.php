<?php
/*
 *Template Name: Admin List template
 */
?>
<?php get_header(); 
    if(current_user_can('administrator') || current_user_can('author')):
?>
    
    <!-- padding from header and content -->
    <div class="height_block"></div>
    <!-- padding from header and content -->
    <!-- start list content -->
    <section class="appart">
        <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <a href="<?= get_permalink( get_page_by_path( 'create' ) )?>" class="button add-obj">
                    Add Property
                </a>
                <div class="pr-ap">
                    <a href="#" class="active">כעהכהנ</a>
                </div>
                <hr class="sline">
            </div>
        </div>
    <?php 
        $args = array(
            'post_type' => 'post',
            'author'        =>  get_current_user_id(),
            'orderby'       =>  'post_date',
            'order'         =>  'ASC',
            'posts_per_page' => 6
        );
        $the_query = new WP_Query( $args );
        if ( $the_query->have_posts() ):
            while ( $the_query->have_posts() ):
                $the_query->the_post();
                $post_images = get_post_meta(get_the_ID(), 'post_images', true);
                
                if(isJson($post_images)){
                    $post_images_encode=json_decode($post_images, true);
                }
                else{
                    $post_images_encode="";
                } 

                $my_img="";
                if($post_images_encode){
                    foreach($post_images_encode as $img){
                        if($img){
                            $my_img=$img;
                            break;
                        }
                    }
                }
                $categories = wp_get_post_categories(get_the_ID(), array('fields' => 'all'));

     ?>
    
            <div class="row the_item">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h4><a href="<?= get_the_permalink()?>"><?= get_the_title()?></a></h4>
            </div>
                    <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right" style="display: none;">
                        <div class="select_date select_date_1"></div>
                        <ul class="booked">
                            <li>Available</li>
                            <li>Booked</li>
                        </ul>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12" style="display: none;">
                        <div class="visiting">
                            <div class="visiting-date"></div>
                            <form action="" class='form_reserve form_cont'>
                                <p class="visitor"><span>(5)</span> Visitor</p>
                                <div class="timeline">
                                    <span><input type="radio" name="time_reserve" id="time_1" disabled><label for="time_1">8:00</label></span>
                                    <span><input type="radio" name="time_reserve" id="time_2" disabled><label for="time_2">9:00</label></span>
                                    <span><input type="radio" name="time_reserve" id="time_3" disabled><label for="time_3">10:00</label></span>
                                    <span><input type="radio" name="time_reserve" id="time_4" disabled><label for="time_4">11:00</label></span>
                                    <span><input type="radio" name="time_reserve" id="time_5"><label for="time_5">12:00</label></span>
                                    <span><input type="radio" name="time_reserve" id="time_6"><label for="time_6">13:00</label></span>
                                    <span><input type="radio" name="time_reserve" id="time_7"><label for="time_7">14:00</label></span>
                                    <span><input type="radio" name="time_reserve" id="time_8"><label for="time_8">15:00</label><i class="user-count">6</i></span>
                                    <span><input type="radio" name="time_reserve" id="time_9" ><label for="time_9">16:00</label></span>
                                    <span><input type="radio" name="time_reserve" id="time_10"><label for="time_10">17:00</label></span>
                                    <span><input type="radio" name="time_reserve" id="time_11"><label for="time_11">18:00</label></span>
                                    <span><input type="radio" name="time_reserve" id="time_12"><label for="time_12">19:00</label></span>
                                    <span><input type="radio" name="time_reserve" id="time_13"><label for="time_13">20:00</label></span>
                                    <span><input type="radio" name="time_reserve" id="time_14"><label for="time_14">21:00</label></span>
                                    <span><input type="radio" name="time_reserve" id="time_15"><label for="time_15">22:00</label></span>
                                </div>

                                <div class="content">
                                    <img src="<?= THEMROOT?>/img/slider-img-1.png" alt="">
                                    <div class="description-real-estate ">
                                        <p class="nombe-real-estate">#12546</p>
                                        <p class="name-real-estate">מידע נוסף</p>
                                    </div>  
                                </div>

                                    <div class="slider-visiting">
                                        <div>
                                            <p><span>Ann Poterw</span> :Client’s name</p>
                                            <p>12345667-545 <span>Client’s phone: </span> </p>
                                            <p><span>ann.poterw@gmail.com</span> :Client’s e-mail</p>
                                        </div>
                                        <div>
                                            <p><span>Ann Poterw</span> :Client’s name</p>
                                            <p>12345667-545 <span>Client’s phone: </span> </p>
                                            <p><span>ann.poterw@gmail.com</span> :Client’s e-mail</p>
                                        </div>
                                        <div>
                                            <p><span>Ann Poterw</span> :Client’s name</p>
                                            <p>12345667-545 <span>Client’s phone: </span> </p>
                                            <p><span>ann.poterw@gmail.com</span> :Client’s e-mail</p>
                                        </div>
                                        <div >
                                            <p><span>Ann Poterw</span> :Client’s name</p>
                                            <p>12345667-545 <span>Client’s phone:</span> </p>
                                            <p><span>ann.poterw@gmail.com</span> :Client’s e-mail</p>
                                        </div>
                                        <div>
                                            <p><span>Ann Poterw</span> :Client’s name</p>
                                            <p>12345667-545 <span>Client’s phone:</span> </p>
                                            <p><span>ann.poterw@gmail.com</span> :Client’s e-mail</p>
                                        </div>
                                    </div>
                            </form>
                            <b class="loading"></b>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
                        <div class="object-img">
                            <img src="<?= $my_img?$my_img:(THEMROOT."/img/object-img.png") ?>" alt="">
                            <h5 class="block"><?= $categories[0]->name ?></h5>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 pull-left">
                        <div class="description-object">
                            <h5 class="name-object"><a href="<?= get_the_permalink()?>">מידע נוסף</a></h5>
                            <ul>
                                <li><a href="<?= get_permalink( get_page_by_path( 'update' ) ) ?>?id=<?= get_the_ID(); ?>" class="button"><i class="icon-keys"></i></a></li>
                                <li><a href="<?= get_permalink( get_page_by_path( 'notes' ) ) ?>?id=<?= get_the_ID(); ?>" class="button"><i class="icon-wrench"></i></a></li>
                            </ul>
                            <p class="text-object"><?=  get_the_custom_excerpt(get_post_meta(get_the_ID(), "desc_apartment", true), 800)?></p>
                            <form class="save_period_booking" method="post">
                                <div class="container-detpic">
                                    <input name = "date" class="datepic">
                                </div>
                                <div class="time">
                                    <div ng-controller="OpController">
                                        <div>
                                            <label>Time</label>
                                            <input ng-model="op.ma[0].van" name="from" type="text" class="scrolltime time ui-timepicker-input" autocomplete="off">-<input name="to" ng-model="op.ma[0].tot" type="text" class="scrolltime time ui-timepicker-input" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="<?= get_the_ID() ?>">
                                <?php wp_nonce_field( 'save_period_booking', 'security_save_period_booking' ); ?>
                                <input type="submit" class="button save" value="Save">
                            </form>
                        </div>
                    </div>
                   
                </div>
 <hr class="sline mt-mb">
        <?php endwhile; endif;?>
        </div>
    </section>
<?php endif; 
  if(!current_user_can('administrator') && !current_user_can('author')):       
?>

    <!--START MODAL-->
    <div class="modal log-in" style="display: block">
        <div class="block-modal">
            <p class="title">Log in</p>
            <form id="login_form" action="#" method="post">
                <label for=""><span>-</span> Username<input name="username" type="text" required></label>
                <label for=""><span>-</span> Password<input name="password" type="password" required></label>
                <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
                <input type="submit" class="button" value="גןללןדנכנכגב">
                <div id="message" style="color: red; display: none;"></div>
            </form>
        </div>
    </div>  
<?php endif; ?>

    <script>

    jQuery( document ).ready(function($) {
        //$(".the_item").each(function(argument) {
           
        //});
      
        $('.scrolltime').timepicker({ 
            'scrollDefault': 'now', 
            'timeFormat': 'H:i',
            'step': 60
        });
        
        // var myApp = angular.module('myApp',[]);
        // myApp.controller('OpController', ['$scope',  function($scope){
        //     $scope.greeting = 'Hola!';
        //     $scope.op = {
        //         ma : [{
        //             van: '01:00',
        //             tot: '02:00'
        //         }]
        //     }
        // }]); 
        // $('#ui-datepicker-div').addClass('select_date add');
        $(window).load(function() {
                $('#ui-datepicker-div').addClass('select_date add');
        })

        $(function() {
            $('.datepic').datepicker();
        });

        
        
        // $.datepicker.setDefaults( $.datepicker.regional[ "he" ] );
        // $( ".select_date_1" ).datepicker({
        //     showOtherMonths: true,
        //     selectOtherMonths: true,
        //     dateFormat: 'd M yy',
        //     minDate: 0,
        //     onSelect: function (date) {
        //         var selectDate = date;
        //         $('.visiting-date').html('');
        //         $('.visiting-date').html(selectDate);
        //         $('.visiting').hide();
        //         $('.visiting').show(function(){
                    
        //         });
        //     }
        // });
        // var owl = $('.slider-visiting');
        // owl.owlCarousel({
        //     navigation: true,
        //     pagination: false,
        //     slideSpeed: 600,
        //     paginationSpeed: 800,
        //     singleItem: true,
        //     navigationText: false,
        //     addClassActive: true,
        //     autoPlay: false,
        // });
        
        // setTimeout(function(){$('.loading').hide('fast')},3000);
        
        // //OPEN MENU 
        // $('.user-count').hide();
        // var userCount = 1;

        // $(".timeline label").each(function() {
        //     $(this).click(function(){
        //         if (userCount) {
        //             $(this).siblings(".user-count").show();
        //             userCount = 0;
        //         } else {
        //             $(this).siblings(".user-count").hide();
        //             userCount = 1;
        //         }
        //     });
        // });
            
        
        
            
    })
            
        </script>
        <style type="text/css">
        .object-img img{
            max-height: 300px;
        }
        </style>
<?php get_footer(); ?>