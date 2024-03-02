<main class="app-content contenedor seccion formulario-admin">
    <?php foreach ($errores as $error) : ?>
        <div class="alerta error"><?php echo $error; ?></div>
    <?php endforeach; ?>
    <div class="app-title">
        <div>
            <h1><i class="bi bi-ui-checks"></i>Actualizar Categoría</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="bi bi-house-door"></i></li>
            <li class="breadcrumb-item"><a href="/categorias/listado">Categorías</a></li>
            <li class="breadcrumb-item"><a href="/categorias/actualizar">Actualizar Categoría</a></li>
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