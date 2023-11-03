<?php
    require '../../../include/_settings.inc.php';
    CheckAuthBo();

    if (!isset($_GET['i']) || !is_numeric($_GET['i'])) {
        RedirectAndDie('gest/itineraries');
    }

    $idItinerary = $_GET['i'];

    $db->query('DELETE FROM itinerary WHERE id = ?', $idItinerary);
    $db->query('DELETE FROM itinerary_city WHERE idItinerary = ?', $idItinerary);
    $db->query('DELETE FROM itinerary_like WHERE idItinerary = ?', $idItinerary);

    $_SESSION['toast'] = 'Itinerário apagado.';

    RedirectTo('gest/itineraries');
?>