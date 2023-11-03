<?php 
    require '../../../include/_settings.inc.php';
    CheckAuthBo();

    if (empty($_POST['password'])) {
        $insert = $db->query("UPDATE user SET name = ?, username = ?, email = ?, profilePicturePath = ?, wallpaperPath = ?, lastUpdateAt = CURRENT_TIMESTAMP(), status = ? WHERE id = ?", $_POST['name'], $_POST['username'], $_POST['email'], $_POST['profile'], $_POST['wallpaper'], $_POST['status'], $_POST['id']);
    } else {
        $insert = $db->query("UPDATE user SET name = ?, username = ?, email = ?, password = ?, profilePicturePath = ?, wallpaperPath = ?, lastUpdateAt = CURRENT_TIMESTAMP(), status = ? WHERE id = ?", $_POST['name'], $_POST['username'], $_POST['email'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['profile'], $_POST['wallpaper'], $_POST['status'], $_POST['id']);
    }

    if ($insert->affectedRows() <= 0) {
        $_SESSION['toast'] = 'Erro ao processar o pedido. Verifique valores e tente novamente.';

        RedirectAndDie('gest/users/edit?i=' . $_POST['id']);
    }

    $_SESSION['toast'] = 'Utilizador editado.';

    RedirectTo('gest/users');
?>