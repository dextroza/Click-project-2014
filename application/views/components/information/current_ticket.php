

<div class="side-ticket <?= $repeat == TRUE?'repeat"':'"'?>>
    <!-- trenutni tiket -->
    
    <?php if($ticket === FALSE) echo "<h3>Nema više isprintanih tiketa</h3>";
        else ?><h3>Trenutni tiket: <?= $ordinalNumber ?></h3>
</div>