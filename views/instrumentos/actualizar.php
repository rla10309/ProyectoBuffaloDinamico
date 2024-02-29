<main class="app-content contenedor seccion formulario-admin">
    <?php foreach ($errores as $error) : ?>
        <div class="alerta error"><?php echo $error; ?></div>
    <?php endforeach; ?>
    <div class="app-title">
        <div>
            <h1><i class="bi bi-ui-checks"></i>Actualizar Instrumento</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="bi bi-house-door"></i></li>
            <li class="breadcrumb-item"><a href="/instrumentos/listado">Instrumentos</a></li>
            <li class="breadcrumb-item"><a href="/instrumentos/actualizar">Actualizar Instrumento</a></li>
        </ul>
    </div>

    <div class="tile seccion">
        <div class="tile-body">
            <form action="" class="formulario" method="POST">

                <?php include __DIR__ . "/formulario.php"; ?>

                <input type="submit" class="boton-fireBrick" value="Actualizar">
            </form>
        </div>
    </div>
</main>