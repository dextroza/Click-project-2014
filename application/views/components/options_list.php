
<div class="list-group opcije">
        <li id="naslovOpcije" class="list-group-item">
            <h4 class="text opc">Opcije</h4></li>
        
        <?php
            
            foreach($dataOption["options"] as $option){
                $display = $option->oznaka . " - " .$option->opis; ?>
             <form action='nadzornik' method="post">
             <input type="hidden" name="option" value="<?=$option->id?>"/>
             <button type="submit" class="list-group-item"><?= $display ?></button>
             </form>        
        
            <?php 
            }?>
<!--        <a href="#" class="list-group-item">A</a>
        <a href="#" class="list-group-item">B</a>
        <a href="#" class="list-group-item">C</a>-->
        <?= isset($newOption)?$newOption:"" ?>
</div>