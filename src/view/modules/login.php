<div id="back"></div>

<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <img src="src/view/img/plantilla/logo-negro-bloque.png" class="img-responsive" width="250" height="100">
    </div>
    <div class="card-body">
      <p class="login-box-msg">Bienvenido al sistema de la empresa ULULU</p>

      <form method="post"> <!-- El action no se usa en la programacion dirigida a objetos -->
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="ingPassword" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>

        <?php
      $login = new ControladorUsuarios();
      $login -> ctrIngresoUsuario();

        ?>

      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->