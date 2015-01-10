<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tiketomat</title>
    
    <link href='http://fonts.googleapis.com/css?family=Rammetto+One' rel='stylesheet' type='text/css'>
    <!--bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

     <!--Optional theme --> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">

     <!--Latest compiled and minified JavaScript--> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

</head>
<body>
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
            <div class="choice">
                <div class="text">B - Krediti</div>
            </div>
            <div class="choice">
                <div class="text">C - Pregled računa</div>
            </div>

        </div>

        <!-- kraj generiranja -->
    </div>
    <div class="footer">

    </div>
</body>
</html>