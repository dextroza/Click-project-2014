
<form action="izvjestaj" method="post" class="navbar-form navbar-left" >
    <div class="day_izvjestaj">
        <label for="datepicker">*Po danima</label>
        <input type="text" id="datepicker" name="day" style="height:30px;"/>
        <input type="submit" class="btn btn-default navbar-btn" value="Print"/>
    </div>
</form>

<form action="izvjestaj" method="post" class="navbar-form navbar-left">

    <label for="monthpicker">*Po mjesecima</label>
    <select style="width:173px; height:30px;" name="month">
        <?php foreach ($months as $month) {
            ?>
            <option value="<?= $month ?>"><?= $month ?></option>

            <?php
        }
        ?>
    </select>
    <input type="submit" class="btn btn-default navbar-btn" value="Print"/>
</form>

<script type="text/javascript">
    $(function () {
        $('#datepicker').datepicker({
            inline: true,
            //nextText: '&rarr;',
            //prevText: '&larr;',
            showOtherMonths: true,
            //dateFormat: 'dd MM yy',
            dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            //showOn: "button",
            //buttonImage: "img/calendar-blue.png",
            //buttonImageOnly: true,
        });
    });
</script>