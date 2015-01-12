<div class="sustav">
    <?php echo validation_errors(); ?>
    <?php echo form_open('verifylogin', 'method="post" action="" class="navbar-form"'); ?>
    <div class="form-group">
        <label for="username">Korisničko ime:</label>
        <input type="text" class="form-control" size="20"  name="username"/>
        <br/>
        <label for="password">Zaporka:</label>
        <input style="margin-left:45px;" type="password" class="form-control" size="20"  name="password"/>
        <br/>
    </div>
    <input type="submit" class="btn btn-default navbar-btn" value="Login"/>
</form>
</div>
<!--
  <?php // echo validation_errors(); ?>
<div class="sustav">
        <p>Uđi u sustav:</p>
        <?php// echo form_open('verifylogin', 'method="post" action="" class="navbar-form navbar-left"'); ?>
        <form method="post" action="" class="navbar-form navbar-left" role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="username"><br>
                <input type="password" class="form-control" placeholder="password">
            </div>
            <button type="submit" class="btn btn-default navbar-btn">Login</button>
        </form>
    </div>-->