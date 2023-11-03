<?php 
    require '../../../include/_settings.inc.php';
    CheckAuthBo();

    $insert = $db->query("UPDATE city SET name = ?, district = ? WHERE id = ?", $_POST['name'], $_POST['district'], $_POST['id']);

    if ($insert->affectedRows() <= 0) {
        $_SESSION['toast'] = 'Erro ao processar o pedido. Verifique valores e tente novamente.';

        RedirectAndDie('gest/cities/edit?i=' . $_POST['id']);
    }

    $_SESSION['toast'] = 'Cidade editada.';

    RedirectTo('gest/cities');
?>