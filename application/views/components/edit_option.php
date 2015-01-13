<?php

$id = "";
$oznaka = "";
$opis = "";
$velfonta = "";
$bojafonta = "";
$status = "";
if (isset($option)){
    $id = $option->id;
    $oznaka = $option->oznaka;
    $opis = $option->opis;
    $velfonta = $option->velfonta;
    $bojafonta = $option->bojafonta;
    $status = $option->status;
}  
$colors = ["green", "blue", "black", "red", "brown"];
$sizes = ["20", "25", "30","35", "40"];
    
 ?>
<div class="editOption">
    <span class="label label-primary editHead">Izmijeni / dodaj opciju:</span><br>
    <form action="editoption" method="post" class="navbar-form navbar-left">
        <div class="form-group">
            
            <input type="hidden" class="form-control" name="id" value="<?= $id ?>" placeholder="id"><br>
            <input type="text" class="form-control" name="oznaka" value="<?= $oznaka ?>" placeholder="oznaka"><br>
            <input type="text" class="form-control" name="opis" value="<?= $opis ?>" placeholder="opis"><br>
            <select style="font-size:15px; width:100%" class="form-control" name="velfonta">
            <?php foreach($sizes as $size){ ?>
                
                <option <?= $velfonta == $size?"selected":"" ?> value="<?=$size?>"><?=$size?></option>
                    
            <?php } ?>
            </select><br>
            <select style="width:100%" name="bojafonta" class="form-control">
            <?php foreach($colors as $color){ ?>
                <option <?= $bojafonta == $color?"selected":"" ?> value="<?=$color?>"><?=$color?></option>
                    
            <?php } ?>
            </select><br>
            <!--<span id="default_message_overlay">Prikazati</span>-->
            <select id="my_select" style="width:100%" name="status" class="form-control">
                <option selected disabled >--Prikazati--</option>
                <option <?= $status == "1"?"selected":"" ?> value="1">Da</option>
                <option <?= $status == "0"?"selected":"" ?> value="0">Ne</option>
            </select>
        </div><br>
        <button style="margin-top:5px;" type="submit" class="btn btn-default">Save</button>
        </form>
    <?php if ("" != $id){ ?>
        <form style="margin-left:-98px; margin-top:190px;" action="editoption" method="post" class="navbar-form navbar-left">
            <input type="hidden" class="form-control" name="delete">
            <input type="hidden" class="form-control" name="id" value="<?= $id ?>">
        <button style="" type="submit" class="btn btn-default">Delete</button>
        </form>
    <?php } ?>
    
   
</div>

