<body>

<?php
  include("navMenu.php");
?>

<!-- -----------------BANNER SECTION----------------- -->
  <section id="banner">
    <div class="container">
      <!-- row nos ayudara a crear un contenedor para columnas con filas responsivas -->
      <div class="row">
        <!-- col = columnas, md = columnas para dispositivos medianos y el 6 hace referencia a las 12 columnas de rango -->
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 banner">
          <p class="promo-title">Gestión de activos
            al alcance de tu mano</p>
          <p class="sub-title">Organa es un increíble sistema que te ayudará a planificar
            y administrar cambios en tus activos de una manera fácil y
            comprensible, resolver problemas de manera eficiente y te
            permitirá obtener un control autónomo de tu inventario.</p>
            <!-- align-self-center* nos ayuda a alinear los elementos->flexibles en el centro -->
          <div class="align-self-center btn-banner">
            <a href="login">Ir a Organa</a>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 text-center">
          <div class="img">
            <img src="vistas/img/plantilla/undraw_Success_factors_re_ce93.svg" class="img-fluid">
          </div>  
        </div>
      </div>
    </div>
    <!-- La class bottom-img va en img y el div desaparece -->
    <div class="bottom-img">
      <img src="vistas/img/plantilla/wave.svg">
    </div>
  </section>
  <!-- -----------------FIN BANNER SECTION----------------- -->
  <!-- -----------------SERVICES SECTION----------------- -->
  <!-- pt = padding-top responsivo. pb = padding-bottom responsivo -->
  <section class="pt-2 pb-4">
    <div class="container">
      <div class="row">
        <div class="section-head col-md-12">
          <h4><span>¿GESTIÓN DE TI</span> COMPLEJA?</h4>
          <p>Aqui no conocemos eso, y te demostraremos las
            ventajas que tiene Organa para ti.</p>
        </div>
        <!-- offset permite agregar un espacio vacio a la izq de un col.
        md = para dispositivos medianos -->
        <div class="col-md-5 offset-md-1">
          <div class="item"><span class="icon feature_box_col_one"><i class="fa fa-tachometer"></i></span>
            <h6>Ciclo de vida de los activos</h6>
            <p>El ciclo de vida del activo incluye:
              estado de un activo, custodio, ubicación,
              garantía, fecha de depreciación,
              movimientos y más.</p>
          </div>
        </div>
        <div class="col-md-5">
          <div class="item"><span class="icon feature_box_col_two"><i class="fa fa-archive"></i></span>
            <h6>Inventario de activos</h6>
            <p>Se presenta un inventario integrado para
              que pueda administrar fácilmente toda la
              información sobre un activo, basandose en
              datos como la disponibilidad, ubicación,
              entre otros.</p>
          </div>
        </div>
        <div class="col-md-5 offset-md-1">
          <div class="item"><span class="icon feature_box_col_three"><i class="fa 
                fa-hourglass-half"></i></span>
            <h6>Automatizado y en tiempo real</h6>
            <p>Visualice el estado de cada activo de
              TI en su empresa en tiempo real con
              nuestro inventario automatizado. Detecte
              con anticipación el hardware a actualizar
              o a renovar.</p>
          </div>
        </div>
        <div class="col-md-5">
          <div class="item"><span class="icon feature_box_col_four"><i class="fa 
                fa-database"></i></span>
            <h6>Facilita el control de mantenimiento</h6>
            <p>Implementa un buen sistema de control
              para que los activos tengan un mantenimiento
              periódico, además de programar sus garantias
              en tiempo y forma.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- -----------------FIN SERVICES SECTION----------------- -->
  <!-- -----------------ABOUT----------------- -->
  <section class="about-us pt-1 pb-4">
    <div class="container">
      <div class="row">
        <div class="section-head col-md-12">
          <h4><span>¿POR QUÉ ELEGIR</span> ORGANA?</h4>
        </div>
        <div class="col-md-6 about-us">
          <img src="vistas/img/plantilla/undraw_Operating_system_re_iqsc.svg" class="img-fluid mb-5">
        </div>
        <div class="col-md-6 about-us">
          <p class="about-title">Ventajas</p>
          <ul>
            <li>Documentación de todos los activos dentro de la organización.</li>
            <li>Ayudar a identificar dónde están estos activos en cualquier momento.</li>
            <li>Cálculo de la depreciación de los activos.</li>
            <li>Administrar y reportar datos de activos para respaldar los procesos financieros.</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- -----------------FIN ABOUT----------------- -->

<?php
  include("footerlog.php");
?>