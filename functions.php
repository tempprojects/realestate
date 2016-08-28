<?php
define('THEMROOT', get_stylesheet_directory_uri());
require_once 'includes/include_meta.php';
require_once 'includes/include_createOrUpdate.php';
require_once 'includes/include_user.php';
require_once 'includes/include_ajax.php';
require_once 'includes/include_notes_meta.php';

add_theme_support( 'post-thumbnails' );
function themeslug_enqueue_style(){
    if(is_single() || is_home() || is_search() || is_page_template('template-account_list.php') || is_page_template('template-notes.php')){
        wp_enqueue_style( 'myCss-jqueryui', THEMROOT.'/css/jquery-ui.css', false );
    }

    wp_enqueue_style( 'myCss-grid', THEMROOT.'/css/grid.css', false ); 
    wp_enqueue_style( 'myCss-style', THEMROOT.'/css/style.css', false ); 
    wp_enqueue_style( 'myCss-fonts', THEMROOT.'/css/fonts.css', false ); 

    //carousel
    if(is_home() || is_search() || is_page_template('template-account_list.php')){
        wp_enqueue_style( 'myCss-owlcarousel', THEMROOT.'/css/owl.carousel.css', false );
        wp_enqueue_style( 'myCss-owltheme', THEMROOT.'/css/owl.theme.css', false ); 
    }
    if( is_page_template('template-create.php') || is_home() || is_search() || is_page_template('template-account_list.php') || is_page_template('template-notes.php')){
        wp_enqueue_style( 'myCss-list', THEMROOT.'/css/list.css', false ); 
    }

    // is_single
    if(is_single()){
        wp_enqueue_style( 'myCss-carousel', THEMROOT.'/css/carousel.min.css', false );
    }
    
    //if is home 
    if(is_home() || is_search()){
        wp_enqueue_style( 'myCss-home', THEMROOT.'/css/owl.theme.css', false ); 
    }

    if(is_page_template('template-account_list.php')){
        wp_enqueue_style( 'myCss-timepicker', THEMROOT.'/css/jquery.timepicker.css', false ); 
    }
}

//filter for remove tag p ACF
remove_filter ('acf_the_content', 'wpautop');

function themeslug_enqueue_script(){
    
    if(!wp_script_is('jquery')){
        wp_enqueue_script( 'myJs-jquery', THEMROOT . '/js/jquery.min.js', false, '', false);
    }

    if(is_single() || is_home() || is_search() || is_page_template('template-account_list.php')|| is_page_template('template-notes.php')){
        wp_enqueue_script( 'myJs-jqueryui', THEMROOT . '/js/jquery-ui.js', false, '', false); 
    }
 if(is_single() || is_home() || is_search() || is_page_template('template-account_list.php')|| is_page_template('template-notes.php')){
        wp_enqueue_script( 'myJs-datepickerHe', THEMROOT . '/js/datepicker-he.js', false, '', false);
    }

    if(is_single()){
        wp_enqueue_script( 'myJs-jquerymobile', THEMROOT . '/js/jquery-mobile.min.js', false, '', false);
        wp_enqueue_script( 'myJs-ajaxsinglepage', THEMROOT . '/js/single-page.js', false, '', true );
        wp_localize_script( 'myJs-ajaxsinglepage', 'sendform', array(
            'ajax_url' => admin_url( 'admin-ajax.php' )
        ));
    }

    // if(is_front_page()){
    //     wp_enqueue_script( 'myJs-login', THEMROOT . '/js/login.js', false, '', true );
    //     wp_localize_script( 'myJs-login', 'sendform', array(
    //         'ajax_url' => admin_url( 'admin-ajax.php' )
    //     ));
    // }

    if(is_page_template('template-account_list.php')){
        wp_enqueue_script( 'myJs-booking_period', THEMROOT . '/js/booking_period.js', false, '', true );
        wp_localize_script( 'myJs-booking_period', 'sendform', array(
            'ajax_url' => admin_url( 'admin-ajax.php' )

        ));       
        wp_enqueue_script( 'myJs-login', THEMROOT . '/js/login.js', false, '', true );
    }

    wp_enqueue_script( 'myJs-modernizr',  THEMROOT . '/js/modernizr.js', false, '', false);

    //carouse for home
    if(is_home() || is_search() || is_page_template('template-account_list.php')){
        wp_enqueue_script( 'myJs-owlcarousel', THEMROOT . '/js/owl.carousel.js', false, '', false);   
    }

    if(is_page_template('template-create.php') || is_page_template('template-contacts.php') || is_single() || is_home() || is_search() || is_page_template('template-account_list.php')){
        wp_enqueue_script( 'myJs-googlemaps', 'https://maps.googleapis.com/maps/api/js??key=AIzaSyDoFR4O2S0D5Uebjtxa9hCQ3bx2oiIhZz4&amp;libraries=places', false, '', false);
    }

    wp_enqueue_script( 'myJs-common', THEMROOT . '/js/common.js', false, '', false);
    //add var directory_uri.stylesheet_directory_uri for using in common.js
    $wnm_custom = array( 'stylesheet_directory_uri' => get_stylesheet_directory_uri() );
    wp_localize_script( 'myJs-common', 'directory_uri', $wnm_custom );


    if(is_home() || is_single()){
        wp_enqueue_script( 'myJs-mail_modal', THEMROOT . '/js/mail_modal.js', false, '', true );
        wp_localize_script( 'myJs-mail_modal', 'sendform', array('ajax_url' => admin_url( 'admin-ajax.php' )));
    }

    //carousel
    if(is_single()){
        wp_enqueue_script( 'myJs-carousel', THEMROOT . '/js/carousel.js', false, '', false);  
    }
    //Login modal
    if(is_front_page()){
        wp_enqueue_script( 'myJs-home_page', THEMROOT . '/js/home_page.js', false, '', false);
        
    }

    if(is_page_template('template-account_list.php')){
        wp_enqueue_script( 'myJs-timepicker',THEMROOT . '/js/jquery.timepicker.js', false, '', false);
       // wp_enqueue_script( 'myJs-angular',THEMROOT . '/js/angular.min.js', false, '', false);
    }

    if(is_page_template('template-create.php')){
        wp_enqueue_script( 'myJs-bootstrap', THEMROOT.'/js/bootstrap.min.js', false, '', false); 
    }

}

