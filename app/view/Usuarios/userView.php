<?= $headers; ?>
<body>
	<div class="container">
        <div class="row">
            <div style="margin-top: 50px;" class="col-md-12">
                <?php echo $users->id; ?> -
                <?php echo $users->nombre; ?> -
                <?php echo $users->apellido; ?> -
                <?php echo $users->email; ?>
                <div class="right">
                    <a href="<?= $helper->url("Usuarios","borrar"); ?>/<?php echo $users->id; ?>" class="btn btn-danger">Borrar</a>
                    <a href="<?= $helper->url("Usuarios","index"); ?>" class="btn btn-warning">Index</a>
                    <a href="<?= $helper->url("Usuarios","users"); ?>" class="btn btn-info">Todos</a>
                </div>
                <hr/>
            </div>
        </div>
    </div>
</body>
<?= $resource_script; ?>