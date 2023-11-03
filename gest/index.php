<?php 
  require '../include/_settings.inc.php'; 
  CheckAuthBo();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MyItinerary Gest | Dashboard</title>
  <link rel="icon" type="image/png" sizes="32x32" href="<?= SITE_URL ?>/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= SITE_URL ?>/favicon-16x16.png">

  <!-- Google Font: Inter -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,400i,500,600,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?= SITE_URL ?>/images/profile-m.png" alt="MyItinerary" height="60" width="60">
  </div>

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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0" style="font-weight: 600"><?php 
              $hour = date('G');
              if (($hour >= 0 && $hour < 5) || $hour >= 20) echo 'Boa noite, ';
              else if (($hour >= 5 && $hour < 13)) echo 'Bom dia, ';
              else echo 'Boa tarde, ';
              echo $_SESSION['auth-bo']['user']['name'];
            ?>!</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Home</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row"><div class="col-auto"><h5 class="mb-2">Estado do Site</h5></div></div>
        <div class="row"><div class="col-auto"><p class="mb-4" id="maintenance"><?php if (MAINTENANCE): ?><span class="text-danger">O site está em modo de manutenção.</span> <a href="javascript:void(0)" onclick="ChangeMaintenance('off')">Desativar modo de manutenção</a><?php else: ?><span class="text-success">O site está ativo.</span> <a href="javascript:void(0)" onclick="ChangeMaintenance('on')">Ativar modo de manutenção</a><?php endif; ?></p></div></div>
        <div class="row"><div class="col-auto"><h5 class="mb-2">Estatísticas Diárias (<?= date('d/m/Y') ?>)</h5></div></div>
        <div class="row"><div class="col-auto"><p class="mb-0"><a href="#clean-stats" data-toggle="modal" data-target="#clean-stats">Limpar as estatísticas diárias</a></p><p class="mb-3" id="logs"><?php if (REGISTER_LOGS): ?><span class="text-success">O registo de estatísticas está ligado.</span> <a href="javascript:void(0)" onclick="ChangeRegisterLogs('off')">Desligar registo de estatísticas</a><?php else: ?><span class="text-danger">O registo de estatísticas está desligado.</span> <a href="javascript:void(0)" onclick="ChangeRegisterLogs('on')">Ligar registo de estatísticas</a><?php endif; ?></p></div></div>
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $db->query("SELECT COUNT(DISTINCT session) AS count FROM log WHERE action LIKE 'Visit:%' AND DATE_FORMAT(createdAt, '%Y-%m-%d') = CURRENT_DATE()")->fetchAll()[0]['count'] ?></h3>

                <p>Visitas</p>
              </div>
              <div class="icon">
                <i class="fas fa-eye"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-purple">
              <div class="inner">
                <h3><?= $db->query("SELECT COUNT(DISTINCT session) AS count FROM log WHERE action = 'Login' AND DATE_FORMAT(createdAt, '%Y-%m-%d') = CURRENT_DATE()")->fetchAll()[0]['count'] ?></h3>

                <p>Logins</p>
              </div>
              <div class="icon">
                <i class="fas fa-sign-in-alt"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $db->query("SELECT COUNT(session) AS count FROM log WHERE action LIKE 'Create itinerary-%' AND DATE_FORMAT(createdAt, '%Y-%m-%d') = CURRENT_DATE()")->fetchAll()[0]['count'] ?></h3>

                <p>Itinerários Criados</p>
              </div>
              <div class="icon">
                <i class="fas fa-map"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-pink">
              <div class="inner">
                <h3><?= $db->query("SELECT COUNT(session) AS count FROM log WHERE action LIKE 'Email %' AND DATE_FORMAT(createdAt, '%Y-%m-%d') = CURRENT_DATE()")->fetchAll()[0]['count'] ?></h3>

                <p>Emails Enviados</p>
              </div>
              <div class="icon">
                <i class="fas fa-envelope"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $db->query("SELECT COUNT(session) AS count FROM log WHERE action LIKE 'Signin:%' AND DATE_FORMAT(createdAt, '%Y-%m-%d') = CURRENT_DATE()")->fetchAll()[0]['count'] ?></h3>

                <p>Novos Registos</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $db->query("SELECT COUNT(session) AS count FROM log WHERE action LIKE 'Delete account' AND DATE_FORMAT(createdAt, '%Y-%m-%d') = CURRENT_DATE()")->fetchAll()[0]['count'] ?></h3>

                <p>Contas Eliminadas</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-minus"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-orange">
              <div class="inner">
              <h3><?= $db->query("SELECT COUNT(session) AS count FROM log WHERE action = 'Login to backoffice' AND DATE_FORMAT(createdAt, '%Y-%m-%d') = CURRENT_DATE()")->fetchAll()[0]['count'] ?></h3>

                <p>Logins MIGest</p>
              </div>
              <div class="icon">
                <i class="fas fa-cog"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-navy">
              <div class="inner">
                <h3><?= $db->query("SELECT COUNT(session) AS count FROM log WHERE action LIKE 'CSRF not valid:%' AND DATE_FORMAT(createdAt, '%Y-%m-%d') = CURRENT_DATE()")->fetchAll()[0]['count'] ?></h3>

                <p>CSRF não válido</p>
              </div>
              <div class="icon">
                <i class="fas fa-exclamation-circle"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row mt-3"><div class="col-auto"><h5 class="mb-3">Estatísticas Gerais</h5></div></div>
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-fuchsia">
              <div class="inner">
                <h3><?= $db->query("SELECT COUNT(id) AS count FROM user")->fetchAll()[0]['count'] ?></h3>

                <p>Utilizadores Totais</p>
              </div>
              <div class="icon">
                <i class="fas fa-user"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-teal">
              <div class="inner">
                <h3><?= $db->query("SELECT COUNT(id) AS count FROM user WHERE status = 1 OR status = 2")->fetchAll()[0]['count'] ?></h3>

                <p>Utilizadores Válidos</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-check"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-maroon">
              <div class="inner">
              <h3><?= $db->query("SELECT COUNT(id) AS count FROM itinerary")->fetchAll()[0]['count'] ?></h3>

                <p>Itinerários Totais</p>
              </div>
              <div class="icon">
                <i class="fas fa-map"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-gray">
              <div class="inner">
              <h3><?= $db->query("SELECT COUNT(id) AS count FROM itinerary WHERE status = 1")->fetchAll()[0]['count'] ?></h3>

                <p>Itinerários Válidos</p>
              </div>
              <div class="icon">
                <i class="fas fa-map"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-6 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card card-white">
              <div class="card-header">
                <h3 class="card-title">Dispositivos utilizados</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="devices-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>

            <div class="card card-white">
              <div class="card-header">
                <h3 class="card-title">Plataformas utilizadas</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="platforms-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-6 connectedSortable">
            <div class="card card-white">
              <div class="card-header">
                <h3 class="card-title">Navegadores utilizados</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="browsers-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card card-white">
              <div class="card-header">
                <h3 class="card-title">Visitas por página</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="pages-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </section>
          <!-- right col -->
          <section class="col-lg-12 connectedSortable">
            <div class="card card-white">
              <div class="card-header">
                <h3 class="card-title">Variação de visitas nos últimos 14 dias</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="visits-14-days" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </section>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
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

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<script src="plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<div class="modal fade" id="clean-stats">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Confirma a ação?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Está prestes a apagar <b>todos</b> os dados de estatísticas correspondentes ao dia de hoje. Prosseguir?</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <a href="<?= BO_URL ?>/source/home/clean-stats.php" class="btn btn-danger">Limpar</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<script>
  function ChangeMaintenance(action) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("maintenance").innerHTML = this.responseText;
          }
      };
      xmlhttp.open("GET", "<?= BO_URL ?>/source/home/change-maintenance.php?a=" + action, true);
      xmlhttp.send();
  }

  function ChangeRegisterLogs(action) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("logs").innerHTML = this.responseText;
          }
      };
      xmlhttp.open("GET", "<?= BO_URL ?>/source/home/change-register-logs.php?a=" + action, true);
      xmlhttp.send();
  }
