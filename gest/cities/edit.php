<?php 
  require '../../include/_settings.inc.php'; 
  CheckAuthBo();

    $event = $db->query('SELECT * FROM city WHERE id = ?', $_GET['i'])->fetchArray();  
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MyItinerary Gest | Editar Cidade - <?= $event['name'] ?></title>

  <!-- Google Font: Inter -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,400i,600,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <?php include BO_DIR . '/include/navbar.inc.php'; ?>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <?php include BO_DIR . '/include/sidebar.inc.php'; ?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 style="font-weight: 600">Editar Cidade</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= BO_URL ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= BO_URL ?>/cities">Cidades</a></li>
              <li class="breadcrumb-item active">Editar Cidade</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <form action="<?= BO_URL ?>/source/cities/edit.php" method="post">
      <div class="row">
        <div class="col-12">
        
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"><?= $event['name'] ?></h3>
  
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName6">ID</label>
                <input type="text" name="id" id="inputName6" value="<?= $event['id'] ?>" readonly class="form-control" required>
              </div>
                <div class="form-group">
                <label for="inputName">Nome</label>
                <input type="text" name="name" id="inputName" value="<?= $event['name'] ?>" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="inputName2">Distrito</label>
                <input type="text" name="district" id="inputName2" value="<?= $event['district'] ?>" class="form-control" required>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12 mb-5">
          <a href="<?= BO_URL ?>/cities" class="btn btn-secondary">Cancelar</a>
          <input type="submit" value="Editar Cidade" class="btn btn-success float-right">
        </div>
      </div>
</form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Copyright &copy; 2021</strong>
    MyItinerary Gest
    <div class="float-right d-none d-sm-inline-block">
      Por Tomás Russo, com template <a href="https://adminlte.io">AdminLTE.io</a>
    </div>
  </footer>

  
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

<script src="../plugins/toastr/toastr.min.js"></script>
<?php include BO_DIR . '/include/toast.inc.php'; ?>
</body>
</html>
