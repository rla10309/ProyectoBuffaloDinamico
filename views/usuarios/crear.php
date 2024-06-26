<main class="app-content contenedor seccion formulario-admin">
    <?php
    include_once __DIR__ . "/../templates/alertas.php";
    ?>
    <div class="app-title">
        <div>
            <h1><i class="bi bi-ui-checks"></i>Nuevo Usuario</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="bi bi-house-door"></i></li>
            <li class="breadcrumb-item"><a href="/usuarios/listado">Usuarios</a></li>
            <li class="breadcrumb-item"><a href="/usuarios/crear">Nuevo Usuario</a></li>
        </ul>
    </div>

    <div class="tile seccion">
        <div class="tile-body">
            <form action="/usuarios/crear" class="formulario" method="POST">
                <?php include __DIR__ . "/formulario.php"; ?>
                <input type="submit" class="boton-fireBrick" value="Crear">
            </form>
        </div>
    </div>
</main>