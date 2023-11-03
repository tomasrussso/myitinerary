<?php
    require '../../../include/_settings.inc.php';
    CheckAuthBo();

    $db->query("DELETE FROM log WHERE DATE_FORMAT(createdAt, '%Y-%m-%d') = CURRENT_DATE()");

    $_SESSION['toast'] = 'Estatísticas apagadas.';

    RedirectTo('gest');
?>