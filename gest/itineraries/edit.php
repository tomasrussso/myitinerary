<?php 
  require '../../include/_settings.inc.php'; 
  CheckAuthBo();

    $event = $db->query('SELECT i.*, u.name FROM itinerary AS i INNER JOIN user AS u ON i.idUser = u.id WHERE i.id = ?', $_GET['i'])->fetchArray();  
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MyItinerary Gest | Editar Itinerário - <?= $event['title'] ?></title>

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
          <h1 style="font-weight: 600">Editar Itinerário</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= BO_URL ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= BO_URL ?>/itineraries">Itinerários</a></li>
              <li class="breadcrumb-item active">Editar Itinerário</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <form action="<?= BO_URL ?>/source/itineraries/edit.php" method="post">
      <div class="row">
        <div class="col-12">
        
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"><?= $event['title'] ?></h3>
  
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
                <label for="inputName10">Autor</label>
                <input type="text" name="iduser" id="inputName10" value="<?= $event['idUser'] ?> - <?= $event['name'] ?>" readonly class="form-control" required>
              </div>
                <div class="form-group">
                <label for="inputName">Título</label>
                <input type="text" name="title" id="inputName" value="<?= $event['title'] ?>" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="inputName2">Slug</label>
                <input type="text" name="slug" id="inputName2" value="<?= $event['slug'] ?>" class="form-control" required>
              </div>
              <div class="form-group">
              <label for="inputName5">Duração</label>
                <input type="text" name="duration" id="inputName5" value="<?= $event['duration'] ?>"  class="form-control" required>
              </div>
              <div class="form-group">
                <label for="inputName8">Descrição</label>
                <textarea id="inputName8" name="description" class="form-control" rows="4"><?= $event['description'] ?></textarea>
              </div>
              <div class="form-group">
              <label for="inputDescription1">HTML</label>
                <textarea id="inputDescription1" name="html" class="form-control" rows="4"><?= $event['contentHTML'] ?></textarea>
              </div>
              <div class="form-group">
              <label for="inputDescription">JSON</label>
                <textarea id="inputDescription" name="json" class="form-control" rows="4"><?= $event['contentJSON'] ?></textarea>
              </div>
              <div class="form-group">
              <label for="inputName9">Caminho da Foto de Capa</label>
                <input type="text" name="wallpaper" id="inputName9" value="<?= $event['wallpaperPath'] ?>"  class="form-control" required>
              </div>
              <div class="form-group">
              <label for="inputStatus">Visibilidade</label>
                <select id="inputStatus" name="visibility" class="form-control custom-select">
                  <option disabled>Selecione...</option>
                  <option <?= ($event['isPrivate'] ? '' : 'selected') ?> value="0">Público</option>
                  <option <?= ($event['isPrivate'] ? 'selected' : '') ?> value="1">Privado</option>
                </select>
              </div>
              <div class="form-group">
              <label for="inputName11">Estado</label>
                <input type="number" name="status" max="2" min="-1" value="<?= $event['status'] ?>" id="inputName11" class="form-control" required>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12 mb-5">
          <a href="<?= BO_URL ?>/itineraries" class="btn btn-secondary">Cancelar</a>
          <input type="submit" value="Editar Itinerário" class="btn btn-success float-right">
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
