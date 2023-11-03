<?php
    require '../../../include/_settings.inc.php';
    CheckAuthBo();

    if (!isset($_GET['i']) || !is_numeric($_GET['i'])) {
        RedirectAndDie('gest/banner');
    }

    $idItinerary = $_GET['i'];

    $db->query('DELETE FROM banner WHERE id = ?', $idItinerary);

    $_SESSION['toast'] = 'Cidade apagada.';

    RedirectTo('gest/banner');
?>