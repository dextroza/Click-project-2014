<?php
/**
 * 
 */

foreach( $options as $option ){
    $display = $option->oznaka . " - " . $option->opis;
    //form_open();
?>
    <form method="post" action="">
        <input type="hidden" name="choice" value="<?= $option->id ?>"/>
            <button class="choice" type="submit"><?= $display ?></button>
    </form>

<?php
}


