<body style="background-image: url('vistas/img/plantilla/IM-microsoft-news-data.jpg');">
<?php
  include("navMenu.php");
?>
<!-- -----------------LOGIN----------------- -->
  <section class="login">
    <div class="container">
      <!-- px = paddign left y right y solo pueden tomarse valores de 0 a 5 -->
      <div class="row px-3">
        <!-- col son columnas. lg es un diseño de col para dispositivos grandes. 
        xl es para dispositivos extra grandes. card es para crear una caja bordeada que esta alrededor de un contenido.
        flex-row nos ayudara a controlar los diseños de los componentes flexibles horizontalmente.
        mx-auto para centrar los elementos horizontalmente-->
        <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0 text-center">
          <!-- d-none servira para ocultar nuestra imagen al hacerse responsive. 
          d-md-flex para crear un contenedor flexible y transformar sus elementos secundarios en elementos flex,
          además especificando con md que sera para dispositivos medianos -->
          <div class="img-left d-none d-md-flex" style="background-image: url('vistas/img/plantilla/image.png');">
            <img src="vistas/img/plantilla/undraw_At_work_re_qotl.svg" class="img-fluid">
          </div>
          <!-- card-body es una clase para crear una tarjeta de contenido -->
          <div class="card-body">
            <div class="brand-wrapper">
              <img src="vistas/img/plantilla/T-S_logo_pink.png" class="logo">
            </div>
            <!-- mt es margin-top y solo tiene un rango de 0-5 y auto -->
            <h5 class="title text-center mt-4">Hola!</h5>
            <p>Iniciar Sesión con tu Cuenta</p>
            <form class="form-box px-3 text-center" method="post">
              <div class="form-input">
                <span><i class="fa fa-user-o"></i></span>
                <input type="text" name="ingUsuario" placeholder="Nombre de Usuario" required>
              </div>
              <div class="form-input">
                <span><i class="fa fa-key"></i></span>
                <input type="password" name="ingContraseña" placeholder="Contraseña" required>
              </div>
              <!-- mb es margin-bottom y al igual que margint-top tiene rango de 0-5 y auto -->
              <div class="mb-4 text-center">
                <a href="#" class="forget-link">
                  Olvidaste tu contraseña?
                </a>
              </div>
              <div>
                <!-- btn es la clase para crear un boton basico. text-uppercase hace que el texto sea en mayúsculas -->
                <button type="submit" class="btn text-uppercase">
                  Iniciar Sesión
                </button>
              </div>
              <!-- my hace referencia a margin-top y bottom con rangos de 0-5 y auto -->
              <hr class="my-4">

              <!-- Instancia de una clase para mandar a llamar a una función -->
              <?php
                $login = new ControladorUsuarios();
                $login ->ctrIngresoUsuario();
              ?>

            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- -----------------FIN LOGIN----------------- -->
<?php
  include("footerlog.php");
?>