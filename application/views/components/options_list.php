
<div class="list-group opcije">
    <li id="naslovOpcije" class="list-group-item">
        <h4 class="text opc">Opcije</h4></li>

    <?php
    if (isset($dataOption)) {
        foreach ($dataOption["options"] as $option) {
            $display = $option->oznaka . " - " . $option->opis;
            ?>
            <form action='nadzornik' method="post">
                <input type="hidden" name="option" value="<?= $option->id ?>"/>
                <button type="submit" class="list-group-item"><?= $display ?></button>
            </form>        


            <?php
        }
    }
    ?>
    <form action='nadzornik' method="post">
        <input type="hidden" name="option" value="new"/>
        <button type="submit" id="addOption" class="list-group-item">Dodaj novu opciju</button>
    </form>
    <!--        <a href="#" class="list-group-item">A</a>
            <a href="#" class="list-group-item">B</a>
            <a href="#" class="list-group-item">C</a>-->
<?php //echo isset($newOption)?$newOption:""  ?>
</div>