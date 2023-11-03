<?php 
  require '../../include/_settings.inc.php'; 
  CheckAuthBo();

  $users = $db->query('SELECT * FROM user')->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MyItinerary Gest | Utilizadores</title>

  <!-- Google Font: Inter -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,400i,600,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
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
            <h1 style="font-weight: 600">Utilizadores</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= BO_URL ?>">Home</a></li>
              <li class="breadcrumb-item active">Utilizadores</li>
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
          <a href="<?= BO_URL ?>/users/add" class="btn btn-success mb-4"><i class="fas fa-plus mr-2"></i>Novo</a>
            <!-- Default box -->
            <div class="card">
            
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Registado em</th>
                    <th>Último Login em</th>
                    <th>Email Confirmado?</th>
                    <th>Verificado?</th>
                    <th>Permissões</th>
                    <th>Confirmar Email</th>
                    <th>Verificação Utilizador</th>
                    <th>Restringir</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($users as $user): ?>
                  <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['username'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['createdAt'] ?></td>
                    <td><?= $user['lastLoginAt'] ?></td>
                    <td><?= ($user['verifiedAt'] ? 'Sim' : 'Não') ?></td>
                    <td><?= ($user['isVerified'] ? 'Sim' : 'Não') ?></td>
                    <td><?= $user['status'] ?></td>
                    <?php if (!$user['verifiedAt']): ?>
                    <td><a href="<?= BO_URL ?>/source/users/confirm-email.php?i=<?= $user['id'] ?>" class="btn btn-success" title="Confirmar email"><i class="fas fa-envelope"></i></a></td>
                    <?php else: ?>
                    <td>Email confirmado</td>
                    <?php endif; ?>
                    <td><a href="<?= BO_URL ?>/source/users/verify.php?i=<?= $user['id'] ?>" <?php if (!$user['isVerified']): ?>class="btn btn-success" title="Verificar utilizador"<?php else: ?>class="btn btn-danger" title="Retirar verificação"<?php endif; ?>><i class="fas fa-check-circle"></i></a></td>
                    <td><a href="<?= BO_URL ?>/source/users/restrict.php?i=<?= $user['id'] ?>" <?php if ($user['status'] == -1): ?>class="btn btn-danger" title="Retirar restrição"<?php else: ?>class="btn btn-success" title="Aplicar restrição"<?php endif; ?>><i class="fas fa-hand-paper"></i></a></td>
                    <td><a href="<?= BO_URL ?>/users/edit?i=<?= $user['id'] ?>" class="btn btn-primary" title="Editar utilizador"><i class="fas fa-pen"></i></a></td>
                    <td><a href="<?= BO_URL ?>/source/users/delete.php?i=<?= $user['id'] ?>" class="btn btn-danger" title="Eliminar utilizador"><i class="fas fa-trash-alt"></i></a></td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Registado em</th>
                    <th>Último Login em</th>
                    <th>Email Confirmado?</th>
                    <th>Verificado?</th>
                    <th>Permissões</th>
                    <th>Confirmar Email</th>
                    <th>Verificação Utilizador</th>
                    <th>Restringir</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                  </tr>
                  </tfoot>
                </table>
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
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="../plugins/toastr/toastr.min.js"></script>
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
