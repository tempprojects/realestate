<?php 
    add_action( 'wp_ajax_single_sendform', 'single_sendform' );
    add_action( 'wp_ajax_nopriv_single_sendform', 'single_sendform' );

    function single_sendform()
    {  
        if($_POST['user_id']){
            $receiver = get_userdata($_POST['user_id'])->user_email;
            $from = "no-repeat@alscon-clients.com";
            $name = $_REQUEST['name'];
            $email = $_REQUEST['email'];
            $tel = $_REQUEST['tel'];
            $comment = $_REQUEST['message'];
            $permalik=$_REQUEST['permalik'];
           
            $message = "Theme: Reaponse website realestate allscon! Contacts: \nName: $name\nEmail: $email\nPhone number: $tel\nMessage: $comment\n <hr> \n\n Real Estate: $permalik";
            $headers = 'From: ' . $from . "\r\n";

            if(!mail($receiver, 'Request', $message, $headers)){
                echo "Failure sending mail";
            }
        }
        else{
            echo "Failure sending mail";
        }
        die;
    }

    add_action( 'wp_ajax_login_form', 'login_form' );
    add_action( 'wp_ajax_nopriv_login_form', 'login_form' );

    function login_form()
    {  
    	// First check the nonce, if it fails the function will break
	    check_ajax_referer( 'ajax-login-nonce', 'security' );

	    // Nonce is checked, get the POST data and sign user on
	    $info = array();
	    $info['user_login'] = $_POST['username'];
	    $info['user_password'] = $_POST['password'];
	    $info['remember'] = true;

	    $user_signon = wp_signon($info, false );
	    if ( is_wp_error($user_signon) ){
	        echo json_encode(array('loggedin'=>false, 'message'=>__('Wrong username or password.')));
	    } else {
	        echo json_encode(array('loggedin'=>true, 'message'=>__('Login successful, redirecting...'), 'redirect'=>get_permalink( get_page_by_path( 'account_list' ) ) ));
	    }
        die;
    }


    add_action( 'wp_ajax_save_period_booking', 'save_period_booking' );
    add_action( 'wp_ajax_nopriv_save_period_booking', 'save_period_booking' );
    
    function save_period_booking()
    {  
        $response=[];
        if(isset($_REQUEST['security_save_period_booking']) && wp_verify_nonce($_REQUEST['security_save_period_booking'],'save_period_booking') && $_REQUEST['id'] && $_REQUEST['from'] && $_REQUEST['to']){
            $post = get_post( $_REQUEST['id'] );
            $author_id=$post->post_author;

            if(get_current_user_id()==$author_id){
                $date = $_REQUEST['date'];
                $booking=get_post_meta($_REQUEST['id'], 'booking', true);
                $new_booking=[];
                if(isJson($booking)){
                    $new_booking=json_decode($booking, true);
                }


                $hours_to = (int)array_shift(explode(':', $_REQUEST['to']));
                $hours_from = (int)array_shift(explode(':', $_REQUEST['from']));

                if($hours_to==$hours_from ){
                    $response=['success'=>false, 'message'=>'Time tptions are equal'];
                }
                else{
                    if($hours_from>$hours_to){
                        //Swap two variables value without using third variable
                        $hours_from = $hours_from + $hours_to;
                        $hours_to = $hours_from - $hours_to;   
                        $hours_from = $hours_from - $hours_to;
                    }
                    
                    if(isset($new_booking[$date])){
                        unset($new_booking[$date]);    
                    }

                    for($i=$hours_from; $i< $hours_to; $i++){
                        $temp_hour=$i;
                        if($i<10){
                            $temp_hour="0" . $temp_hour;
                        }
                        $new_booking[$date][$temp_hour]=1;
                    }
                    update_post_meta( $_REQUEST['id'], 'booking', json_encode($new_booking));
                    $response=['success'=>true, 'message'=>json_encode($new_booking)];
                }
            }
            else{
                $response=['success'=>false, 'message'=>'You are not the post author!'];
            }
        }
        else{
            $response=['success'=>false, 'message'=>'Not enough parameters'];
        }
        echo json_encode($response);
        die;    
    }