</script>
<?php
  // Get all device types
  $deviceTypes = $db->query('SELECT DISTINCT deviceType AS device FROM log')->fetchAll();

  // Get all browsers
  $browsers = $db->query('SELECT DISTINCT browserInfo AS browser FROM log')->fetchAll();

  // Get all platforms
  $platforms = $db->query('SELECT DISTINCT platform FROM log')->fetchAll();

  // Get all pages
  $result = $db->query("SELECT DISTINCT(action) AS page FROM log WHERE action LIKE 'Visit:%'")->fetchAll();
  $pages = array();
  foreach ($result as $page) {
    $pageArray = explode(':', $page['page']);
    $pageName = end($pageArray);
    if (strpos($pageName, '-')) {
      // Remove details from pages
      $pageArray = explode('-', $pageName);
      $pageName = $pageArray[0];
    }
    if (!in_array($pageName, $pages)) {
      array_push($pages, $pageName);
    }
  }
?>
<script>
  $(function () {
    // Devices
    var pieChartCanvas = $('#devices-chart').get(0).getContext('2d')
    var data        = {
      labels: [
          <?php foreach ($deviceTypes as $type): ?>
            '<?= $type['device'] ?>',
          <?php endforeach; ?>
      ],
      datasets: [
        {
          data: [<?php foreach ($deviceTypes as $type): $c = $db->query('SELECT COUNT(DISTINCT session) AS count FROM log WHERE deviceType = ?', $type['device'])->fetchAll()[0]; echo $c['count'] . ',';  endforeach; ?>],
          backgroundColor : [<?php foreach ($deviceTypes as $type): echo "'#" . RandomColor() . "',"; endforeach;?>],
        }
      ]
    }
    var pieData        = data;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: data,
      options: pieOptions
    })

    // Browsers
    var pieChartCanvas = $('#browsers-chart').get(0).getContext('2d')
    var data        = {
      labels: [
          <?php foreach ($browsers as $browser): ?>
            '<?= $browser['browser'] ?>',
          <?php endforeach; ?>
      ],
      datasets: [
        {
          data: [<?php foreach ($browsers as $browser): $c = $db->query('SELECT COUNT(DISTINCT session) AS count FROM log WHERE browserInfo = ?', $browser['browser'])->fetchAll()[0]; echo $c['count'] . ',';  endforeach; ?>],
          backgroundColor : [<?php foreach ($browsers as $browser): echo "'#" . RandomColor() . "',"; endforeach;?>],
        }
      ]
    }
    var pieData        = data;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: data,
      options: pieOptions
    })

    // Platforms
    var pieChartCanvas = $('#platforms-chart').get(0).getContext('2d')
    var data        = {
      labels: [
          <?php foreach ($platforms as $platform): ?>
            '<?= $platform['platform'] ?>',
          <?php endforeach; ?>
      ],
      datasets: [
        {
          data: [<?php foreach ($platforms as $platform): $c = $db->query('SELECT COUNT(DISTINCT session) AS count FROM log WHERE platform = ?', $platform['platform'])->fetchAll()[0]; echo $c['count'] . ',';  endforeach; ?>],
          backgroundColor : [<?php foreach ($platforms as $platform): echo "'#" . RandomColor() . "',"; endforeach;?>],
        }
      ]
    }
    var pieData        = data;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: data,
      options: pieOptions
    })

    // Pages
    var tempChartData = {
      labels  : [<?php foreach ($pages as $page): echo "'" . $page . "',"; endforeach; ?>],
      <?php $randomColor = '#' . RandomColor(); ?>
      datasets: [
        {
          label               : 'Visitas',
          backgroundColor     : '<?= $randomColor ?>',
          borderColor         : '<?= $randomColor ?>',
          pointRadius          : false,
          pointColor          : '<?= $randomColor ?>',
          pointStrokeColor    : '<?= $randomColor ?>',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '<?= $randomColor ?>)',
          data                : [<?php foreach ($pages as $page): $r = $db->query("SELECT COUNT(id) AS count FROM log WHERE action LIKE ?", 'Visit:' . $page . '%')->fetchAll()[0]['count']; echo $r . ','; endforeach; ?>]
        },
      ]
    }
    var barChartCanvas = $('#pages-chart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, tempChartData)
    var temp0 = tempChartData.datasets[0]
    barChartData.datasets[0] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false,
      scales: {
         yAxes: [{
             ticks: {
                 beginAtZero: true
             }
         }]
      }
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

    <?php $days = 14; ?>

    // Visitas
    var areaChartData = {
      labels  : [<?php for($i = $days - 1; $i >= 0; $i--): echo "'" . date('d/m', strtotime("-$i days")) . "',"; endfor; ?>],
      <?php $randomColor = '#' . RandomColor(); ?>
      datasets: [
        {
          label               : 'Visitas',
          backgroundColor     : '<?= $randomColor ?>',
          borderColor         : '<?= $randomColor ?>',
          pointRadius          : false,
          pointColor          : '<?= $randomColor ?>',
          pointStrokeColor    : '<?= $randomColor ?>',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '<?= $randomColor ?>',
          data                : [<?php for($i = $days - 1; $i >= 0; $i--): $c = $db->query("SELECT COUNT(DISTINCT session) AS count FROM log WHERE action LIKE 'Visit:%' AND DATE_FORMAT(createdAt, '%Y-%m-%d') = DATE_FORMAT(DATE_SUB(CURRENT_DATE(), INTERVAL $i DAY), '%Y-%m-%d')")->fetchAll()[0]['count']; echo $c . ","; endfor; ?>]
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: true
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : true,
          }
        }],
        yAxes: [{
          gridLines : {
            display : true,
          },
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }

    var lineChartCanvas = $('#visits-14-days').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, areaChartOptions)
    var lineChartData = $.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })
  })
</script>
<?php include BO_DIR . '/include/toast.inc.php'; ?>
</body>
</html>
