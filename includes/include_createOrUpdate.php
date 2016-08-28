<?php 
if(isset($_POST['createorupdateid']) && is_user_logged_in() && isset($_POST['title']) && $_POST['title']){
    if ( ! function_exists( 'wp_handle_upload' ) ) {
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
    }

    $post_id=$_POST['createorupdateid'];

    //get author id
    $author_id=0;
    if($post_id){
        $post = get_post( $post_id );
        $author_id=$post->post_author;
    }
    

    if(!$post_id || get_current_user_id()==$author_id){
        $postarr=array( "ID"=>$post_id,
                    "post_author"=>get_current_user_id(),
                    "post_title"=>$_POST['title'],
                    "post_type"=>"post",
                    'post_status'=> 'publish',
        );
        //save images

     
        $new_post_id= wp_insert_post($postarr);
        //echo $_POST['categories'] . "<br>";
        wp_remove_object_terms( $new_post_id, 'Uncategorized', 'category' );
        $idObj = get_category_by_slug($_POST['categories']);
        //var_dump($idObj); 
        //echo  "<br>";
        $cat_id = $idObj->term_id;
        wp_set_post_categories( $new_post_id, $cat_id, true);
        //echo  $cat_id . "<br>";
       // var_dump( wp_set_post_categories( $new_post_id, $cat_id, true));
        //echo "<br>";
        //die;

        saveMetaFields($new_post_id);
        $uploadedfile = $_FILES['post_images'];
        $new_post_images=[];
        if ( $_FILES && $_FILES["post_images"]){
            $files = $_FILES["post_images"];  
            foreach ($files['name'] as $key => $value) {      
                //if has images
                if($value){
                    //Loop of images
                    foreach ($value as $k=>$v) {
                        $file = array(
                            'name' => $files['name'][$key][$k],
                            'type' => $files['type'][$key][$k], 
                            'tmp_name' => $files['tmp_name'][$key][$k], 
                            'error' => $files['error'][$key][$k],
                            'size' => $files['size'][$key][$k]
                        ); 
                        // var_dump($file);
                        // die;
                        $url = fileUploader($file);
                        if($url){
                            $new_post_images[$key][$k]=$url;
                        }
                        else{
                            $new_post_images[$key][$k]="";   
                        }
                    }    
                }
                // if ($files['name'][$key]) { 
                //     $file = array( 
                //         'name' => $files['name'][$key],
                //         'type' => $files['type'][$key], 
                //         'tmp_name' => $files['tmp_name'][$key], 
                //         'error' => $files['error'][$key],
                //         'size' => $files['size'][$key]
                //     ); 
                // }
                // $url = fileUploader($file);
                // if($url){
                //     $new_post_images[$key]=$url;
                // }
                // else{
                //     $new_post_images[$key]="";   
                // }
            }
        }

        //add images to the existing images

        if($new_post_images){
            $post_images=get_post_meta( $new_post_id, 'post_images', true);
            if(isJson($post_images)){
                $old_post_images=json_decode($post_images, true);
            }
            else{
                $old_post_images=["", "", "", ""];
            }
            foreach ($new_post_images as $key => $value) {
                if(!$value){
                    if(isset($old_post_images[$key])){
                        if($old_post_images[$key]!=""){
                            $new_post_images[$key]=$old_post_images[$key];
                        } 
                    }
                }
            }
            $post_images=json_encode($new_post_images);
            update_post_meta( $new_post_id, 'post_images',  $post_images);
        }

        // if($new_post_images){
        //     $post_images=get_post_meta( $new_post_id, 'post_images', true);
        //     if(isJson($post_images)){
        //         $old_post_images=json_decode($post_images, true);
        //     }
        //     else{
        //         $old_post_images=["", "", "", ""];
        //     }
        //     foreach ($new_post_images as $key => $value) {
        //         if(!$value){
        //             if(isset($old_post_images[$key])){
        //                 if($old_post_images[$key]!=""){
        //                     $new_post_images[$key]=$old_post_images[$key];
        //                 } 
        //             }
        //         }
        //     }
        //     $post_images=json_encode($new_post_images);
        //     update_post_meta( $new_post_id, 'post_images',  $post_images);
        // }



    
    }
    
    //redirect to update page of this post
    wp_redirect( (get_page_by_path( 'account_list' )->guid) );
    exit;
}


/**
    * This method is save images
    * @param array $uploadedfile 
    * @return mixed
*/
function fileUploader($uploadedfile){
    $upload_overrides = array( 'test_form' => false );

    $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );

    if ( $movefile && ! isset( $movefile['error'] ) ) {
        return $movefile['url'];
    } else {
        /**
         * Error generated by _wp_handle_upload()
         * @see _wp_handle_upload() in wp-admin/includes/file.php
         */
        return false;
    }
}

/**
    *  This method is save meta field of current post
    * @param int $new_post_id 
    * @return bool
*/
function saveMetaFields($new_post_id)
{

     $meta_fields=[ ['apartment_condition'=>9, 'default'=>''],
                    ['water_heating_system'=>4, 'default'=>''],
                    ['wind_directions'=>4, 'default'=>''],
                    ['parking'=>0, 'default'=>''], //if 0 it meens that parameter has name without nomber ['i'] example: parking
                    'facebook_event',
                    'desc_apartment',
                    'contract_detail',
                    'pets',
                    'closed_parking',
                    'conditioners',
                    'pillars',
                    'above_shop',
                    'parking_price',
                    'air',
                    'air_con_sleeping_room',
                    'garden',
                    'garden_size',
                    'fence_garden',
                    'suitable_roommates',
                    'warehouse',
                    'sun_balcony',
                    'balcony_size',
                    'bars',
                    'gas_system',
                    'property_type',
                    'rooms_quantity',
                    'apartment_size',
                    'floor',
                    'from_x_floors',
                    'last_flor',
                    'elevator',
                    'safety_room',
                    // 'map_address',
                    //Begin second section 
                    ['period'=>4], //if >0 it meens that parameter has many names with number ['i'] example: period[0], period[1]
                    ['period_price'=>4], 
                    'building_comission',
                    'building_comission_price',
                    'rent_management_price',
                    'rent_management',
                    'property_tax_price',
                    'property_tax',
                    'insurance_price',
                    'insurance',
                    'maintenance_hotline',
                    'support_lawyer_price',
                    'support_lawyer',
                    'account_transfer',
                    'long_term_fund_maintenance',
                ]; 
    shortSaveMete($new_post_id, $meta_fields, false);
    return true;
}