<?php 
    function save_notes_meta()
    {
        if (!(empty($_POST['security_notes']) || empty($_POST['id']) || empty($_POST['notes_phone1']) || !get_current_user_id() || !wp_verify_nonce($_POST['security_notes'],'save_note')))
        {
            $id=$_POST['id'];
            $author_id=0;

            if($id){
                //echo "id: ". $id . '<br>'; 
                $post = get_post( $id );
                $author_id=$post->post_author;
            }
            
            // echo $author_id . "<br>";
            // echo get_current_user_id();
            // die;

            //Check if user is author for current post
            if($id && get_current_user_id()==$author_id){
                // echo "die";
                // die;
                $meta_fields=[  'notes_recruitment_date',
                                'notes_status_type',     
                                'notes_full_name',       
                                'notes_phone1',          
                                'notes_address',         
                                'notes_phone2',          
                                'notes_key_office',      
                                'notes_apartment',       
                                'notes_tenants',         
                                'notes_show_apartment',  
                                'notes_there_tenants',   
                                'notes_phone_tenant_1',  
                                'notes_phone_tenant_2',  
                                'notes_comments',        
                                'notes_conditions',      
                                'notes_activist',            
                    ];
                shortSaveMete($id, $meta_fields, false);
            }
            wp_redirect( (get_page_by_path( 'account_list' )->guid) );
            exit;
        }
        
        
    }
    add_action( 'init', 'save_notes_meta' );
?>