<?php
    $oznaka = $option->oznaka;
    $opis = $option->opis;
    $velfonta = $option->velfonta;
    $bojafonta = $option->bojafonta;
    $vidljiv = $option->status;
    $colors = ["green", "blue", "black", "red", "brown"];
    $sizes = ["10", "15", "20", "25", "30"];
    
    
 ?>
<div class="editOption">
    Izmijeni/napravi opciju:<br>
    <form action="editoption" class="navbar-form navbar-left">
        <div class="form-group">
            <input type="text" class="form-control" value="<?= $oznaka ?>" placeholder="oznaka"><br>
            <input type="text" class="form-control" value="<?= $opis ?>" placeholder="opis"><br>
            <select name="velfonta">
                <?php foreach($sizes as $size){
                   ?>
                        <option <?= $velfonta == $size?"selected":"" ?> value="<?=$size?>"><?=$size?></option>
                    
                <?php } ?>
            </select><br>
            <select name="bojafonta" class="form-control">
                <?php foreach($colors as $color){
                   ?>
                        <option <?= $bojafonta == $color?"selected":"" ?> value="<?=$color?>"><?=$color?></option>
                    
                <?php } ?>
            </select><br>
            Vidljiv:<br>
            
            <input <?= $vidljiv=="1"?'checked="checked"':"" ?> type="radio"  name="vidljiv" value="1">Da</input><br>
            <input <?= $vidljiv=="0"?'checked="checked"':"" ?> type="radio"  name="vidljiv" value="0">Ne</input><br>
                  
        </div>
        <button type="submit" class="btn btn-default">Save</button>
    </form>
   
</div>