add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_script' );

//add def and 
add_filter('script_loader_tag', 'add_async_attribute', 10, 2);
function add_async_attribute($tag, $handle) {
    $scripts_to_defer = array('myJs-jquery', 'myJs-jqueryui', 'myJs-datepickerHe', 'myJs-modernizr', 'myJs-owlcarousel', 'myJs-googlemaps', 'myJs-common', 'myJs-home_page', 'myJs-timepicker', 'myJs-login', 'myJs-angular', 'myJs-booking_period', 'myJs-mail_modal', 'myJs-bootstrap');
    foreach($scripts_to_defer as $defer_script){
        if($handle== $defer_script)
        {
            return str_replace( 'src', 'defer  src', $tag );
        }
    }
    return $tag;
}

//logo to the site
function themeslug_theme_customizer( $wp_customize ){
    $wp_customize->add_section( 'themeslug_logo_section' , array(
        'title'       => __( 'Logo', 'themeslug' ),
        'priority'    => 30,
        'description' => 'Upload a logo to replace the default site name and description in the header',
    ));

    $wp_customize->add_setting( 'themeslug_logo' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
        'label'    => __( 'Logo', 'themeslug' ),
        'section'  => 'themeslug_logo_section',
        'settings' => 'themeslug_logo',
    ) ) );
}
add_action( 'customize_register', 'themeslug_theme_customizer' );


//Create new page for admin panel
if (is_admin()){
    //Create page
    $new_page_title = 'Create New Real Esate';
    $new_page_content = '';
    $new_page_template = 'template-create.php'; //ex. template-custom.php. Leave blank if you don't want a custom page template.

    //don't change the code bellow, unless you know what you're doing

    $page_check = get_page_by_title($new_page_title);
    $new_page = array(
            'post_type' => 'page',
            'post_title' => $new_page_title,
            'post_name' => 'create',
            'post_content' => $new_page_content,
            'post_status' => 'publish',
            'post_author' => 1,
    );
    if(!isset($page_check->ID)){
            $new_page_id = wp_insert_post($new_page);
            if(!empty($new_page_template)){
                    update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
            }
    }

    //Update page
    $new_page_title = 'Update Real Esate';
    $new_page_content = '';
    $new_page_template = 'template-create.php'; //ex. template-custom.php. Leave blank if you don't want a custom page template.

    //don't change the code bellow, unless you know what you're doing
    $page_check = get_page_by_title($new_page_title);
    $new_page = array(
            'post_type' => 'page',
            'post_title' => $new_page_title,
            'post_name' => 'update',
            'post_content' => $new_page_content,
            'post_status' => 'publish',
            'post_author' => 1,
    );
    if(!isset($page_check->ID)){
        $new_page_id = wp_insert_post($new_page);
        if(!empty($new_page_template)){
            update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
        }
    };



    //Admin list Page
    $new_page_title = 'Account Real Estates List';
    $new_page_content = '';
    $new_page_template = 'template-account_list.php'; //ex. template-custom.php. Leave blank if you don't want a custom page template.

    //don't change the code bellow, unless you know what you're doing
    $page_check = get_page_by_title($new_page_title);
    $new_page = array(
            'post_type' => 'page',
            'post_title' => $new_page_title,
            'post_name' => 'account_list',
            'post_content' => $new_page_content,
            'post_status' => 'publish',
            'post_author' => 1,
    );
    if(!isset($page_check->ID)){
        $new_page_id = wp_insert_post($new_page);
        if(!empty($new_page_template)){
            update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
        }
    };


    //Admin list Page
    $new_page_title = 'Real estate notes';
    $new_page_content = '';
    $new_page_template = 'template-notes.php'; //ex. template-custom.php. Leave blank if you don't want a custom page template.

    //don't change the code bellow, unless you know what you're doing
    $page_check = get_page_by_title($new_page_title);
    $new_page = array(
            'post_type' => 'page',
            'post_title' => $new_page_title,
            'post_name' => 'notes',
            'post_content' => $new_page_content,
            'post_status' => 'publish',
            'post_author' => 1,
    );
    if(!isset($page_check->ID)){
        $new_page_id = wp_insert_post($new_page);
        if(!empty($new_page_template)){
            update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
        }
    };
}


