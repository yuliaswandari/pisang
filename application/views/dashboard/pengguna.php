<body class="hold-transition sidebar-collapse layout-top-nav">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="<?= base_url(); ?>/assets/dist/img/bananalogo.jpeg" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
      <div class="container">
        <a href="<?= base_url('dashboard'); ?>" class="navbar-brand">
          <img src="<?= base_url(); ?>/assets/dist/img/bananalogo.jpeg" class="brand-image img-circle elevation-3" style="opacity: .8">

          <span class="brand-text font-weight-light"><?= $sys->first_name;
                                                      echo ' ' . $sys->last_name; ?></span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('dashboard'); ?>" class="nav-link">Dashboard</a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('konsultasi'); ?>" class="nav-link">Konsultasi</a>
            </li>
            <?php if ($user->id_role == 1) { ?>
              <li class="nav-item">
                <a href="<?= base_url('pengguna'); ?>" class="nav-link active">Pengguna</a>
              </li>
            <?php } ?>
          </ul>

          <!-- SEARCH FORM -->
          <!-- <form class="form-inline ml-0 ml-md-3">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </form> 
        </div> -->

          <!-- Right navbar links -->
          <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <li class="nav-item">
              <a class="nav-link" role="button" title="My Profile" data-toggle="modal" data-target="#modal-my-profile<?= $this->session->userdata('id_user'); ?>">
                <i class="fas fa-user-alt"></i> <?= $user->name; ?> (<?= $user->role; ?>)
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button" title="Customize">
                <i class="fas fa-th-large"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="modal" data-target="#modal-sign-out" role="button" title="Logout">
                <i class="fas fa-sign-out-alt"></i>
              </a>
            </li>
          </ul>
        </div>
    </nav>
    <!-- /.navbar -->
    <!-- modal my-profile -->
    <div class="modal fade" id="modal-my-profile<?= $this->session->userdata('id_user'); ?>">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">My Profile</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="<?= base_url('dashboard/updateprofile'); ?>">
              <div>Nama Lengkap</div>
              <div class="input-group mb-3">
                <input name="id_user" type="hidden" value="<?= $user->id_user; ?>">
                <input name="nama" type="text" class="form-control" value="<?= $user->name; ?>">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <div>Email</div>
              <div class="input-group mb-3">
                <input name="email" type="email" class="form-control" value="<?= $user->email; ?>" disabled>
                <div class=" input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div>Password Baru</div>
              <div class="input-group mb-3">
                <input name="password" type="password" class="form-control" placeholder="Minimal 5 karakter">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div>Confirm Password</div>
              <div class="input-group mb-3">
                <input name="cpassword" type="password" class="form-control" placeholder="Minimal 5 karakter">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- modal sign-out -->
    <div class="modal fade" id="modal-sign-out">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Logout</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div>Apakah Anda ingin keluar dari sistem ini?</div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Batal</button>
            <a type="button" href="<?= base_url('dashboard/logout'); ?>" class="btn btn-primary">Ya</a>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?= base_url('home'); ?>" class="brand-link">
        <img src="<?= base_url(); ?>/assets/dist/img/bananalogo.jpeg" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?= $sys->last_name; ?></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= base_url(); ?>/assets/dist/img/user.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= $user->name; ?></a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="<?= base_url('home'); ?>" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('konsultasi'); ?>" class="nav-link">
                <i class="nav-icon fas fa-comments"></i>
                <p>
                  Konsultasi
                </p>
              </a>
            </li>
            <?php if ($user->id_role == 1) { ?>
              <li class="nav-item">
                <a href="<?= base_url('pengguna'); ?>" class="nav-link active">
                  <i class="nav-icon fas fa-users-cog"></i>
                  <p>
                    Pengguna
                  </p>
                </a>
              </li>
            <?php   } ?>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h5 class="m-0">
                <small><label class="text-danger"><?= $this->session->flashdata('errorreply'); ?></label></small>
                <small><label class="text-success"><?= $this->session->flashdata('successreply'); ?></label></small>
              </h5>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Pengguna</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="card card-primary">
                <div class="card-header bg-primary">
                  <h3 class="card-title"><i class="fas fa-users"></i> PENGGUNA SISTEM</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <table id="pengguna" class="table table-hover">
                    <thead>
                      <tr class="text-center">
                        <th>#</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Last Login</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                      foreach ($userall as $row) { ?>
                        <tr class="text-center">
                          <td><?= $no++; ?></td>
                          <td><?= $row->name; ?></td>
                          <td><?= $row->email; ?></td>
                          <td><?= date('d-M-Y H:i', strtotime($row->last_login)); ?></td>
                          <td>
                            <button class="btn btn-sm btn-info" data-toggle="modal" title="Edit User" data-target="#modal-edit-user<?= $row->id_user; ?>"><i class="fas fa-edit"></i></button>
                          </td>
                        </tr>
                        <!-- modal edit-user -->
                        <div class="modal fade" id="modal-edit-user<?= $row->id_user; ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Edit User</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form method="post" action="<?= base_url('dashboard/updateuser'); ?>">
                                  <div>Nama Lengkap</div>
                                  <div class="input-group mb-3">
                                    <input name="id_user" type="hidden" value="<?= $row->id_user; ?>">
                                    <input name="nama" type="text" class="form-control" value="<?= $row->name; ?>">
                                    <div class="input-group-append">
                                      <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                      </div>
                                    </div>
                                  </div>
                                  <div>Email</div>
                                  <div class="input-group mb-3">
                                    <input name="email" type="email" class="form-control" value="<?= $row->email; ?>" disabled>
                                    <div class=" input-group-append">
                                      <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                      </div>
                                    </div>
                                  </div>
                                  <div>Password Baru</div>
                                  <div class="input-group mb-3">
                                    <input name="password" type="password" class="form-control" placeholder="Minimal 5 karakter">
                                    <div class="input-group-append">
                                      <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                      </div>
                                    </div>
                                  </div>
                                  <div>Confirm Password</div>
                                  <div class="input-group mb-3">
                                    <input name="cpassword" type="password" class="form-control" placeholder="Minimal 5 karakter">
                                    <div class="input-group-append">
                                      <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                              </div>
                              </form>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->