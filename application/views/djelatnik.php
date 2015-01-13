<div class="header">
    <div class="back"><?= $back; ?></div>
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
            <form action="" method="post">
            	<input type="hidden" name="next" value="1"/>
                <button class="choice">Pomakni brojač</button>
            </form>
            <form action="" method="post">
                <input type="hidden" name="repeat" value="1"/>
                <button class="choice">Ponovi signal</button>
            </form>
                
		

 	</div>
</div>    
