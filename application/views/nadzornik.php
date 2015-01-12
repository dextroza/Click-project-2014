<div class="header" id="nadzornik">
    <h1>Nadzornik</h1>
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
   