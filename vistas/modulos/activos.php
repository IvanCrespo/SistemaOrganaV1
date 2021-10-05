<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Administrar Activos
    </h1>

    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar Activos</li>
    </ol>
  </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
          Agregar Activo
        </button>
      </div>

      <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive nowrap tablas">
          <thead>
            <tr>
              <th style="width: 10px">Numero de serie</th>
              <th>Hostname</th>
              <th>Status</th>
              <th>Company</th>
              <th>Numero de Usuario</th>
              
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody>

            <?php

              $item = null;
              $valor = null;

              $activo = ControladorActivos::ctrMostrarActivos($item, $valor);
              foreach ($activo as $key => $value) {
                echo '<tr>
                        <td>'.$value["serial_number"].'</td>
                        <td>'.$value["hostname"].'</td>
                        <td>'.$value["status"].'</td>
                        <td>'.$value["company"].'</td>
                        <td>'.$value["Usuario_employeer_No"].'</td>
                        <td><button class="btn btn-success btn-xs">Activado</button></td>
                        
                        <td>
                          <div class="btn-group">
                            <button class="btn btn-warning"><i class="bx bx-pencil" ></i></button>
                            <button class="btn btn-danger"><i class="bx bx-x" ></i></button>
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
      <!-- /.box-body -->
      <div class="box-footer">
        Footer
      </div>
    <!-- /.box-footer-->
    </div>
  <!-- /.box -->
  </section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->