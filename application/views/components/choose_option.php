<?php
/**
 * 
 */
if (isset($options)) {
    foreach ($options as $option) {
        $display = $option->oznaka . " - " . $option->opis;
        $bojafonta = $option->bojafonta;
        $velfonta = $option->velfonta;
        switch ($velfonta) {
            case '20':
                $class = "dvadeset";
                break;
            case '25':
                $class = "dvadesetpet";
                break;
            case '30':
                $class = "trideset";
                break;
            case '35':
                $class = "tridesetpet";
                break;
            case '40':
                $class = "cetrdeset";
                break;
            default:
                $class = "dvadeset";
        }

        //form_open();
        ?>
        <form method="post" action="index.php/ticket/ticket">
            <input type="hidden" name="choice" value="<?= $display ?>"/>
            <button class="choice <?= $class ?>" style="color:<?= $bojafonta ?>;" type="submit"><?= $display ?></button>
        </form>

        <?php
    }
}


