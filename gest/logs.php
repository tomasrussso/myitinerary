<?php 
  require '../include/_settings.inc.php'; 
  CheckAuthBo();

  $events = $db->query('SELECT * FROM log ORDER BY createdAt DESC')->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MyItinerary Gest | Logs</title>

  <!-- Google Font: Inter -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,400i,600,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
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
            <h1 style="font-weight: 600">Logs</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= BO_URL ?>">Home</a></li>
              <li class="breadcrumb-item active">Logs</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <a href="<?= BO_URL ?>/source/logs/delete.php" class="btn btn-danger mb-4"><i class="fas fa-trash-alt mr-2"></i>Limpar Tudo</a>
            <!-- Default box -->
            <div class="card">
            
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>ID Utilizador</th>
                    <th>ID Sessão</th>
                    <th>IP</th>
                    <th>Browser*</th>
                    <th>Tipo Dispositivo*</th>
                    <th>Plataforma (S.O.)*</th>
                    <th>Ação</th>
                    <th>Data</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($events as $user): ?>
                  <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['idUser'] ?></td>
                    <td><?= $user['session'] ?></td>
                    <td><?= $user['ip'] ?></td>
                    <td><?= $user['browserInfo'] ?></td>
                    <td><?= $user['deviceType'] ?></td>
                    <td><?= $user['platform'] ?></td>
                    <td><?= $user['action'] ?></td>
                    <td><?= $user['createdAt'] ?></td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>ID</th>
                    <th>ID Utilizador</th>
                    <th>ID Sessão</th>
                    <th>IP</th>
                    <th>Browser*</th>
                    <th>Tipo Dispositivo*</th>
                    <th>Plataforma (S.O.)*</th>
                    <th>Ação</th>
                    <th>Data</th>
                  </tr>
                  </tfoot>
                </table>
                <p class="font-weight-bold mt-4">* NOTA: Em web.colgaia.local, esta funcionalidade não está disponível.</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Copyright &copy; 2021</strong>
    TicketSpace Gest
    <div class="float-right d-none d-sm-inline-block">
      Por Tomás Russo, com template <a href="https://adminlte.io">AdminLTE.io</a>
    </div>
  </footer>
  
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="plugins/toastr/toastr.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<?php include BO_DIR . '/include/toast.inc.php'; ?>
</body>
</html>
