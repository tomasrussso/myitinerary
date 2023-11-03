<?php
    require '../../../include/_settings.inc.php';
    CheckAuthBo();

    $db->query("DELETE * FROM log");

    $_SESSION['toast'] = 'Estatísticas apagadas.';

    RedirectTo('gest/logs');
?>