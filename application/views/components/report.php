<!--<script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
  
  <p>Date: <input type="text" id="datepicker" style=""></p>
-->

<script type="text/javascript">  
    $(function(){  
        $('#datepicker').datepicker({  
            inline: true,  
            showOtherMonths: true,  
            dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],  
        });  
    });  
</script>

<p>Date: <input type="text" id="datepicker"></p> 