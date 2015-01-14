<?php
$id = "";

?>
<div class="editOption">
    <span class="label label-primary editHead" style="padding-right:96px;">Prikazati informacije:</span><br>
    <form action="editoption/information" method="post" class="navbar-form navbar-left">
        <div class="form-group" style="width:265px;">
            
            <input type="hidden" class="form-control" name="id" value="<?= $id ?>" placeholder="id"><br>
          
            Datum i vrijeme
            <select class="form-control information" name="dateTime">
                <option <?= $dateTime == 1?"selected":"" ?> value="1">Da</option>
                <option <?= $dateTime == 0?"selected":"" ?> value="0">Ne</option>
            </select><br>
            Ukupno tiketa u danu
            <select class="form-control information" name="totalTickets">
                <option <?= $totalTickets == 1?"selected":"" ?> value="1">Da</option>
                <option <?= $totalTickets == 0?"selected":"" ?> value="0">Ne</option>
            </select><br>
            Trenutni redni broj
            <select class="form-control information" name="ordinalNumber">
                <option <?= $ordinalNumber == 1?"selected":"" ?> value="1">Da</option>
                <option <?= $ordinalNumber == 0?"selected":"" ?> value="0">Ne</option>
            </select><br>
            Vrijeme dolaska sljedećeg tiketa na red
            <select class="form-control information" name="timeNextTicket">
                <option <?= $timeNextTicket == 1?"selected":"" ?> value="1">Da</option>
                <option <?= $timeNextTicket == 0?"selected":"" ?> value="0">Ne</option>
            </select><br>
            Početak rada
            <select  class="form-control information" name="workTime">
                <option <?= $workTime == 1?"selected":"" ?> value="1">Da</option>
                <option <?= $workTime == 0?"selected":"" ?> value="0">Ne</option>
            </select><br>
            Prosječno vrijeme čekanja
            <select  class="form-control information" name="avgWaiting">
                <option <?= $avgWaiting == 1?"selected":"" ?> value="1">Da</option>
                <option <?= $avgWaiting == 0?"selected":"" ?> value="0">Ne</option>
            </select><br>
            
            
                
        </div><br>
        <button style="margin-top:5px;" type="submit" class="btn btn-default">Save</button>
        </form>
    
   
</div>


