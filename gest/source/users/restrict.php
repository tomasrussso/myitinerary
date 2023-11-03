<?php
    require '../../../include/_settings.inc.php';
    CheckAuthBo();

    if (!isset($_GET['i']) || !is_numeric($_GET['i'])) {
        RedirectAndDie('gest/users');
    }

    if ($db->query("SELECT status FROM user WHERE id = ?", $_GET['i'])->fetchArray()['status'] == -1) {
        $db->query("UPDATE user SET status = 1 WHERE id = ?", $_GET['i']);
    } else {
        $db->query("UPDATE user SET status = -1 WHERE id = ?", $_GET['i']);
    }

    if ($db->query("SELECT status FROM user WHERE id = ?", $_GET['i'])->fetchArray()['status'] == -1) {
        $_SESSION['toast'] = 'Restrição aplicada.';
    } else {
        $_SESSION['toast'] = 'Restrição retirada.';
    }

    RedirectTo('gest/users');
?>