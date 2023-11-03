<?php 
    require '../../../include/_settings.inc.php';
    CheckAuthBo();

    if (empty($_POST['button'])) {
        $insert = $db->query("UPDATE banner SET cityName = ?, cityDescription = ?, imagePath = ?, credits = ?, status = ? WHERE id = ?", $_POST['name'], $_POST['description'], $_POST['image'], $_POST['credits'], $_POST['status'], $_POST['id']);
    } else {
        $insert = $db->query("UPDATE banner SET cityName = ?, cityDescription = ?, buttonCityName = ?, imagePath = ?, credits = ?, status = ? WHERE id = ?", $_POST['name'], $_POST['description'], $_POST['button'], $_POST['image'], $_POST['credits'], $_POST['status'], $_POST['id']);
    }

    if ($insert->affectedRows() <= 0) {
        $_SESSION['toast'] = 'Erro ao processar o pedido. Verifique valores e tente novamente.';

        RedirectAndDie('gest/banner/edit?i=' . $_POST['id']);
    }

    $_SESSION['toast'] = 'Cidade editada.';

    RedirectTo('gest/banner');
?>