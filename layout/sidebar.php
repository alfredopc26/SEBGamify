<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/Logo-SEB.jpeg" alt="AdminLTE Logo" class="brand-image img-circle elevation-4"
           style="opacity: .8">
      <span class="brand-text font-weight-light">S.E.B</span> Gamify
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/icon_base.png" class="img-circle elevation-2 bg-white" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $user->name." ".$user->last_name; ?></a>
          <span class="d-block text-white"><?php echo strtoupper($user->kind); ?></span>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item" <?php if(!$mod['dashboard']){ echo "style='display: none'"; }?>>
                <a href="index.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Dashboard
                </p>
                </a>
           </li>
           <li class="nav-item" <?php if(!$mod['gestion_estudiante']){ echo "style='display: none'"; }?>>
            <a href="gestion_estudiantes.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Gestion de estudiantes
              </p>
            </a>
           </li>
           <li class="nav-item" <?php if(!$mod['gestion_actividades']){ echo "style='display: none'"; }?>>
            <a href="gestion_actividades.php" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                Gestion de Actividades
              </p>
            </a>
           </li>
           <li class="nav-item" <?php if(!$mod['gestion_ecoins']){ echo "style='display: none'"; }?>>
            <a href="gestion_ecoins.php" class="nav-link">
              <i class="nav-icon fas fa-coins"></i>
              <p>
                Gestion de E-Coins
              </p>
            </a>
           </li>
           <li class="nav-item" <?php if(!$mod['gestion_asignatura']){ echo "style='display: none'"; }?>>
            <a href="gestion_asignaturas.php" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Gestion de Asignaturas
              </p>
            </a>
           </li>
          <li class="nav-item has-treeview" <?php if(!$mod['configuracion']){ echo "style='display: none'"; }?>>
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Configuracion
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="gestion_user.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gestionar Usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="gestion_ecoins.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Configuracion de E-coins</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="gestion_asignaturas.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Configurar Asignaturas</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>