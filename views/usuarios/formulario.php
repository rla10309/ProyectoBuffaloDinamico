  <div class="row">
      <div class="mb-3 col-5">
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" id="nombre" name="usuario[nombre]" placeholder="Nombre" value="<?php echo s($usuario->nombre); ?>">
      </div>
      <div class="mb-3 col-7">
          <label for="apellidos" class="form-label">Apellidos</label>
          <input type="text" id="apellidos" name="usuario[apellidos]" placeholder="Apellidos" value="<?php echo s($usuario->apellidos); ?>">
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
      <div class="mb-3 col-6">
          <label class="form-label" for="email">Email</label>
          <input type="email" id="email" name="usuario[email]" placeholder="Email" value="<?php echo s($usuario->email); ?>">
      </div>
      <div class="mb-3 col-6">
          <label for="password" class="form-label">Contraseña</label>
          <input type="password" id="password" name="usuario[password]" value="<?php echo s($usuario->password); ?>">
      </div>
  </div>

  <div class="row">
      <div class="col-7">
          <label for="rol" class="form-label">Rol</label>
          <select name="usuario[idrol]" id="rol" class="">
              <option value="" selected>--Seleccione rol--</option>
              <?php foreach ($roles as $rol) : ?>
                  <option class="mb-3" <?php echo ($usuario->idrol === $rol->id) ? "selected" : ""; ?> value="<?php echo s($rol->id); ?>"><?php echo s(strtoupper($rol->nombre)); ?></option>
              <?php endforeach; ?>
          </select>
      </div>

      <div class="form-check form-switch col-5 check">
          <label class="form-check-label" for="confirmado">Confirmado</label>
          <input class="form-check-input" type="checkbox" id="confirmado" name="usuario[confirmado]" value="1" <?php echo ($usuario->confirmado == 1) ? "checked" : ""; ?>>

      </div>

  </div>
  <input type="hidden" id="fecha_creacion" name="usuario[fecha_creacion]" value="<?php echo s($usuario->fecha_creacion); ?>">