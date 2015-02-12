<div class="sustav">
    <?php echo validation_errors(); ?>
    <?php echo form_open('verifylogin', 'method="post" action="" class="navbar-form"'); ?>
    <div class="form-group">
        <label for="username">Korisničko ime:</label>
        <input type="text" class="form-control" id="username" size="20"  name="username"/>
        <br/>
        <label for="password">Zaporka:</label>
        <input style="margin-left:45px;" type="password" id="password" class="form-control" size="20"  name="password"/>
        <br/>
    </div>
    <input type="submit" class="btn btn-default navbar-btn" value="Login"/>
</form>
</div>
