<?php
$id = "";

?>
<div class="">
    
    <form action="editoption/information" method="post" class="navbar-form navbar-left">
        <div class="form-group" id="form-group" style="width:265px;">
            <span class="label label-primary infoHead" style="">Prikazati informacije:</span><br>
            
            <input type="hidden" class="form-control" name="id" value="<?= $id ?>" placeholder="id"><br>
          
            <h5>Datum i vrijeme</h5>
            <select class="form-control information " name="dateTime">
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
            Prosječno vrijeme čekanja na red
            <select  class="form-control information" name="avgWaiting">
                <option <?= $avgWaiting == 1?"selected":"" ?> value="1">Da</option>
                <option <?= $avgWaiting == 0?"selected":"" ?> value="0">Ne</option>
            </select><br>
            
            
                
        </div><br>
        <button style="margin-top:5px;" type="submit" class="btn btn-default">Save</button>
        </form>
    
   
</div>


