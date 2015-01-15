

<div class="side-ticket <?= $repeat == TRUE ? 'repeat"' : '"' ?>>
     <!-- trenutni tiket -->

     <?php
     if ($ticket === FALSE) {
         echo "<h3 style='color:red; padding-top:20px;'>Nema nikog u redu</h3>";
     } else {
         ?><h3 style="padding-top:20px;">Trenutni tiket: <?= $ordinalNumber ?></h3>
     <?php }
     ?>
     </div>