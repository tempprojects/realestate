<?php
/*
 *Template Name: Notes Template
 */
?>
<?php get_header(); ?>
    <?php 
        $id = $_REQUEST['id']? $_REQUEST['id']: 0;
        $notes_recruitment_date = get_post_meta( $id, 'notes_recruitment_date', true);
        $notes_status_type =      get_post_meta( $id, 'notes_status_type', true);
        $notes_full_name =        get_post_meta( $id, 'notes_full_name', true);
        $notes_phone1 =           get_post_meta( $id, 'notes_phone1', true);
        $notes_address =          get_post_meta( $id, 'notes_address', true);
        $notes_phone2 =           get_post_meta( $id, 'notes_phone2', true);
        $notes_key_office =       get_post_meta( $id, 'notes_key_office', true);
        $notes_apartment =        get_post_meta( $id, 'notes_apartment', true);
        $notes_tenants =          get_post_meta( $id, 'notes_tenants', true);
        $notes_show_apartment =   get_post_meta( $id, 'notes_show_apartment', true);
        $notes_there_tenants =    get_post_meta( $id, 'notes_there_tenants', true);
        $notes_phone_tenant_1 =   get_post_meta( $id, 'notes_phone_tenant_1', true);
        $notes_phone_tenant_2 =   get_post_meta( $id, 'notes_phone_tenant_2', true);
        $notes_comments =         get_post_meta( $id, 'notes_comments', true);
        $notes_conditions =       get_post_meta( $id, 'notes_conditions', true);
        $notes_activist =         get_post_meta( $id, 'notes_activist', true);
    ?>

        <!-- padding from header and content -->
        <div class="height_block"></div>
        <!-- padding from header and content -->
        <!-- start list content -->

        <section class="wrapper personal privacy">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="pr-ap">
                            <a href="#" >כעהכהנ</a>
                            <a href="#" class="active">כעהכהנ</a>
                        </div>
                        <hr class="sline">
                        <h4>כעהכהנ</h4>
                        <form action="<?= get_the_permalink() ?>" method="post">
                            <?php wp_nonce_field( 'save_note', 'security_notes' ); ?>
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <div class="properties">
                                <div class="datepic hasDatepicker selects">
                                    <label for="#"><span>-</span> מועד גיוס נכס:</label>
                                    <input class="datepic" name="notes_recruitment_date" value="<?= $notes_recruitment_date ?>">
                                </div>
                                <p class="selects">
                                    <label for="#"><span>-</span> סטאטוס מסוג:</label>
                                    <select name="notes_status_type" id="#">
                                        <option value="מוקפא" <?= $notes_status_type=="מוקפא"?'selected="selected"':'' ?>>מוקפא</option>
                                        <option value="פעיל" <?= $notes_status_type=="פעיל"?'selected="selected"':'' ?>>פעיל</option>
                                        <option value="הושכר" <?= $notes_status_type=="הושכר"?'selected="selected"':'' ?>>הושכר</option>
                                        <option value="הושכר לא לצפיה" <?= $notes_status_type=="הושכר לא לצפיה"?'selected="selected"':'' ?>>הושכר לא לצפיה</option>
                                        <option value="למחוק" <?= $notes_status_type=="למחוק"?'selected="selected"':'' ?>>למחוק</option>
                                        <option value="ארכיון" <?= $notes_status_type=="ארכיון"?'selected="selected"':'' ?>>ארכיון</option>
                                    </select>
                                </p>
                                <p>
                                    <label for="#"><span>-</span> שם מלא:</label>
                                    <input type="text" name="notes_full_name" value="<?= $notes_full_name ?>">
                                </p>
                                <p>
                                    <label for="#"><span>-</span> טלפון 1:</label>
                                    <input type="text" name="notes_phone1" value="<?= $notes_phone1 ?>">
                                </p>
                                <p>
                                    <label for="#"><span>-</span> כתובת:</label>
                                    <input type="text" name="notes_address" value="<?= $notes_address ?>">
                                </p>
                                <p>
                                    <label for="#"><span>-</span> טלפון 2:</label>
                                    <input type="text" name="notes_phone2" value="<?= $notes_phone2 ?>">
                                </p>
                                
                            </div>


                            

                            <div class="select-radio no-text-inp">
                                <p>
                                    <label for="#"><span>-</span> דירה:</label>
                                </p>
                                <p class="radio">
                                    <input name="notes_apartment" id="radio-1" type="radio" value="דירה מאוכלסת"  <?= $notes_apartment=="דירה מאוכלסת" ? "checked='checked'": ""?>>
                                    <label for="radio-1">דירה מאוכלסת</label>
                                </p>
                                <p class="radio">
                                    <input name="notes_apartment" id="radio-2" type="radio" value="דירה ריקה"  <?= $notes_apartment=="דירה ריקה" ? "checked='checked'": ""?>>
                                    <label for="radio-2">דירה ריקה</label>
                                </p>
                                
                            </div>
                            <div class="select-radio no-text-inp">
                                <p>
                                    <label for="#"><span>-</span> מפתח במשרד:</label>
                                </p>
                                <p class="radio">
                                    <input name="notes_key_office" value="כן" id="radio-3" type="radio" <?= $notes_key_office=="כן" ? "checked='checked'": ""?>>
                                    <label for="radio-3">כן</label>
                                </p>
                                <p class="radio">
                                    <input name="notes_key_office" value="לא" id="radio-4" type="radio" <?= $notes_key_office=="לא" ? "checked='checked'": ""?>>
                                    <label for="radio-4">לא</label>
                                </p>
                            </div>
                            <div class="select-radio no-text-inp">
                                <p>
                                    <label for="#"><span>-</span> דיירים של המשרד / דיירים ותיקים של המשכיר:</label>
                                </p>
                                <p class="radio">
                                    <input name="notes_tenants" value="דיירים של המשרד" id="radio-5" type="radio"  <?= $notes_tenants=="דיירים של המשרד" ? "checked='checked'": ""?>>
                                    <label for="radio-5">דיירים של המשרד</label>
                                </p>
                                <p class="radio">
                                    <input name="notes_tenants" value="דיירים ותיקים של המשכיר" id="radio-6" type="radio"  <?= $notes_tenants=="דיירים ותיקים של המשכיר" ? "checked='checked'": ""?>>
                                    <label for="radio-6">דיירים ותיקים של המשכיר</label>
                                </p>
                            </div>
                            <label for="#"><span>-</span> מועד כניסה:</label>
                            <p class="data">12.07.1994</p>
                            <label for="#"><span>-</span> מתי ניתן להראות את הדירה:</label>
                            <textarea name="notes_show_apartment" id="#" cols="30" rows="10"><?= $notes_show_apartment ?></textarea>
                            
                            
                            <div class="properties">
                                <p>
                                    <label for="#"><span>-</span> שם דיירים:</label>
                                    <input type="text" name="notes_there_tenants" value="<?= $notes_there_tenants ?>">
                                </p>
                                <p>
                                    <label for="#"><span>-</span> טלפון 1 דיירים:</label>
                                    <input type="text" name="notes_phone_tenant_1" value="<?= $notes_phone_tenant_1 ?>">
                                </p>
                                <p>
                                    <label for="#"><span>-</span> טלפון 2 דיירים:</label>
                                    <input type="text" name="notes_phone_tenant_2" value="<?= $notes_phone_tenant_2 ?>">
                                </p>

                            </div>
                            <label for="#"><span>-</span> הערות:</label>
                            <textarea name="notes_comments" id="#" cols="30" rows="10"><?= $notes_comments ?></textarea>
                            <label for="#"><span>-</span> תנאים:</label>
                            <textarea name="notes_conditions" id="#" cols="30" rows="10"><?= $notes_conditions ?></textarea>
                            <label for="#"><span>-</span> פעילת:</label>
                            <textarea name="notes_activist" id="#" cols="30" rows="10"><?= $notes_activist ?></textarea>
                            
                            <input type="submit" class="button" value="גןללןדנכנכגב">
                            
                        </form>
                    </div>
                </div>
            </div>
        </section>  

        <!-- end list content -->

        <script>
            jQuery(document).ready(function($){
                $('.datepic').datepicker();
                $(window).load(function() {
                    $('#ui-datepicker-div').addClass('select_date add');
                })
            });
          

        </script>

<?php get_footer(); ?>