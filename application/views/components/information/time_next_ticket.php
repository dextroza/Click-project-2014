
<div class="side-ticket">
    <!-- vrijeme dolaska sljedećeg tiketa -->
    <?php if ( $timeNextTicket === FALSE) { ?> 
        <h3>Trenutno ne postoji sljedeći tiket</h3> 
    <?php }
          else {
    ?>
            <h3>Vrijeme dolaska sljedećeg tiketa: <?= $timeNextTicket . "h" ?> </h3>
    <?php } ?>
</div>