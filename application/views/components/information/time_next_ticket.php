
<div class="side-ticket">
    <!-- vrijeme dolaska sljedećeg tiketa -->
    <?php if ( $timeNextTicket === FALSE) { ?> 
        <h3 style="color:red; padding-top:13px; padding-left:3px;">Trenutno ne postoji sljedeći tiket</h3> 
    <?php }
          else {
    ?>
            <h3 style="padding-top:13px;">Vrijeme dolaska sljedećeg tiketa: <?= $timeNextTicket . "h" ?> </h3>
    <?php } ?>
</div>