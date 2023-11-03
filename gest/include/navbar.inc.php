<!-- Left navbar links -->
<ul class="navbar-nav">
    <li class="nav-item">
    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
    <a href="<?= BO_URL ?>" class="nav-link">Home</a>
    </li>
</ul>

<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
    <li class="nav-item">
    <a href="<?= SITE_URL ?>" class="nav-link">Ir para MyItinerary</a>
    </li>
    <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <span class="d-none d-md-inline"><strong><?= htmlspecialchars($_SESSION['auth-bo']['user']['name']) ?></strong></span>
          <span class="ml-2"><i class="fas fa-user"></i></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary" style="height: 70px">
            <p>
                Olá, <?= htmlspecialchars($_SESSION['auth-bo']['user']['name']) ?>
            </p>
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
          <form action="<?= SITE_URL ?>/source/auth/logout.php" method="post">
            <?php csrf('logout'); ?>
            <button type="submit" class="btn btn-default btn-flat">Terminar sessão</a>
            </form>
          </li>
        </ul>
      </li>
    <li class="nav-item">
    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
    </a>
    </li>
</ul>