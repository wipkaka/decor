 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="https://valleyparty.vn/upload/company/favicon-15320605862.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <i class="fas fa-user-circle" style="font-size: 30px;color: white;"></i>
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->fullname}}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="admin/dashboard" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="admin/danhmuc" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Danh mục
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="admin/sanpham/danhsach" class="nav-link">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                Sản phẩm
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="admin/slide/danhsach" class="nav-link">
              <i class="nav-icon fas fa-images"></i>
              <p>
                Slides
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="admin/feedback" class="nav-link">
              <i class="nav-icon fas fa-comment-dots"></i>
              <p>
                Feedback
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="admin/news/danhsach" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Tin tức      
              </p>
            </a>
          </li>
          @if (Auth::user()->quyen == 1)
          <li class="nav-item">
            <a href="admin/user/danhsach" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                User      
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="admin/config" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Config
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="admin/config" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Config</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin/store" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cửa hàng</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          @if (Auth::check())
          <li class="nav-item">
            <a href="admin/logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Đăng Xuất      
              </p>
            </a>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>