<div class="header">
    <h1>Djelatnik</h1>
    <aside>
    	<div class="side home">
     		<?= isset($dateTime)?$dateTime:"" ?>
    		<?= isset($workTime)?$workTime:"" ?>
            <?= isset($totalTickets)?$totalTickets:"" ?>
        </div>
    </aside>
</div>
	
<div class="page">
    <aside>
        <div class="side home">
            <?= isset($ordinalNumber)?$ordinalNumber:"" ?>      
            <?= isset($timeNextTicket)?$timeNextTicket:"" ?>
        </div>
    </aside>

	<div class= "main" >
		<div class="choice">
            <div class="text">Pomakni brojač</div>
       	</div>
		<div class="choice">
            <div class="text">Ponovi signal</div>
        </div>
 	</div>
</div>    
