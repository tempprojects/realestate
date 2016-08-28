<?php 
//Redirect if login not admin
$required_capability = 'edit_others_posts';
$redirect_to = '';
function no_admin_init(){      
    // We need the config vars inside the function
    global $required_capability, $redirect_to;      
    // Is this the admin interface?
    if (
        // Look for the presence of /wp-admin/ in the url
        stripos($_SERVER['REQUEST_URI'],'/wp-admin/') !== false
        &&
        // Allow calls to async-upload.php
        stripos($_SERVER['REQUEST_URI'],'async-upload.php') == false
        &&
        // Allow calls to admin-ajax.php
        stripos($_SERVER['REQUEST_URI'],'admin-ajax.php') == false
    ) {         
        // Does the current user fail the required capability level?
        if (!current_user_can($required_capability)) {              
            if ($redirect_to == '') {
                $redirect_to = get_option('home'); 
            }              
            if(!current_user_can('administrator') && !is_admin()){
                wp_redirect($redirect_to,302);
            }
            // Send a temporary redirect
            //wp_redirect($redirect_to,302);            
        }           
    }       
}
// Add the action with maximum priority
add_action('init','no_admin_init',0);

function login_user(){
    // We need the config vars inside the function
    global $required_capability, $redirect_to;      
    // Is this the admin interface?
    $redirect_to = get_option('home');

    if(is_page('create') || is_page('update') || is_page('notes')){
        if(!current_user_can('administrator') && !current_user_can('author')) {
            wp_redirect($redirect_to,302);  
            die;
        }
    }

    if(is_page('update')){
        //check if isset id
        if(!isset($_REQUEST['id']) || !$_REQUEST['id']){
            wp_redirect($redirect_to,302);
            die;
        }
        else{
            $post = get_post( $_REQUEST['id'] );
            //if exist post in db
            if(!$post){
                wp_redirect($redirect_to,302);
                die;
            }
            else{
                //check post type
                if(get_post_type($_REQUEST['id'])!='post'){
                    wp_redirect($redirect_to,302);
                    die;
                }
                else{
                    //check if current user is author of the selected post
                    if($post->post_author!=get_current_user_id()){
                        wp_redirect($redirect_to,302);
                        die;
                    }
                }
            }
        }
    }

}
// Add the action with maximum priority
add_action('wp','login_user');



//Disable admin bar for all users except Adminisatratot(admin)
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar(){
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}

//ACF fields for user
if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_user',
        'title' => 'User',
        'fields' => array (
            array (
                'key' => 'field_5704bd374381d',
                'label' => 'Agent\'s picture',
                'name' => 'avatar',
                'type' => 'image',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_5704bd4b4381e',
                'label' => 'Agent\'s personal number#',
                'name' => 'agent\'s_personal_number',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5704bd964381f',
                'label' => 'Agent\'s phone 1',
                'name' => 'agents_phone_1',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5704bda043820',
                'label' => 'Agent\'s phone 2',
                'name' => 'agents_phone_2',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5704bf7943821',
                'label' => 'Agent\'s office phone',
                'name' => 'agents_office_phone',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5704bf9943822',
                'label' => 'Agent\'s working days',
                'name' => 'agents_working_days',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'ef_user',
                    'operator' => '==',
                    'value' => 'author',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
            array (
                array (
                    'param' => 'ef_user',
                    'operator' => '==',
                    'value' => 'administrator',
                    'order_no' => 0,
                    'group_no' => 1,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}
