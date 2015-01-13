<?php //  var_dump($ticket); die(); ?>

<div class="header" id="print">
    <div class="back"><?=$back; ?></div>
    <h1>Ispis tiketa</h1>
</div>

<div class="ticket">
  <div align="center">
    <p>&nbsp;</p>
    <table width="70%" height="260" border="3" bordercolor="#000000" bgcolor="#CCCCCC">
        <tr>
            <td width="37%">Poslodavac</td>
            <td width="63%"><?= $ticket->poslodavac; ?></td>
        </tr>
        <tr>
            <td>Oznaka opcije</td>
            <td><?= $ticket->oznaka; ?></td>
        </tr>
        <tr>
            <td width="37%">Redni broj</td>
            <td width="63%"><?= $ticket->rednibroj; ?></td>
        </tr>
        <tr>
            <td>Ocekivano vrijeme dolaska na red</td>
            <td><?= $ticket->ocekvrdolaska; ?></td>
        </tr>
        <tr>
            <td width="37%">Vrijeme stvaranja tiketa</td>
            <td width="63%"><?= $ticket->vrijemestvaranja; ?></td>
        </tr>
        <tr>
            <td>ID</td>
            <td><?= $ticket->id; ?></td>
        </tr>
    </table>  
  </div>
</div>
<!--automatsko loadanje home page-->
<!--<script>
    $(document).ready(function(){
    setTimeout(function() {
         
         window.open("localhost/queueOptimization","_self")
            
    }, 2000);
  
});</script>-->


