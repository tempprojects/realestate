<?php
/*
Add meta boxes to the post
 */
add_action('add_meta_boxes', 'custom_add_meta_box');

function custom_add_meta_box()
{
    add_meta_box(
    'posts',        //ID
    'Settings',  //Title
    'custom_display_meta_box',  //Callback
    'post',                     //Targeted post type
    'normal'
    );
}

function custom_display_meta_box($post)
{   
    $facebook_event = get_post_meta( $post->ID, 'facebook_event', true);
    $desc_apartment = get_post_meta( $post->ID, 'desc_apartment', true);
    $contract_detail = get_post_meta( $post->ID, 'contract_detail', true);
    $pets = get_post_meta( $post->ID, 'pets', true);
    $closed_parking = get_post_meta( $post->ID, 'closed_parking', true);
    $conditioners = get_post_meta( $post->ID, 'conditioners', true);
    $pillars =  get_post_meta( $post->ID, 'pillars', true);
    $above_shop =  get_post_meta( $post->ID, 'above_shop', true);
    $parking_price =  get_post_meta( $post->ID, 'parking_price', true);
    $air =  get_post_meta( $post->ID, 'air', true);
    $air_con_sleeping_room =  get_post_meta( $post->ID, 'air_con_sleeping_room', true);

    for ($i=0; $i<9; $i++) {
        $apartment_condition[$i]=get_post_meta( $post->ID, 'apartment_condition['. $i .']', true);
    }

    $garden =  get_post_meta( $post->ID, 'garden', true);
    $garden_size =  get_post_meta( $post->ID, 'garden_size', true);
    $fence_garden =  get_post_meta( $post->ID, 'fence_garden', true);
    $suitable_roommates =  get_post_meta( $post->ID, 'suitable_roommates', true);
    $warehouse =  get_post_meta( $post->ID, 'warehouse', true);
    $sun_balcony =  get_post_meta( $post->ID, 'sun_balcony', true);
    $balcony_size =  get_post_meta( $post->ID, 'balcony_size', true);
    $bars =  get_post_meta( $post->ID, 'bars', true);


    for ($i=0; $i<4; $i++) {
        $water_heating_system[$i]=get_post_meta( $post->ID, 'water_heating_system['. $i .']', true);
    }
    for ($i=0; $i<4; $i++) {
        $wind_directions[$i]=get_post_meta( $post->ID, 'wind_directions['. $i .']', true);
    }

    $gas_system =  get_post_meta( $post->ID, 'gas_system', true);
    $parking =  get_post_meta( $post->ID, 'parking', true);
    $property_type =  get_post_meta( $post->ID, 'property_type', true);
    $rooms_quantity =  get_post_meta( $post->ID, 'rooms_quantity', true);
    $apartment_size =  get_post_meta( $post->ID, 'apartment_size', true);
    $floor =  get_post_meta( $post->ID, 'floor', true);
    $from_x_floors =  get_post_meta( $post->ID, 'from_x_floors', true);
    $last_flor =  get_post_meta( $post->ID, 'last_flor', true);
    $elevator =  get_post_meta( $post->ID, 'elevator', true);
    $safety_room =  get_post_meta( $post->ID, 'safety_room', true);
    // $map_address =   get_post_meta($post->ID, 'map_address', true);


    //second section
    for ($i=0; $i<4; $i++) {
        $period[$i]=get_post_meta( $post->ID, 'period['. $i .']', true);
        $period_price[$i]=get_post_meta( $post->ID, 'period_price['. $i .']', true);  
    }

    $building_comission_price=get_post_meta( $post->ID, 'building_comission_price', true);
    $building_comission=get_post_meta( $post->ID, 'building_comission', true);
    $rent_management_price=get_post_meta( $post->ID, 'rent_management_price', true);
    $rent_management=get_post_meta( $post->ID, 'rent_management', true);
    $property_tax_price=get_post_meta( $post->ID, 'property_tax_price', true);
    $property_tax=get_post_meta( $post->ID, 'property_tax', true);
    $insurance_price=get_post_meta( $post->ID, 'insurance_price', true);
    $insurance=get_post_meta( $post->ID, 'insurance', true);
    $support_lawyer_price=get_post_meta( $post->ID, 'support_lawyer_price', true);
    $support_lawyer=get_post_meta( $post->ID, 'support_lawyer', true);
    $maintenance_hotline=get_post_meta( $post->ID, 'maintenance_hotline', true);
    $account_transfer=get_post_meta( $post->ID, 'account_transfer', true);
    $long_term_fund_maintenance=get_post_meta( $post->ID, 'long_term_fund_maintenance', true);
    
    //Security check
    wp_nonce_field('portfolio_meta_nonce', 'portfolio_nonce');
    
    ?>

    <p>
        <label for="facebook_event">Facebook event</label>
        <input class = "widefat" name="facebook_event" id="facebook_event" rows="5" value="<?php echo $facebook_event; ?>">
    </p>
    <p>
        <label for="desc_apartment">Description Apartment (תיאור דירה)</label>
        <textarea class = "widefat" name="desc_apartment" id="desc_apartment" rows="5"><?php echo $desc_apartment; ?></textarea>
    </p>
     <p>
        <label for="contract_detail">Summary details of the contract (סיכום פרטי החוזה)</label>
        <textarea class = "widefat" name="contract_detail" id="contract_detail" rows="5"><?php echo $contract_detail; ?></textarea>
    </p>
    <p>
        <label for="pets">Suitable for animals (בעלי חיים:)</label>
        <select name="pets" class = "widefat" id="pets">
            <option class = "pets" value="כן" <?= $pets=="כן"?'selected="selected"':'' ?>>כן</option>
            <option class = "pets" value="לא" <?= $pets=="לא"?'selected="selected"':'' ?>>לא</option>
        </select>
    </p>
     <p>
        <label for="closed_parking">Closed parking space(קירוי חניה:)</label>
        <select name="closed_parking" class = "widefat" id="closed_parking">
            <option class = "closed_parking" value="כן" <?= $closed_parking=="כן"?'selected="selected"':'' ?>>כן</option>
            <option class = "closed_parking" value="לא" <?= $closed_parking=="לא"?'selected="selected"':'' ?>>לא</option>
        </select>
    </p>
     <p>
        <label for="conditioners">Number of air conditioners in bedrooms (מספר מזגנים בחדרי שינה:)</label>
        <input class = "widefat" name="conditioners" id="conditioners" value="<?php echo $conditioners; ?>" pattern="[\d]{0,2}">
    </p>
    <p>
        <label for="pillars">Floor above pillars(מעל קומת עמודים:)</label>
        <select name="pillars" class = "widefat" id="pillars">
            <option class = "pillars" value="כן" <?= $pillars=="כן"?'selected="selected"':'' ?>>כן</option>
            <option class = "pillars" value="לא" <?= $pillars=="לא"?'selected="selected"':'' ?>>לא</option>
        </select>
    </p>
     <p>
        <label for="above_shop">Above shop (מעל קומת חנויות:)</label>
         <select name="above_shop" class = "widefat" id="above_shop">
            <option class = "above_shop" value="כן" <?= $above_shop=="כן"?'selected="selected"':'' ?>>כן</option>
            <option class = "above_shop" value="לא" <?= $above_shop=="לא"?'selected="selected"':'' ?>>לא</option>
        </select>
    </p>



    <p>
        <label for="parking_price_s">Parking price(מחיר חניה:)</label>
        <select name="parking_price_s" class = "widefat" id="parking_price_s">
            <option class = "parking_price_s" value="בחינם"   <?= (!$parking_price)?'selected="selected"':'' ?>>בחינם</option>
            <option class = "parking_price_s" value="בתשלום"   <?= ($parking_price)?'selected="selected"':'' ?>>בתשלום</option>
        </select>
        <p id="parking_price_number_p" style="display:none" >
            <label for="parking_price">Parking price number(מחיר חניה:)</label>
            <input  type = "text" class = "widefat" name="parking_price" id="parking_price" value="<?php echo $parking_price;?>">
        </p>
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
    <p>
        <label for="air">Air conditioner: (מיזוג:)</label>
        <select name="air" class = "widefat" id="air">
            <option class = "air" value="אין"   <?= $air=="אין"?'selected="selected"':'' ?>>אין</option>
            <option class = "air" value="עילי"   <?= $air=="עילי"?'selected="selected"':'' ?>>עילי</option>
            <option class = "air" value="מרכזי"   <?= $air=="מרכזי"?'selected="selected"':'' ?>>מרכזי</option>
        </select>
    </p>
    <p>
        <label for="air_con_sleeping_room_select">Air con in sleeping rooms: (מיזוג בסלון:)</label>
        <select name="air_con_sleeping_room_select" class = "widefat" id="air_con_sleeping_room_select">
            <option class = "air_con_sleeping_room_select" value="כן"   <?= $air_con_sleeping_room=="כן"?'selected="selected"':'' ?>>כן</option>
            <option class = "air_con_sleeping_room_select" value="לא"   <?= (!$air_con_sleeping_room)=="לא"?'selected="selected"':'' ?>>לא</option>
        </select>
        <p id="air_con_sleeping_room_section" style="display:none;">
            <label for="air_con_sleeping_room">Amount of air con in sleeping rooms: (מיזוג בסלון:)</label>
            <input class = "widefat" name="air_con_sleeping_room" id="air_con_sleeping_room" value="<?php echo $air_con_sleeping_room; ?>" pattern="[\d]{0,2}">
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

    <p>
        <label for="apartment_condition">Apartment condition : (מצב הדירה:)</label><br>

        <input type="checkbox" name="apartment_condition[0]" <?= $apartment_condition[0]?"checked":"" ?> value="לא משופצת">לא משופצת<Br>
        <input type="checkbox" name="apartment_condition[1]" <?= $apartment_condition[1]?"checked":"" ?> value="לאחר שיפוץ כללי">לאחר שיפוץ כללי<Br>
        <input type="checkbox" name="apartment_condition[2]" <?= $apartment_condition[2]?"checked":"" ?> value="חדשה">חדשה<Br>
        <input type="checkbox" name="apartment_condition[3]" <?= $apartment_condition[3]?"checked":"" ?> value="הוחלף ריצוף">הוחלף ריצוף<Br>
        <input type="checkbox" name="apartment_condition[4]" <?= $apartment_condition[4]?"checked":"" ?> value="מטבח משופץ">מטבח משופץ<Br>
        <input type="checkbox" name="apartment_condition[5]" <?= $apartment_condition[5]?"checked":"" ?> value="מטבח מודרני">מטבח מודרני<Br>
        <input type="checkbox" name="apartment_condition[6]" <?= $apartment_condition[6]?"checked":"" ?> value="חדרי רחצה משופצים">חדרי רחצה משופצים<Br>
        <input type="checkbox" name="apartment_condition[7]" <?= $apartment_condition[7]?"checked":"" ?> value="נקיה">נקיה<Br>
        <input type="checkbox" name="apartment_condition[8]" <?= $apartment_condition[8]?"checked":"" ?> value="אחרי צביעה">אחרי צביעה<Br>
    </p>

    <p>
        <label for="garden">Garden: (חצר:)</label>
        <select name="garden" class = "widefat" id="garden">
            <option class = "garden" value="אין" <?= $garden=="אין"?'selected="selected"':'' ?>>אין</option>
            <option class = "garden" value="יש" <?= $garden=="יש"?'selected="selected"':'' ?>>יש</option>
            <option class = "garden" value="משותפת" <?= $garden=="משותפת"?'selected="selected"':'' ?>>משותפת</option>
        </select>
    </p>
     <p>
        <label for="garden_size">Garden size: (שטח חצר:)</label>
        <input class = "widefat" name="garden_size" id="garden_size" value="<?php echo $garden_size; ?>" placeholder="מר">
    </p>
    <p>
        <label for="fence_garden">Garden with a fence: (חצר מגודרת:)</label>
        <select name="fence_garden" class = "widefat" id="fence_garden">
            <option class = "fence_garden" value="כן" <?= $fence_garden=="כן"?'selected="selected"':'' ?>>כן</option>
            <option class = "fence_garden" value="לא" <?= $fence_garden=="לא"?'selected="selected"':'' ?>>לא</option>
        </select>
    </p>
    <p>
        <label for="suitable_roommates">Suitable for roommates: (מתאימה לשותפים:)</label>
        <select name="suitable_roommates" class = "widefat" id="suitable_roommates">
            <option class = "suitable_roommates" value="כן" <?= $suitable_roommates=="כן"?'selected="selected"':'' ?>>כן</option>
            <option class = "suitable_roommates" value="לא" <?= $suitable_roommates=="לא"?'selected="selected"':'' ?>>לא</option>
        </select>
    </p>
    <p>
        <label for="warehouse">Warehouse: (מחסן)</label>
        <select name="warehouse" class = "widefat" id="warehouse">
            <option class = "warehouse" value="אין"   <?= $warehouse=="אין"?'selected="selected"':'' ?>>אין</option>
            <option class = "warehouse" value="פרטי"   <?= $warehouse=="פרטי"?'selected="selected"':'' ?>>פרטי</option>
            <option class = "warehouse" value="משותף"   <?= $warehouse=="משותף"?'selected="selected"':'' ?>>משותף</option>
        </select>
    </p>
    <p>
        <label for="sun_balcony">Sun Balcony (מרפסת שמש):</label>
        <select name="sun_balcony" class = "widefat" id="sun_balcony">
            <option class = "sun_balcony" value="אין"   <?= $sun_balcony=="אין"?'selected="selected"':'' ?>>אין</option>
            <option class = "sun_balcony" value="מרפסת שמש"   <?= $sun_balcony=="מרפסת שמש"?'selected="selected"':'' ?>>מרפסת שמש</option>
            <option class = "sun_balcony" value="מרפסת סגורה"   <?= $sun_balcony=="מרפסת סגורה"?'selected="selected"':'' ?>>מרפסת סגורה</option>
        </select>
    </p>
    <p>
        <label for="balcony_size">Balcony size (שטח מרפסת):</label>
        <input type="text" class = "widefat" name="balcony_size" id="balcony_size" value="<?php echo $balcony_size; ?>"  pattern="[\d]{0,3}">
    </p>
    <p>
        <label for="bars">Bars (סורגים):</label>
        <select name="bars" class = "widefat" id="bars">
            <option class = "bars" value="כל הבית"   <?= $bars=="כל הבית"?'selected="selected"':'' ?>>כל הבית</option>
            <option class = "bars" value="חלקי"   <?= $bars=="חלקי"?'selected="selected"':'' ?>>חלקי</option>
            <option class = "bars" value="אין"   <?= $bars=="אין"?'selected="selected"':'' ?>>אין</option>
        </select>
    </p>
    <p>
        <label for="water_heating_system">Water Heating System (מערכת חימום מים):</label><br>
        <input type="checkbox" name="water_heating_system[0]" <?= $water_heating_system[0]?"checked":"" ?> value="אטמור">אטמור<Br>
        <input type="checkbox" name="water_heating_system[1]" <?= $water_heating_system[1]?"checked":"" ?> value="גז">גז<Br>
        <input type="checkbox" name="water_heating_system[2]" <?= $water_heating_system[2]?"checked":"" ?> value="דוד חשמל">דוד חשמל<Br>
        <input type="checkbox" name="water_heating_system[3]" <?= $water_heating_system[3]?"checked":"" ?> value="דוד שמש">דוד שמש<Br>

    </p>
    <p>
        <label for="gas_system">Gas System (מערכת גז):</label>
        <select name="gas_system" class = "widefat" id="gas_system">
            <option class = "gas_system" value="אין"   <?= $gas_system=="אין"?'selected="selected"':'' ?>>אין</option>
            <option class = "gas_system" value="צובר מרכזי"  <?= $gas_system=="צובר מרכזי"?'selected="selected"':'' ?>>צובר מרכזי</option>
            <option class = "gas_system" value="בלונים"   <?= $gas_system=="בלונים"?'selected="selected"':'' ?>>בלונים</option>
        </select>
    </p>

    <p>
        <label for="wind_directions">Wind directions (כיווני אוויר):</label><br/>
        <input type="checkbox" name="wind_directions[0]" <?= $wind_directions[0]?"checked":"" ?> value="צפון">צפון<Br>
        <input type="checkbox" name="wind_directions[1]" <?= $wind_directions[1]?"checked":"" ?> value="דרום">דרום<Br>
        <input type="checkbox" name="wind_directions[2]" <?= $wind_directions[2]?"checked":"" ?> value="מזרח">מזרח<Br>
        <input type="checkbox" name="wind_directions[3]" <?= $wind_directions[3]?"checked":"" ?> value="מערב">מערב<Br>
    </p>
    <p>
        <label for="parking">Parking (חניה):</label><Br>
        <select name="parking" class = "widefat" id="parking">
            <option value="אין"   <?= $parking=='אין'?'selected="selected"':'' ?>>אין</option>
            <option value="בטאבו" <?= $parking=='בטאבו'?'selected="selected"':'' ?>>בטאבו</option>
            <option value="פרטית"   <?= $parking=='פרטית'?'selected="selected"':'' ?>>פרטית</option>
            <option value="משותפת"   <?= $parking=='משותפת'?'selected="selected"':'' ?>>משותפת</option>
            <option value="רחוב ללא בעיות חניה"   <?= $parking=='רחוב ללא בעיות חניה'?'selected="selected"':'' ?>>רחוב ללא בעיות חניה</option>
        </select>
    </p>
    <p>
        <label for="property_type">Property Type (סוג הנכס):</label>
        <select name="property_type" class = "widefat" id="property_type">
            <option value="דירה"   <?= $property_type=='דירה'?'selected="selected"':'' ?>>דירה</option>
            <option value="דירת גן" <?= $property_type=='דירת גן'?'selected="selected"':'' ?>>דירת גן</option>
            <option value="דירת גג"   <?= $property_type=='דירת גג'?'selected="selected"':'' ?>>דירת גג</option>
            <option value="פנטהאוס"   <?= $property_type=='פנטהאוס'?'selected="selected"':'' ?>>פנטהאוס</option>
            <option value="בית פרטי"   <?= $property_type=='בית פרטי'?'selected="selected"':'' ?>>בית פרטי</option>
            <option value="בית דו-משפחתי"   <?= $property_type=='בית דו-משפחתי'?'selected="selected"':'' ?>>בית דו-משפחתי</option>
        </select>
    </p>
    <p>
        <label for="rooms_quantity">Rooms (מספר חדרים):</label>
        <select name="rooms_quantity" class = "widefat" id="rooms_quantity">
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
        <label for="apartment_size">Apartment size (שטח הדירה):</label>
        <input class = "widefat" name="apartment_size" id="apartment_size" value="<?php echo $apartment_size; ?>" pattern="[123456789][0-9]{0,2}" required>
    </p>
    <p>
        <label for="floor">Floor (קומה):</label>
        <input class = "widefat" name="floor" id="floor" value="<?php echo $floor; ?>" pattern="[123456789][0-9]{0,1}" required>
    </p>
    <p> 
        <label for="from_x_floors">From: X Floors (מתוך: X קומות):</label>
        <input class = "widefat" name="from_x_floors" id="from_x_floors" value="<?php echo $from_x_floors; ?>" pattern="[123456789][0-9]{0,1}" required>
    </p>
    <p> 
        <label for="last_flor"> Last floor: (בקומה אחרונה:):</label>
        <select name="last_flor" class = "widefat" id="last_flor">
            <option class = "last_flor" value="לא"   <?= $last_flor=="לא"?'selected="selected"':'' ?>>לא</option>
            <option class = "last_flor" value="כן"   <?= $last_flor=="כן"?'selected="selected"':'' ?>>כן</option>
        </select>
    </p>
    <p> 
        <label for="elevator"> Elevator: (מעלית:):</label>
        <select name="elevator" class = "widefat" id="elevator">
            <option class = "elevator" value="לא"   <?= $elevator=="לא"?'selected="selected"':'' ?>>לא</option>
            <option class = "elevator" value="כן"   <?= $elevator=="כן"?'selected="selected"':'' ?>>כן</option>
        </select>
    </p>
    <p> 
        <label for="safety_room"> Safety room: (חדר בטחון:):</label>
        <select name="safety_room" class = "widefat" id="safety_room">
            <option class = "safety_room" value="אין"   <?= $safety_room=="אין"?'selected="selected"':'' ?>>אין</option>
            <option class = "safety_room" value="מקלט"   <?= $safety_room=="מקלט"?'selected="selected"':'' ?>>מקלט</option>
            <option class = "safety_room" value="משותף"   <?= $safety_room=="משותף"?'selected="selected"':'' ?>>משותף</option>
        </select>
    </p>
    <p>




<!--SECOND SECTON ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

 <hr>
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
        <input type="text" name="period_price[0]" id="period_price" value="<?= ($period[0])?$period_price[0]:"" ?>">
    </p>
    <p class="selects">
    <label for="period"><span>-</span> תקופה:</label>
        <select name="period[1]">
            <option value="" <?= (!$period[1])?"selected":""?>></option>
            <option value="2.5" <?= ($period[1]=="2.5")?"selected":""?>>2.5</option>
            <option value="3" <?= ($period[1]=="3")?"selected":""?>>3</option>
            <option value="3.5" <?= ($period[1]=="3.5")?"selected":""?> >3.5</option>
            <option value="4" <?= ($period[1]=="4")?"selected":""?> >4</option>
        </select>
    </p>
    <p>
        <label for="period_price"><span>-</span> מחיר:</label>
        <input type="text" name="period_price[1]" value="<?= ($period[1])?$period_price[1]:"" ?>">
    </p>
    <p class="selects">
    <label for="period"><span>-</span> תקופה:</label>
        <select name="period[2]">
            <option value="" <?= (!$period[2])?"selected":""?> ></option>
            <option value="4.5" <?= ($period[2]=="4.5")?"selected":""?>>4.5</option>
            <option value="5" <?= ($period[2]=="5")?"selected":""?>>5</option>
            <option value="5.5" <?= ($period[2]=="5.5")?"selected":""?>>5.5</option>
        </select>
    </p>
    <p>
        <label for="period_price"><span>-</span> מחיר:</label>
        <input type="text" name="period_price[2]" value="<?= ($period[2])?$period_price[2]:"" ?>">
    </p>
    <p class="selects">
    <label for="period"><span>-</span> תקופה:</label>
        <select name="period[3]">
            <option value="" <?= (!$period[3])?"selected":""?> ></option>
            <option value="6" <?= ($period[3]=="6")?"selected":""?> >6</option>
            <option value="6.5" <?= ($period[3]=="6.5")?"selected":""?> >6.5</option>
            <option value="7" <?= ($period[3]=="7")?"selected":""?> >7</option>
        </select>
    </p>
    <p>
        <label for="period_price"><span>-</span> מחיר:</label>
        <input type="text" name="period_price[3]" value="<?= ($period[3])?$period_price[3]:"" ?>">
    </p>
    <hr>

    <h4>מחיר ועלויות נוספות</h4>
        <div class="select-radio">
            <label for="radio-1"><span>-</span> בקרה וניהול שכירות:</label><br>
            <p style="display: inline-block; margin-top: 0;"> 
                <input name="rent_management_price"  type="text" value="<?= !$rent_management ? $rent_management_price : "" ?>">
            </p>
            <p class="radio" style="float: left">
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
    <hr>
        <div class="select-radio">
            <label for="#" ><span>-</span> ועד בית:</label><br>
            <p style="display: inline-block; margin-top: 0;">
                <input type="text" name="building_comission_price" value="<?= !$building_comission ? $building_comission_price : "" ?>">
            </p>
            <p class="radio"  style="float: left">
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
    <hr>

    <div class="select-radio">
        <label for="#"><span>-</span>ארנונה לחודש:</label><br>
        <p style="display: inline-block; margin-top: 0;">
            
            <input type="text" name="property_tax_price" value="<?= !$property_tax ? $property_tax_price : "" ?>">
        </p>
        <p class="radio" style="float: left">
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
    <hr>
       <div class="select-radio">
        <label for="#"><span>-</span> ביטוח:</label><br>
        <p style="display: inline-block; margin-top: 0;">
            <input type="text" name="insurance_price" value="<?= !$insurance ? $insurance_price : "" ?>">
        </p>
        <p class="radio" style="float: left">
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

    <hr>

    <div class="select-radio no-text-inp">
        <p>
            <label for="#"><span>-</span> מוקד תחזוקה:</label>
        </p>
        <p class="radio">
            <input name="maintenance_hotline" id="radio-13" type="radio" value="כולל" <?= $maintenance_hotline=="כולל" ? "checked='checked'": ""?>>
            <label for="radio-13">כולל</label>
        </p>
        <p class="radio">
            <input name="maintenance_hotline" id="radio-14" type="radio" value="לא כולל" <?= $maintenance_hotline=="לא כולל" ? "checked='checked'": ""?>>
            <label for="radio-14">לא כולל</label>
        </p>
        <p class="radio">
            <input name="maintenance_hotline" id="radio-15" type="radio" value="לא רלוונטי" <?= $maintenance_hotline=="לא רלוונטי" ? "checked='checked'": ""?>>
            <label for="radio-15">לא רלוונטי</label>
        </p>
    </div>
    <hr>
    <h4>פרטי הלקוח</h4>
    <div class="select-radio no-text-inp bottom">
        <label for="#"><span>-</span> עריכת הסכם וליווי משפטי-עורך דין:</label><br>
        <p style="display: inline-block; margin-top: 0;">
            
            <input type="text" name="support_lawyer_price" value="<?= !$support_lawyer ? $support_lawyer_price : "" ?>">
        </p>
        <p class="radio" style="float: left">
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

    <hr> 
    <p class="selects ml">
        <label for="#"><span>-</span> העברת חשבונות:</label>
        <select name="account_transfer" id="#" >
            <option value="כולל" <?= $account_transfer=="כולל"?'selected="selected"':'' ?> >כולל</option>
            <option value="לא כולל" <?= $account_transfer=="לא כולל"?'selected="selected"':'' ?> >לא כולל</option>
            <option value="לא רלוונטי" <?= $account_transfer=="לא רלוונטי"?'selected="selected"':'' ?>>לא רלוונטי</option>
        </select>
    </p>
    <hr> 
    <p class="selects">
        <label for="#"><span>-</span> קרן תחזוקה רב-שנתית:</label>
        <select name="long_term_fund_maintenance" id="#" >
            <option value="כולל" <?= $long_term_fund_maintenance=="כולל"?'selected="selected"':'' ?>>כולל</option>
            <option value="לא כולל" <?= $long_term_fund_maintenance=="לא כולל"?'selected="selected"':'' ?>>לא כולל</option>
            <option value="לא רלוונטי" <?= $long_term_fund_maintenance=="לא רלוונטי"?'selected="selected"':'' ?>>לא רלוונטי</option>
        </select>
    </p>


    <?php
}
add_action('save_post',  'custom_save_portfolio_details');

