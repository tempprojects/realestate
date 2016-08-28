<form  method="get" id="searchform"  action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
    <label for="s" class="search">
        עיר
        <input name="s" type="search" value="<?php echo esc_attr( get_search_query() ); ?>" >
    </label>
    <label for="rooms_quantity" class="selects">
        מספר חדרים
        <select name="rooms_quantity" id="rooms_quantity">
            <option value=""></option>
            <option value="1" <?=isset($_REQUEST['rooms_quantity'])?($_REQUEST['rooms_quantity']==1?"selected":""):""?> >1</option>
            <option value="1.5" <?=isset($_REQUEST['rooms_quantity'])?($_REQUEST['rooms_quantity']==1.5?"selected":""):""?>>1.5</option>
            <option value="2" <?=isset($_REQUEST['rooms_quantity'])?($_REQUEST['rooms_quantity']==2?"selected":""):""?>>2</option>
            <option value="2.5" <?=isset($_REQUEST['rooms_quantity'])?($_REQUEST['rooms_quantity']==2.5?"selected":""):""?>>2.5</option>
            <option value="3" <?=isset($_REQUEST['rooms_quantity'])?($_REQUEST['rooms_quantity']==3?"selected":""):""?>>3</option>
            <option value="3.5" <?=isset($_REQUEST['rooms_quantity'])?($_REQUEST['rooms_quantity']==3.5?"selected":""):""?>>3.5</option>
            <option value="4" <?=isset($_REQUEST['rooms_quantity'])?($_REQUEST['rooms_quantity']==4?"selected":""):""?>>4</option>
            <option value="4.5" <?=isset($_REQUEST['rooms_quantity'])?($_REQUEST['rooms_quantity']==4.5?"selected":""):""?>>4.5</option>
            <option value="5" <?=isset($_REQUEST['rooms_quantity'])?($_REQUEST['rooms_quantity']==5?"selected":""):""?>>5</option>
            <option value="5.5" <?=isset($_REQUEST['rooms_quantity'])?($_REQUEST['rooms_quantity']==5.5?"selected":""):""?>>5.5</option>
            <option value="6" <?=isset($_REQUEST['rooms_quantity'])?($_REQUEST['rooms_quantity']==6?"selected":""):""?>>6</option>
            <option value="6.5" <?=isset($_REQUEST['rooms_quantity'])?($_REQUEST['rooms_quantity']==6.5?"selected":""):""?>>6.5</option>
            <option value="7" <?=isset($_REQUEST['rooms_quantity'])?($_REQUEST['rooms_quantity']==7?"selected":""):""?>>7</option>
        </select>
    </label>
    <input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px; "tabindex="-1" id="searchsubmit"/>
</form>