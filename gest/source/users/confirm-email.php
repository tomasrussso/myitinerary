<?php
    require '../../../include/_settings.inc.php';
    CheckAuthBo();

    if (!isset($_GET['i']) || !is_numeric($_GET['i'])) {
        RedirectAndDie('gest/users');
    }

    if ($db->query("SELECT status FROM user WHERE id = ?", $_GET['i'])->fetchArray()['status'] == 0) {
        $db->query("UPDATE user SET verifiedAt = CURRENT_TIMESTAMP(), status = 1 WHERE id = ?", $_GET['i']);
    } else {
        $db->query("UPDATE user SET verifiedAt = CURRENT_TIMESTAMP() WHERE id = ?", $_GET['i']);
    }

    $_SESSION['toast'] = 'Email confirmado.';

    RedirectTo('gest/users');
?>