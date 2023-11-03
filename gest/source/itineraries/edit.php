<?php 
    require '../../../include/_settings.inc.php';
    CheckAuthBo();

    $insert = $db->query("UPDATE itinerary SET title = ?, slug = ?, duration = ?, description = ?, contentHTML = ?, contentJSON = ?, wallpaperPath = ?, isPrivate = ?, status = ? WHERE id = ?", $_POST['title'], $_POST['slug'], $_POST['duration'], $_POST['description'], $_POST['html'], $_POST['json'], $_POST['wallpaper'], $_POST['visibility'], $_POST['status'], $_POST['id']);

    if ($insert->affectedRows() <= 0) {
        $_SESSION['toast'] = 'Erro ao processar o pedido. Verifique valores e tente novamente.';

        RedirectAndDie('gest/itineraries/edit?i=' . $_POST['id']);
    }

    $_SESSION['toast'] = 'Itinerário editado.';

    RedirectTo('gest/itineraries');
?>