add_action( 'after_setup_theme', 'afterSetupTheme' );
function afterSetupTheme(){
    
    wp_insert_term('Active', 'category', array(
        'description'=> 'לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית הועניב היושבב שערש שמחויט - שלושע ותלברו חשלו שעותלשך וחאית נובש ערששף. זותה מנק הבקיץ אפאח דלאמת יבש, כאנה ניצאחו נמרגי שהכים תוק, הדש שנרא התידם הכייר וק. לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית. סת אלמנקום ניסי נון ניבאה. דס איאקוליס וולופטה דיאם. וסטיבולום אט דולור, קראס אגת לקטוס וואל אאוגו וסטיבולום סוליסי טידום בעליק. לפרומי בלוף קינץ תתיח לרעח. לת צשחמי צש בליא, מנסוטו צמלח לביקו ננבי, צמוקו בלוקריה שיצמה ברורק. קונסקטוררדיפ1',
        'slug' => 'active',
    ));
    wp_insert_term('Frozen', 'category', array(
        'description'=> 'לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית הועניב היושבב שערש שמחויט - שלושע ותלברו חשלו שעותלשך וחאית נובש ערששף. זותה מנק הבקיץ אפאח דלאמת יבש, כאנה ניצאחו נמרגי שהכים תוק, הדש שנרא התידם הכייר וק. לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית. סת אלמנקום ניסי נון ניבאה. דס איאקוליס וולופטה דיאם. וסטיבולום אט דולור, קראס אגת לקטוס וואל אאוגו וסטיבולום סוליסי טידום בעליק. לפרומי בלוף קינץ תתיח לרעח. לת צשחמי צש בליא, מנסוטו צמלח לביקו ננבי, צמוקו בלוקריה שיצמה ברורק. קונסקטוררדיפ222',
        'slug' => 'frozen',
    ));
    wp_insert_term('Rented', 'category', array(
        'description'=> 'לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית הועניב היושבב שערש שמחויט - שלושע ותלברו חשלו שעותלשך וחאית נובש ערששף. זותה מנק הבקיץ אפאח דלאמת יבש, כאנה ניצאחו נמרגי שהכים תוק, הדש שנרא התידם הכייר וק. לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית. סת אלמנקום ניסי נון ניבאה. דס איאקוליס וולופטה דיאם. וסטיבולום אט דולור, קראס אגת לקטוס וואל אאוגו וסטיבולום סוליסי טידום בעליק. לפרומי בלוף קינץ תתיח לרעח. לת צשחמי צש בליא, מנסוטו צמלח לביקו ננבי, צמוקו בלוקריה שיצמה ברורק. קונסקטוררדיפ3',
        'slug' => 'rented',
    ));
    wp_insert_term('Rented not for preview', 'category',  array(
        'description'=> 'לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית הועניב היושבב שערש שמחויט - שלושע ותלברו חשלו שעותלשך וחאית נובש ערששף. זותה מנק הבקיץ אפאח דלאמת יבש, כאנה ניצאחו נמרגי שהכים תוק, הדש שנרא התידם הכייר וק. לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית. סת אלמנקום ניסי נון ניבאה. דס איאקוליס וולופטה דיאם. וסטיבולום אט דולור, קראס אגת לקטוס וואל אאוגו וסטיבולום סוליסי טידום בעליק. לפרומי בלוף קינץ תתיח לרעח. לת צשחמי צש בליא, מנסוטו צמלח לביקו ננבי, צמוקו בלוקריה שיצמה ברורק. קונסקטוררדיפ4',
        'slug' => 'rented_not_for_preview',
    ));
    wp_insert_term('Delete',  'category', array(
        'description'=> 'לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית הועניב היושבב שערש שמחויט - שלושע ותלברו חשלו שעותלשך וחאית נובש ערששף. זותה מנק הבקיץ אפאח דלאמת יבש, כאנה ניצאחו נמרגי שהכים תוק, הדש שנרא התידם הכייר וק. לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית. סת אלמנקום ניסי נון ניבאה. דס איאקוליס וולופטה דיאם. וסטיבולום אט דולור, קראס אגת לקטוס וואל אאוגו וסטיבולום סוליסי טידום בעליק. לפרומי בלוף קינץ תתיח לרעח. לת צשחמי צש בליא, מנסוטו צמלח לביקו ננבי, צמוקו בלוקריה שיצמה ברורק. קונסקטוררדיפ5',
        'slug' => 'delete',
    ));
    wp_insert_term('Archive', 'category', array(
        'description'=> 'לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית הועניב היושבב שערש שמחויט - שלושע ותלברו חשלו שעותלשך וחאית נובש ערששף. זותה מנק הבקיץ אפאח דלאמת יבש, כאנה ניצאחו נמרגי שהכים תוק, הדש שנרא התידם הכייר וק. לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית. סת אלמנקום ניסי נון ניבאה. דס איאקוליס וולופטה דיאם. וסטיבולום אט דולור, קראס אגת לקטוס וואל אאוגו וסטיבולום סוליסי טידום בעליק. לפרומי בלוף קינץ תתיח לרעח. לת צשחמי צש בליא, מנסוטו צמלח לביקו ננבי, צמוקו בלוקריה שיצמה ברורק. קונסקטוררדיפ6',
        'slug' => 'archive',
    ));
}

    function get_the_custom_excerpt($content, $cnt=300){
        if($content){
            $excerpt = strip_shortcodes($content);
            $excerpt = strip_tags($excerpt);
            $the_str = mb_substr($excerpt, 0, $cnt);
            $the_str = trim(preg_replace( '/\s+/', ' ', $the_str));
            return $the_str;
        }
    }
