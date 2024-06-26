<main class="contenedor seccion alto-min seccion-registro">
    <h1 class="text-center">Crear Cuenta</h1>
    <?php
        include_once __DIR__ . "/../templates/alertas.php";
    ?>
    <form action="/registrar" class="formulario" method="POST">


        <h3><i class="fa-solid fa-arrow-right-to-bracket me-3"></i>Introduce tus datos</h3>
        <div class="row">
            <div class="mb-5 col-12 col-md-5">
                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Nombre" id="nombre" name="usuario[nombre]" value="<?php echo s($usuario->nombre); ?>">
            </div>
            <div class="mb-5 col-12 col-md-7">
                <label for="apellidos">Apellidos</label>
                <input type="text" placeholder="Apellidos" id="apellidos" name="usuario[apellidos]" value="<?php echo s($usuario->apellidos); ?>">
            </div>
        </div>
        <div class="row">
            <div class="mb-5 col-12 col-md-6">
                <label for="dni">DNI</label>
                <input type="text" placeholder="DNI" id="dni" name="usuario[dni]" value="<?php echo s($usuario->dni); ?>">
            </div>
            <div class="mb-5 col-12 col-md-6">
                <label for="telefono">Teléfono</label>
                <input type="tel" placeholder="Teléfono" id="telefono" name="usuario[telefono]" value="<?php echo s($usuario->telefono); ?>">
            </div>
        </div>
        <div class="row">
            <div class="mb-5 col-12 col-md-6">
                <label for="email">Email</label>
                <input type="email" placeholder="Email" id="email" name="usuario[email]" value="<?php echo s($usuario->email); ?>">
            </div>
            <div class="mb-5 col-12 col-md-6">
                <label for="password">Contraseña</label>
                <input type="password" placeholder="Contraseña" id="password" name="usuario[password]">
            </div>
        </div>
        <!-- 
        <input type="hidden" name="usuario[fecha_creacion]" value="<?php echo s($usuario->fecha_creacion); ?>"> -->
        <div class="mb-3">
            <input type="submit" class="boton-fireBrick-block w-100" value="Regístrate"></input>
        </div>


    </form>
    <div class="mb-3 acciones-login">
        <p>¿Ya tienes una cuenta?<a href="/login">Inicia sesión</a></p>
        <p>¿Olvidaste tu contraseña? <a href="/olvide">Recuperar</a></p>
    </div>
</main>