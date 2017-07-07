<?php if(isset($msg)):?>
<div class="alert alert-danger" role="alert">
    <?php echo $msg ?>
</div>
<?php endif ?>
<form action="<?php echo site_url('login/validate')?>" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Correo</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" required>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
    </div>
    <button type="submit" class="btn btn-default">Entrar</button>
</form>