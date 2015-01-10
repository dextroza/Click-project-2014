<?php
/**
 * 
 */

foreach( $tickets as $ticket ){
    //form_open();
?>
    <form method="post" action="">
        <input type="hidden" name="choice" value="<?php echo $ticket ?>"/>
            <button class="choice" type="submit"><?php echo $ticket ?></button>
    </form>

<?php // form_close();@ 
}
