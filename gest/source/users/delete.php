<?php
    require '../../../include/_settings.inc.php';
    CheckAuthBo();

    if (!isset($_GET['i']) || !is_numeric($_GET['i'])) {
        RedirectAndDie('gest/users');
    }

    $id = $_GET['i'];

    $db->query('DELETE FROM itinerary_city WHERE idItinerary IN (SELECT id FROM itinerary WHERE idUser = ?)', $id);
    $db->query('DELETE FROM itinerary_like WHERE idItinerary IN (SELECT id FROM itinerary WHERE idUser = ?)', $id);
    $db->query('DELETE FROM itinerary_like WHERE idUser = ?', $id);
    $db->query('DELETE FROM itinerary WHERE idUser = ?', $id);
    $db->query('DELETE FROM user WHERE id = ?', $id);

    $_SESSION['toast'] = 'Utilizador apagado.';

    RedirectTo('gest/users');
?>