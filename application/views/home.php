<div class="header">
    <h1>Dobro došli u tiketomat</h1>
    <div class="sustav">
        <p>Uđi u sustav:</p>
        <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="username"><br>
                <input type="password" class="form-control" placeholder="password">
            </div>
            <button type="submit" class="btn btn-default navbar-btn">Login</button>
        </form>
    </div>
</div>
<div class="page">
    <aside>
        <div class="side">
            <div class="side-ticket">
                <!-- trenutni tiket -->
                <h3>Trenutni tiket: 45</h3>
            </div>
            <div class="side-ticket">
                <!-- vrijeme dolaska sljedećeg tiketa -->
                <h3>Vrijeme dolaska sljedećeg tiketa: 15:45h </h3>
            </div>
        </div>
    </aside>

    <!--generirati iz sql upita izbore šaltera -->
    <div class="main">

        <div class="choice">
            <div class="text">A - Uplate i isplate</div>
        </div>
<!--        <div class="choice">
            <div class="text">B - Krediti</div>
        </div>-->
        <?php //echo $ticket; ?>
        <div class="choice">
            <div class="text">C - Pregled računa</div>
        </div>

    </div>

    <!-- kraj generiranja -->
</div>
<div class="footer">

</div>
