<?php
    require '../../../include/_settings.inc.php';
    CheckAuthBo();

    if (!isset($_GET['i']) || !is_numeric($_GET['i'])) {
        RedirectAndDie('gest/cities');
    }

    $idItinerary = $_GET['i'];

    $db->query('DELETE FROM city WHERE id = ?', $idItinerary);

    $_SESSION['toast'] = 'Cidade apagada.';

    RedirectTo('gest/cities');
?>