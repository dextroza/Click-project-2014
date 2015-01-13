<div class="header" id="nadzornik">
    <div class="back"><?= $back; ?></div>
    <h1>Administriranje sustava</h1>
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
        <div class="mainNadzornik">

            <?= isset($optionsList) ? $optionsList : "" ?>
            <div class="choice">
                <div class="text">Resetiraj brojač</div>
            </div>
            <!--<div class="choice">
                    <div class="text">Izvještaj</div>
            </div>-->
            <form action="nadzornik" method="post">
                <input type="hidden" name="report" value="1"/>
                <button class="choice" type="submit">Izvještaj</button>
            </form>
        </div>
        <?= isset($editOption)?$editOption:"" ?>
        <?= isset($report)?$report:"" ?>
    </div>
</div> 
   