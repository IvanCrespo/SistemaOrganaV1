<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Administrar Usuarios
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar Usuarios</li>
    </ol>
  </section>
    
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
          Agregar Usuario
        </button>
      </div>

      <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive nowrap tablas">
          <thead>
            <tr>
              <th style="width: 10px">ID</th>
              <th>Nombre</th>
              <th>Usuario</th>
              <th>Foto</th>
              <th>Rol</th>
              <th>Estado</th>
              <th>Ultimo Login</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>1</td>
              <td>Usuario Administrador</td>
              <td>admin</td>
              <td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>
              <td>Administrador</td>
              <td><button class="btn btn-success btn-xs">Activado</button></td>
              <td>2017-12-11 12:05:32</td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-warning"><i class='bx bx-pencil' ></i></button>
                  <button class="btn btn-danger"><i class='bx bx-x' ></i></button>
                </div>
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>Usuario Administrador</td>
              <td>admin</td>
              <td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>
              <td>Administrador</td>
              <td><button class="btn btn-danger btn-xs">Desactivado</button></td>
              <td>2017-12-11 12:05:32</td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-warning"><i class='bx bx-pencil' ></i></button>
                  <button class="btn btn-danger"><i class='bx bx-x' ></i></button>
                </div>
              </td>
            </tr>
          </tbody>

        </table>
      </div>
    </div>
  </section>
</div>

<!--=====================================
=            Modal Agregar Usuario           =
======================================-->
<!-- The Modal -->
<div class="modal fade" role="dialog" id="modalAgregarUsuario">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Modal Header -->
        <div class="modal-header" style="background: #d81b60; color: white">
          <h4 class="modal-title">Agregar Usuario</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="box-body">
            <!-- Entrada para Nombre -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class='bx bxs-user' ></i></span>
                <input type="text" class="form-control input-group-lg" name="nuevoNombre" placeholder="Ingresar Nombre" required>
              </div>
            </div>
            <!-- Entrada para Usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class='bx bxs-user-rectangle' ></i></span>
                <input type="text" class="form-control input-group-lg" name="nuevoUsuario" placeholder="Ingresar Usuario" required>
              </div>
            </div>
            <!-- Entrada para contraseña -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class='bx bx-lock-alt' ></i></span>
                <input type="password" class="form-control input-group-lg" name="nuevoPassword" placeholder="Ingresar Contraseña" required>
              </div>
            </div>
            <!-- Entrada para seleccionar perfil -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class='bx bxs-user-detail' ></i></span>
                <select class="form-control input-group-lg" name="nuevoPerfil">
                  <option value="">Seleccionar Perfil</option>
                  <option value="Administrador">Administrador</option>
                  <option value="Seguridad">Seguridad</option>
                  <option value="Cliente">Cliente</option>
                </select>
              </div>
            </div>
            <!-- Entrada para subir foto -->
            <div class="form-group">
              <div class="card">
                Subir Foto
              </div>
              <input type="file" id="nuevaFoto" name="nuevaFoto">
              <p class="">Peso máximo de la foto: 200MB</p>
              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="100px">
            </div>
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Usuario</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!--==== FIN Modal Agregar Usuario  ====-->
