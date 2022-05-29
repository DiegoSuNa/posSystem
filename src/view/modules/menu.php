<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <section class="sidebar"> <!-- Al parecer el no usar el section 
                            genera un error y no lee el href tner 
                            en cuenta al usar el adminLTE en su ultima
                            version -->
    <!-- Brand Logo -->
    <a href="homepage" class="brand-link">
      <img src="src/view/img/plantilla/icono-blanco.png" alt="ULULU Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ULULU Cigarreria</span>
    </a>

    <div class="sidebar">


      
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
          
            <!-- INICIO -->

          <li class="nav-item active"> <!--El active tambien complementa el 
                                      funcionamiento en el href-->
  
            <a href="homepage" class="nav-link"> <!--Revisar siempre como se 
                                                actualiza el .htacces -->
              <i class="nav-icon fas fa-home"></i>
              <p>
                HomePage
              </p>
            </a>
            </li>
          </li>

            <!-- USUARIOS -->

          <li class="nav-item active">
            <a href="user" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User
              </p>
            </a>
          </li>

            <!-- CATEGORIAS -->

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Categorias
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview active">
              <li class="nav-item">
                <a href="category" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PruebaNav</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-header">EXAMPLES</li>

            <!-- PRODUCTOS -->
            
            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>
                Productos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview active">
              <li class="nav-item">
                <a href="products" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cervezas</p>
                </a>
              </li>
            </ul>
          </li>
            <!-- INFORMES -->

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
              Informes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/invoice.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice</p>
                </a>
              </li>
            </ul>
          </li>

            <!-- EXTRAS -->

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Extras
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Login & Register v1
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</section>
  </aside>