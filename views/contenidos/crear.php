<main class="app-content contenedor seccion formulario-admin">
    <?php
    include_once __DIR__ . "/../templates/alertas.php";
    ?>
    <div class="app-title">
        <div>
            <h1><i class="bi bi-ui-checks"></i>Nuevo Contenido</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="bi bi-house-door"></i></li>
            <li class="breadcrumb-item"><a href="/contenidos/listado">Contenido Destacado</a></li>
            <li class="breadcrumb-item"><a href="/contenidos/crear">Nuevo contenido</a></li>
        </ul>
    </div>

    <div class="tile seccion">
        <div class="tile-body">
            <form action="" class="formulario" method="POST" enctype=multipart/form-data>

                <?php include __DIR__ . "/formulario.php"; ?>

                <input type="submit" class="boton-fireBrick" value="Crear">

            </form>
        </div>
    </div>
</main>