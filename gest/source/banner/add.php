<?php 
    require '../../../include/_settings.inc.php';
    CheckAuthBo();

    if (empty($_POST['button'])) {
        $insert = $db->query("INSERT INTO banner (cityName, cityDescription, imagePath, credits, status) VALUES (?, ?, ?, ?, ?)", $_POST['name'], $_POST['description'], $_POST['image'], $_POST['credits'], $_POST['status']);
    } else {
        $insert = $db->query("INSERT INTO banner (cityName, cityDescription, buttonCityName, imagePath, credits, status) VALUES (?, ?, ?, ?, ?, ?)", $_POST['name'], $_POST['description'], $_POST['button'], $_POST['image'], $_POST['credits'], $_POST['status']);
    }
    

    if ($insert->affectedRows() <= 0) {
        $_SESSION['toast'] = 'Erro ao processar o pedido. Verifique valores e tente novamente.';

        RedirectAndDie('gest/banner/add');
    }

    $_SESSION['toast'] = 'Cidade adicionada.';

    RedirectTo('gest/banner');
?>