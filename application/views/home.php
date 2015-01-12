<div class="header">
    
    <h1>Dobro došli u redomat</h1>
    <?= isset($loginView)?$loginView:"" ?>
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
