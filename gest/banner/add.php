<?php 
  require '../../include/_settings.inc.php'; 
  CheckAuthBo();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MyItinerary Gest | Nova Cidade do Banner</title>

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
          <h1 style="font-weight: 600">Nova Cidade do Banner</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= BO_URL ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= BO_URL ?>/banner">Banner</a></li>
              <li class="breadcrumb-item active">Nova Cidade do Banner</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <form action="<?= BO_URL ?>/source/banner/add.php" method="post">
      <div class="row">
        <div class="col-12">
        
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Cidade</h3>
  
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                <label for="inputName">Nome</label>
                <input type="text" name="name" id="inputName" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="inputName2">Descrição</label>
                <input type="text" name="description" id="inputName2" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="inputName3">Nome do Botão</label>
                <input type="text" name="button" id="inputName3" class="form-control">
                <p class="mt-1" style="color: #909090">Opcional</p>
              </div>
              <div class="form-group">
                <label for="inputName4">Caminho da Imagem</label>
                <input type="text" name="image" id="inputName4" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="inputName5">Créditos</label>
                <input type="text" name="credits" id="inputName5" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="inputName6">Estado</label>
                <input type="text" name="status" id="inputName6" class="form-control" required>
              </div>
              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12 mb-5">
          <a href="<?= BO_URL ?>/banner" class="btn btn-secondary">Cancelar</a>
          <input type="submit" value="Criar Nova Cidade" class="btn btn-success float-right">
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
