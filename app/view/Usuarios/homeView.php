<?= $headers; ?>
<body>
	<div class="container">
        <div class="row">
            <div style="margin-top: 50px;" class="col-md-12">
                <h1>HOLA, SOY EL INDEX</h1>
                <ul>
                    <li><a href="<?= $helper->url("Usuarios","users"); ?>" class="btn btn-warning">Usuarios</a></li><br>
                    <li><a href="<?= $helper->url("Usuarios","secondView"); ?>" class="btn btn-info">Second</a></li>
                </ul>
            </div>
        </div>
    </div>
</body>
<?= $resource_script; ?>