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

    $result = $db->query("UPDATE setting SET value = $value WHERE name = 'REGISTER_LOGS'");

    if ($result->affectedRows() > 0) {
        if ($value == 1) {
            echo "<span class=\"text-success\">O registo de estatísticas está ligado.</span> <a href=\"javascript:void(0)\" onclick=\"ChangeRegisterLogs('off')\">Desligar registo de estatísticas</a>";
        } else {
            echo "<span class=\"text-danger\">O registo de estatísticas está desligado.</span> <a href=\"javascript:void(0)\" onclick=\"ChangeRegisterLogs('on')\">Ligar registo de estatísticas</a>";
        }
    }
?>