<!-- -----------------NAV MENU----------------- -->
  <section id="nav-bar">
    <nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: white;">
      <div class="container">
        <!-- Nota importante: Esta parte de a y buttom es para el icono bars o menu desplegable
        y sirve cuando se ejecuta en dispositivos moviles / contrae todas las opciones del menu para
        ponerlo en un desplegable -->
        <a class="navbar-brand" href="pageTS"><img src="vistas/img/plantilla/T-S_logo_pink.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars"></i>
        </button>
        <!-- collapse indica que el contenido plegable se puede ocultar o mostrar. navbar-collapse nos ayudara 
        a realizar la accion de collapse pero con los iconos. -->
        <div class="collapse navbar-collapse" id="navbarNav">
          <!-- navbar-nav es el contenedor para los enlaces de navegación. mr = margin-right con rango de 0-5 y auto
          w = width 100%. justify-content-end ayuda a que los elementos flexibles se ubiquen al final -->
          <ul class="navbar-nav mr-auto w-100 justify-content-end">
            <!-- nav-item se utiliza para los estilos de los elementos de la lista de nav.
            nav-link se usan para diseñr los enlaces de nav -->
            <li class="nav-item">
              <a class="nav-link" href="pageTS">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="mantenimiento">Manual de Usuario</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login">Iniciar Sesión</a>
            </li>
          </ul>
        </div>
        <!-- Esta parte es para los lenguajes pero se tendra que checar primero -->
        <!-- <div class="lang-menu">
          <div class="selected-lang">
            English
          </div>
        </div> -->
      </div>
    </nav>
  </section>
  <!-- -----------------FIN NAV MENU----------------- -->