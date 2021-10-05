<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Administrar Usuarios
    </h1>
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
              <th style="width: 10px">Numero de empleado</th>
              <th>Nombre</th>
              <th>Foto</th>
              <th>Perfil</th>
              <th>Email</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody>

            <?php

              $item = null;
              $valor = null;

              $usuario = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
              foreach ($usuario as $key => $value) {
                echo '<tr>
                        <td>'.$value["employeer_No"].'</td>
                        <td>'.$value["name"].' '.$value["last_name"].'</td>';

                        if ($value["image"] != "") {

                          echo '<td><img src="'.$value["image"].'" class="img-thumbnail" width="40px"></td>';

                        }else{

                          echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';

                        }

                        echo '<td>'.$value["rol"].'</td>
                        <td>'.$value["email"].' 
                        <td><button class="btn btn-success btn-xs">'.$value["employment_status"].'</button></td>
                        <td>
                          <div class="btn-group">
                            <button class="btn btn-warning btnEditarUsuario" idEmployeer_No="'.$value["employeer_No"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="bx bx-pencil" ></i></button>
                            <button class="btn btn-danger btnEliminarUsuario" idEmployeer_No="'.$value["employeer_No"].'" fotoUsuario="'.$value["image"].'" name="'.$value["name"].'"><i class="bx bx-x" ></i></button>
                          </div>
                        </td>
                      </tr>';
              }

            ?>
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
            <!-- Entrada para Numero de empleado -->
             <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class='bx bxs-user' ></i></span>
                <input type="text" class="form-control input-group-lg" name="nuevoNumeroE" placeholder="Ingresar Numero de Empleado" required>
              </div>
            </div>
            <!-- Entrada para Nombre -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class='bx bxs-user' ></i></span>
                <input type="text" class="form-control input-group-lg" name="nuevoNombre" placeholder="Ingresar Nombre" required>
              </div>
            </div>
            <!-- Entrada para Apellido Paterno -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class='bx bxs-user-rectangle' ></i></span>
                <input type="text" class="form-control input-group-lg" name="nuevoApellidoP" placeholder="Ingresar Primer Apellido" required>
              </div>
            </div>
            <!-- Entrada para Apellido Materno -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class='bx bxs-user-rectangle' ></i></span>
                <input type="text" class="form-control input-group-lg" name="nuevoApellidoM" placeholder="Ingresar Segundo Apellido" required>
              </div>
            </div>
            <!-- Entrada para Grupo de empleados -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class='bx bxs-user-rectangle' ></i></span>
                <input type="text" class="form-control input-group-lg" name="nuevoGrupoE" placeholder="Ingresar Grupo de Empleados" required>
              </div>
            </div>
            <!-- Entrada para Email -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class='bx bxs-user-rectangle' ></i></span>
                <input type="text" class="form-control input-group-lg" name="nuevoEmail" placeholder="Ingresar email" required>
              </div>
            </div>
            <!-- Entrada para direccion -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class='bx bxs-user-rectangle' ></i></span>
                <input type="text" class="form-control input-group-lg" name="nuevoDireccion" placeholder="Ingresar Dirección" required>
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
            <!-- Entrada para numero de celular -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class='bx bxs-user-rectangle' ></i></span>
                <input type="text" class="form-control input-group-lg" name="nuevoNcelular" placeholder="Ingresar Numero de celular" required>
              </div>
            </div>
            <!-- Entrada para unidad organizacional -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class='bx bxs-user-rectangle' ></i></span>
                <input type="text" class="form-control input-group-lg" name="nuevoUnidadO" placeholder="Ingresar Unidad Organizacional" required>
              </div>
            </div>
            <!-- Entrada para subarea -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class='bx bxs-user-rectangle' ></i></span>
                <input type="text" class="form-control input-group-lg" name="nuevoSubarea" placeholder="Ingresar Subarea" required>
              </div>
            </div>
             <!-- Entrada para usuario-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class='bx bx-lock-alt' ></i></span>
                <input type="text" class="form-control input-group-lg" name="nuevoUsuario" placeholder="Ingresar un Usuario" required>
              </div>
            </div>
            <!-- Entrada para contraseña -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class='bx bx-lock-alt' ></i></span>
                <input type="password" class="form-control input-group-lg" name="nuevoPassword" placeholder="Ingresar Contraseña" required>
              </div>
            </div>
          
            <!-- Entrada para subir foto -->
            <div class="form-group">
              <div class="card">
                Subir Foto
              </div>
              <input type="file" class="nuevaFoto" name="nuevaFoto">
              <p class="">Peso máximo de la foto: 2MB</p>
              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
            </div>
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Usuario</button>
        </div>

        <?php
          $crearUsuario = new ControladorUsuarios();
          $crearUsuario -> ctrCrearUsuario();
        ?>

      </form>
    </div>
  </div>
