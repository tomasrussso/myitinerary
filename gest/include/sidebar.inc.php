<!-- Brand Logo -->
<a href="<?= BO_URL ?>" class="brand-link">
    <img src="<?= SITE_URL ?>/images/profile-m.png" alt="M" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text">MyItinerary Gest</span>
</a>

<!-- Sidebar -->
<div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li class="nav-item">
        <a href="<?= BO_URL ?>/users" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
            Gerir Utilizadores
            <span class="badge badge-light right"><?= $db->query("SELECT COUNT(id) AS count FROM user")->fetchArray()['count'] ?></span>
            </p>
        </a>
        </li>
        <li class="nav-item">
        <a href="<?= BO_URL ?>/itineraries" class="nav-link">
            <i class="nav-icon fas fa-map"></i>
            <p>
            Gerir Itinerários
            <span class="badge badge-light right"><?= $db->query("SELECT COUNT(id) AS count FROM itinerary")->fetchArray()['count'] ?></span>
            </p>
        </a>
        </li>
        <li class="nav-header"></li>
        <li class="nav-item">
        <a href="<?= BO_URL ?>/cities" class="nav-link">
            <i class="nav-icon fas fa-map-marker-alt"></i>
            <p>
            Editar Cidades
            </p>
        </a>
        </li>
        <li class="nav-item">
        <a href="<?= BO_URL ?>/banner" class="nav-link">
            <i class="nav-icon fas fa-images"></i>
            <p>
            Editar Banner
            </p>
        </a>
        </li>
        <li class="nav-header"></li>
        <li class="nav-item">
        <a href="<?= BO_URL ?>/logs" class="nav-link">
            <i class="nav-icon fas fa-clipboard-list"></i>
            <p>
            Ver Logs
            </p>
        </a>
        </li>
    </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->