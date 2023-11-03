<?php
    require '../../../include/_settings.inc.php';
    CheckAuthBo();

    if (!isset($_GET['i']) || !is_numeric($_GET['i'])) {
        RedirectAndDie('gest/users');
    }

    if ($db->query("SELECT isVerified FROM user WHERE id = ?", $_GET['i'])->fetchArray()['isVerified'] == 0) {
        $db->query("UPDATE user SET isVerified = 1 WHERE id = ?", $_GET['i']);
    } else {
        $db->query("UPDATE user SET isVerified = 0 WHERE id = ?", $_GET['i']);
    }

    if ($db->query("SELECT isVerified FROM user WHERE id = ?", $_GET['i'])->fetchArray()['isVerified'] == 0) {
        $_SESSION['toast'] = 'Verificação retirada.';
    } else {
        $_SESSION['toast'] = 'Verificação aplicada.';
    }

    RedirectTo('gest/users');
?>