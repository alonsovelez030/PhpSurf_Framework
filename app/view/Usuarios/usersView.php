<?= $headers; ?>
<body>
	<div class="container">
        <div class="row">
            <div style="margin-top: 50px;" class="col-md-12">
                <?php foreach($users as $user) {?>
                    <?php echo $user->id; ?> -
                    <?php echo $user->nombre; ?> -
                    <?php echo $user->apellido; ?> -
                    <?php echo $user->email; ?>
                    <div class="right">
                        <a href="<?= $helper->url("Usuarios","users"); ?>/<?php echo $user->id; ?>" class="btn btn-danger">Perfil</a>
                        <a href="<?= $helper->url("Usuarios",""); ?>" class="btn btn-warning">Index</a>
                        <a href="<?= $helper->url("Usuarios","secondView"); ?>" class="btn btn-info">Second</a>
                    </div>
                    <hr/>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
<?= $resource_script; ?>