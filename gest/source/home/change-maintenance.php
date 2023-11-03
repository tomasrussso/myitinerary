<?php
    require '../../../include/_settings.inc.php';
    CheckAuthBo();

    if ($_GET['a'] == 'off') {
        $value = '0';
    } else if ($_GET['a'] == 'on'){
        $value = '1';
    } else {
        return;
    }

    $result = $db->query("UPDATE setting SET value = $value WHERE name = 'MAINTENANCE'");

    if ($result->affectedRows() > 0) {
        if ($value == 1) {
            echo "<span class=\"text-danger\">O site está em modo de manutenção.</span> <a href=\"avascript:void(0)\" onclick=\"ChangeMaintenance('off')\">Desativar modo de manutenção</a>";
        } else {
            echo "<span class=\"text-success\">O site está ativo.</span> <a href=\"javascript:void(0)\" onclick=\"ChangeMaintenance('on')\">Ativar modo de manutenção</a>";
        }
    }
?>