function custom_save_portfolio_details($post_id)
{

    //If we're doing an autosave, return
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
    {
        return;
    }

    //if nonce if not  present or invalid,return
    if (!isset($_POST['portfolio_nonce']) || !wp_verify_nonce($_POST['portfolio_nonce'], 'portfolio_meta_nonce')) {
        return;
    }
    
    //save or update
    $meta_fields=[  ['apartment_condition'=>9, 'default'=>''],
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
    shortSaveMete($post_id, $meta_fields, false);
    return true;

}


/**
    *  This method is save meta field of meta fields
    * @param int $post_id The post id
    * @param array $meta names of meta fields
    * @param bool $count get quantity of multiple meta fields
    * @return bool
*/
function shortSaveMete($post_id, $meta, $count=false){
    if(!$count){
        if($meta){
            foreach ($meta as $key => $value) {
                if(is_array($value)){
                    shortSaveMete($post_id, $value, true);
                }
                else{
                    if(isset($_POST[$value]))
                    {
                        update_post_meta( $post_id, $value, $_POST[$value]);
                    }
                }
            }
        }
        else{
            return false; 
        }
    }
    else{
        if(!isset($meta['default'])){
            foreach ($meta as $key => $value) {
                if($value){
                    if($value){
                        for ($i=0; $i <$value ; $i++) { 
                            if(isset($_POST[$key][$i]))
                            {
                                update_post_meta( $post_id, $key . "[" . $i . "]", $_POST[$key][$i]);
                            }
                        }
                    }
                    else{
                        if(isset($_POST[$key]))
                        {
                            update_post_meta( $post_id, $key, $_POST[$key]);
                        }
                    }
                }
            }
        }
        else{
            //get $key of non default element
            foreach ($meta as $key => $value) {
                if($key!='default'){
                    break;
                }            
            }
            if($meta[$key]){
                for ($i=0; $i <$value ; $i++) { 
                    if(isset($_POST[$key][$i]))
                    {
                        update_post_meta( $post_id, $key . "[" . $i . "]", $_POST[$key][$i]);
                    }
                    else{
                        update_post_meta( $post_id, $key . "[" . $i . "]", $meta['default']);
                    }
                }
            }
            else{
                if(isset($_POST[$key]))
                {
                    update_post_meta( $post_id, $key, $_POST[$key]);
                }
                else{
                    update_post_meta( $post_id, $key, $meta['default']);
                }
            }
        }
    }
    return true;
}