<div class="header" id="nadzornik">
    <h1>Nadzornik</h1>
</div>
<div class="page">
    <aside>
        <div class="side home">
            <?= isset($ordinalNumber)?$ordinalNumber:"" ?>
            <?= isset($dateTime)?$dateTime:"" ?>
            <?= isset($totalTickets)?$totalTickets:"" ?>
            <?= isset($timeNextTicket)?$timeNextTicket:"" ?>
            <?= isset($workTime)?$workTime:"" ?>
            
        </div>
    </aside>
    
    <div class = "main">
		    
    	<?= isset($optionsList)?$optionsList:"" ?>
        <div class="choice">
            <div class="text">Resetiraj brojač</div>
        </div>
        <div class="choice">
            <div class="text">Izvještaj</div>
       	</div>
     </div> 
</div> 
   