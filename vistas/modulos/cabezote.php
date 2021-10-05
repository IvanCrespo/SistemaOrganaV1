<!--=====================================
    =            HEADER            =
======================================-->

<header id="header" class="header">
    <div class="header__container">
        <a href="#" class="header__logo">Organa</a>
        <!-- Topbar Search -->
        <form class="d-none d-sm-inline-block form-inline ml-md-5 align-content-center navbar-search">
            <div class="input-group">
                <input type="search" class="form-control bg-light border-0 small header__input" placeholder="Buscar...">
                <div class="input-group-append">
                    <button class="btn btn-color" type="button">
                        <i class="bx bx-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <ul class="header-nav ml-auto mr-4">
            <li class="header-nav-item d-md-down-none mx-2">
                <a class="nav-link bell__custom" href="">
                    <i class='bx bx-bell'></i>
                </a>
            </li>
            <li class="header-nav-item d-md-down-none mx-1">
                <a class="nav-link message__custom" href="">
                    <i class='bx bx-message'></i>
                </a>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="header-nav-item dropdown show">
                <a class="nav-link dropdown-toggle navbarDropdown" role="button" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                	 <?php

            if($_SESSION["image"] != ""){
                echo '<img src="'.$_SESSION["image"].'" alt="" class="header__img">';

            }else{

                echo '<img src="vistas/img/usuarios/default/anonymous.png" alt="" class="header__img">';

            }
            
        ?>

                <span><?php echo $_SESSION["name"]; ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <h1 class="dropdown-header"><?php echo $_SESSION["perfil"]; ?></h1>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item drop__item" href="#">Perfil</a>
                    <a class="dropdown-item drop__item" href="#">Mis Activos</a>
                </div>
            </li>
        </ul>

        <div class="header__toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>
    </div>
</header>
