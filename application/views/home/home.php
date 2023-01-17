<body class="hold-transition sidebar-collapse layout-top-nav">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="<?= base_url(); ?>/assets/dist/img/bananalogo.jpeg" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
      <div class="container">
        <a href="<?= base_url('home'); ?>" class="navbar-brand">
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
              <a href="<?= base_url('home'); ?>" class="nav-link active">Home</a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('register'); ?>" class="nav-link">Register</a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('login'); ?>" class="nav-link">Login</a>
            </li>
          </ul>

          <!-- Right navbar links -->
          <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">

            <li class="nav-item">
              <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button" title="Customize">
                <i class="fas fa-th-large"></i>
              </a>
            </li>

          </ul>
        </div>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?= base_url('home'); ?>" class="brand-link">
        <img src="<?= base_url(); ?>/assets/dist/img/bananalogo.jpeg" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?= $sys->last_name; ?></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <br />
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="<?= base_url('home'); ?>" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Home
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('register'); ?>" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Register
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('login'); ?>" class="nav-link">
                <i class="nav-icon fas fa-sign-in-alt"></i>
                <p>
                  Login
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="background-image: url('/../../../pisang/assets/dist/img/banana.jpeg'); background-size: cover;">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
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
            <div class="col-lg-8">
              <div class="card card-primary">
                <div class="card-header bg-primary">
                  <h3 class="card-title"><i class="fas fa-question-circle"></i> TENTANG APLIKASI</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div>Pisang adalah buah yang paling banyak dikonsumsi oleh orang Indonesia. Rasanya yang manis dengan tekstur yang empuk membuatnya sangat digemari oleh masyarakat. Untuk menghasilkan kualitas buah pisang yang terbaik ada beberapa hal yang perlu diperhatikan. Salah satunya penggunaan Bibit Tanaman Pisang unggul dan bermutu. Bibit unggul dan bermutu merupakan salah satu kunci untuk mendapatkan pertanaman yang mampu memberikan hasil yang optimal. Pengaruh bibit pisang yang kurang bagus dapat menyebabkan pertumbuhan yang lambat sehingga panen pisang terhambat.</div>
                    <br />
                    <div>Berdasarkan uraian tersebut, peneliti memandang perlunya membangun aplikasi untuk Pemilihan Bibit Tanaman Pisang. Peran Sistem Sistem Pakar sangat dibutuhkan guna meningkatkan efisiensi dan ketepatan dalam pengambilan keputusan. Peran Sistem Pakar akan membantu pihak pembibitan pisang bahkan orang – orang yang belum paham tentang pemilihan bibit unggul tanaman pisang dapat terbantu dalam memilih bibit unggul tanaman tersebut.</div>
                  </div>
                  <div class="row">
                    <div class="col-8"></div>
                  </div>
                  </form>
                </div>
              </div>

              <div class="card card-primary">
                <div class="card-header bg-primary">
                  <h3 class="card-title"><i class="fas fa-info-circle"></i> PETUNJUK PENGGUNAAN</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <!--  <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button> -->
                  </div>
                </div>
                <div class="card-body">

                  <div class="row">
                    <ol>
                      <li>Register terlebih dahulu untuk mendapatkan akun.</li>
                      <li>Satu alamat email hanya untuk satu akun.</li>
                      <li>Login menggunakan akun yang sudah didaftarkan.</li>
                      <li>Jawab pertanyaan yang tersedia untuk mendapatkan hasil analisis mengenai bibit pisang Anda.</li>
                      <li>Hasil analisis tersimpan. Selesai.</li>
                    </ol>
                  </div>

                  <div class="row">
                    <div class="col-8"></div>
                  </div>
                  </form>

                </div>
              </div>

            </div>
            <!-- /.col-md-6 -->
            <div class="col-lg-4">
              <div class="card card-primary">
                <div class="card-header bg-primary">
                  <h3 class="card-title m-0"><i class="fas fa-users"></i> TEAMS</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div style="text-align: center">
                    <img src="<?= base_url(); ?>/assets/dist/img/Yumarlin.jpeg" width="50%" />
                    <br /><br />
                    <img src="<?= base_url(); ?>/assets/dist/img/Rohmat.jpeg" width="50%" />
                  </div>
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