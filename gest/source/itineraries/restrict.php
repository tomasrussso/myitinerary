<?php
    require '../../../include/_settings.inc.php';
    CheckAuthBo();

    if (!isset($_GET['i']) || !is_numeric($_GET['i'])) {
        RedirectAndDie('gest/itineraries');
    }

    if ($db->query("SELECT status FROM itinerary WHERE id = ?", $_GET['i'])->fetchArray()['status'] == 0) {
        $db->query("UPDATE itinerary SET status = 1 WHERE id = ?", $_GET['i']);
    } else {
        $db->query("UPDATE itinerary SET status = 0 WHERE id = ?", $_GET['i']);
    }

    if ($db->query("SELECT status FROM itinerary WHERE id = ?", $_GET['i'])->fetchArray()['status'] == 0) {
        $_SESSION['toast'] = 'Restrição aplicada.';
    } else {
        $_SESSION['toast'] = 'Restrição retirada.';
    }

    RedirectTo('gest/itineraries');
?>