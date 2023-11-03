<?php 
    require '../../../include/_settings.inc.php';
    CheckAuthBo();

    $insert = $db->query("INSERT INTO user (name, email, username, verifyToken, password, status) VALUES (?, ?, ?, '', ?, ?)", $_POST['name'], $_POST['email'], $_POST['username'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['status']);

    if ($insert->affectedRows() <= 0) {
        $_SESSION['toast'] = 'Erro ao processar o pedido. Verifique valores e tente novamente.';

        RedirectAndDie('gest/users/add');
    }

    $_SESSION['toast'] = 'Utilizador adicionado.';

    RedirectTo('gest/users');
?>