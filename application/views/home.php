<div class="header">
    
    <h1>Dobro došli u redomat</h1>
    <?= isset($loginView)?$loginView:"" ?>
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
    <!--generirati iz sql upita izbore šaltera -->
    <div class="main">
        <?= isset($options)?$options:"";  ?>
<!--        <div class="choice">
            <div class="text">A - Uplate i isplate</div>
        </div>
        <div class="choice">
            <div class="text">B - Krediti</div>
        </div>
        <?php //echo $ticket; ?>
        <div class="choice">
            <div class="text">C - Pregled računa</div>
        </div>-->

    </div>

    <!-- kraj generiranja -->
</div>
<div class="footer">

</div>