</div>



<!--==== FIN Modal Agregar Usuario  ====-->

<!--=====================================
=            Modal Editar Usuario           =
======================================-->
<!-- The Modal -->
<div class="modal fade" role="dialog" id="modalEditarUsuario">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Modal Header -->
        <div class="modal-header" style="background: #d81b60; color: white">
          <h4 class="modal-title">Editar Usuario</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="box-body">
            <!-- Entrada para Nombre -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class='bx bxs-user' ></i></span>
                <input type="text" class="form-control input-group-lg" id="editarNombre" name="editarNombre" value="" required>
              </div>
            </div>
            <!-- Entrada para Last name -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class='bx bxs-user-rectangle' ></i></span>
                <input type="text" class="form-control input-group-lg" id="editarLast_name" name="editarLast_name" value="" readonly>
              </div>
            </div>
             <!-- Entrada para Second name -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class='bx bxs-user-rectangle' ></i></span>
                <input type="text" class="form-control input-group-lg" id="editarSecond_name" name="editarSecond_name" value="" readonly>
              </div>
            </div>
             <!-- Entrada para Grupo empleados -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class='bx bxs-user-rectangle' ></i></span>
                <input type="text" class="form-control input-group-lg" id="editarGrupoE" name="editarGrupoE" value="" readonly>
              </div>
            </div>
            <!-- Entrada para emil -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class='bx bxs-user-rectangle' ></i></span>
                <input type="text" class="form-control input-group-lg" id="editarEmail" name="editarEmail" value="" readonly>
              </div>
            </div>
            <!-- Entrada para direccion -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class='bx bxs-user-rectangle' ></i></span>
                <input type="text" class="form-control input-group-lg" id="editarDireccion" name="editarDireccion" value="" readonly>
              </div>
            </div>
            <!-- Entrada para seleccionar perfil -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class='bx bxs-user-detail' ></i></span>
                <select class="form-control input-group-lg" name="editarPerfil">
                  <option value="" id="editarPerfil"></option>
                  <option value="Administrador">Administrador</option>
                  <option value="Seguridad">Seguridad</option>
                  <option value="Cliente">Cliente</option>
                </select>
              </div>
            </div>
            <!-- Entrada para celular -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class='bx bxs-user-rectangle' ></i></span>
                <input type="text" class="form-control input-group-lg" id="editarNCelular" name="editarNCelular" value="" readonly>
              </div>
            </div>
            <!-- Entrada para Unidad organzacional< -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class='bx bxs-user-rectangle' ></i></span>
                <input type="text" class="form-control input-group-lg" id="editarUnidadO" name="editarUnidadO" value="" readonly>
              </div>
            </div>
              <!-- Entrada para Subarea < -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class='bx bxs-user-rectangle' ></i></span>
                <input type="text" class="form-control input-group-lg" id="editarSubarea" name="editarSubarea" value="" readonly>
              </div>
            </div>
            <!-- Entrada para contraseña -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class='bx bx-lock-alt' ></i></span>
                <input type="password" class="form-control input-group-lg" name="editarPassword" placeholder="Escriba la nueva Contraseña">
                <input type="hidden" id="passwordActual" name="passwordActual">
              </div>
            </div>
            
            <!-- Entrada para subir foto -->
            <div class="form-group">
              <div class="card">
                Subir Foto
              </div>
              <input type="file" class="nuevaFoto" name="editarFoto">
              <p class="">Peso máximo de la foto: 2MB</p>
              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
              <input type="hidden" name="fotoActual" id="fotoActual">
            </div>
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Modificar Usuario</button>
        </div>

        <?php
          $editarUsuario = new ControladorUsuarios();
          $editarUsuario -> ctrEditarUsuario();
        ?>

      </form>
    </div>
  </div>
</div>

<!--==== FIN Modal Editar Usuario  ====-->

<!--=====================================
    =           Objetos           =
======================================-->

<?php

  $borrarUsuario = new ControladorUsuarios();
  $borrarUsuario -> ctrBorrarUsuario();

?>