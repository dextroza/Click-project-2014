<?php
/**
 * 
 */

foreach( $options as $option ){
    $display = $option->oznaka . " - " . $option->opis;
    //form_open();
?>
    <form method="post" action="index.php/ticket/ticket">
        <input type="hidden" name="choice" value="<?= $display?>"/>
            <button class="choice" type="submit"><?= $display ?></button>
    </form>

<?php
}