/**
    * Check if sting is jeson string
    * @param str $string 
    * @return bool
*/
function isJson($string) {
    json_decode($string);
    return (json_last_error() == JSON_ERROR_NONE);
}


/**
 * Join posts and postmeta tables for seeech by meta fields
*/
function meta_search_join( $join ) {
    global $wpdb;
    if(is_search()){    
        $join .=' LEFT JOIN '.$wpdb->postmeta. ' as roomspostmeta ON '. $wpdb->posts . '.ID = roomspostmeta.post_id ';
    }
    return $join;
}
add_filter('posts_join', 'meta_search_join' );

/**
 * Modify the search query with posts_where
 */
function meta_search_where( $where ) {
    global $pagenow, $wpdb;
    if (is_search()) {
        $where = preg_replace("/\s\(\'post\'\,\s\'page\'\,\s\'attachment\'\)/"," ('post')", $where );
        $rooms_quantity= $_REQUEST['rooms_quantity'];
        $address= $_REQUEST['s'];
        if($address){
            $where = preg_replace("/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "((".$wpdb->posts.".post_title LIKE '%" . $address . "%') AND (roomspostmeta.meta_key LIKE '%rooms_quantity%') AND (roomspostmeta.meta_value LIKE '%" . $rooms_quantity . "%')) AND (" . $wpdb->posts . ".ping_status LIKE 'open')", $where );    
        }
        else{
            $where = preg_replace("/\s*AND\s*" . $wpdb->posts . ".post_type\s*IN\s*\(\'post\'\)\s*/",
            " AND (" . $wpdb->posts . ".post_type IN ('post')) AND (roomspostmeta.meta_key LIKE '%rooms_quantity%') AND (roomspostmeta.meta_value LIKE '%" . $rooms_quantity . "%') AND (" . $wpdb->posts . ".ping_status LIKE 'open') ", $where );
        }
    }
    //var_dump($where);
        //die;
    return $where;
}
add_filter( 'posts_where', 'meta_search_where' );

/**
 * Prevent duplicates
 */
function meta_search_distinct( $where ) {
    global $wpdb;

    if (is_search()){
        return "DISTINCT";
    }
    return $where;
}
add_filter( 'posts_distinct', 'meta_search_distinct' );