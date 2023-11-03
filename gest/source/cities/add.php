<?php 
    require '../../../include/_settings.inc.php';
    CheckAuthBo();

    $insert = $db->query("INSERT INTO city (name, district) VALUES (?, ?)", $_POST['name'], $_POST['district']);

    if ($insert->affectedRows() <= 0) {
        $_SESSION['toast'] = 'Erro ao processar o pedido. Verifique valores e tente novamente.';

        RedirectAndDie('gest/cities/add');
    }

    $_SESSION['toast'] = 'Cidade adicionada.';

    RedirectTo('gest/cities');
?>