<?php

    // implementação do core

    require_once "app/core/core.php";

    // implementação dos controllers

    require_once "app/controller/paginasUsuario.php";
    require_once "app/controller/paginasAdm.php";

    // trabalhando na entrega da página ao usuario

    ob_start();

        $core = new core();
        $core->start($_GET);
        $template = $core->estruturaPeidida('usuario');

        $saida = ob_get_contents();

    ob_end_clean();

    // exibindo a view da página ao usuario

    $templatePronto = str_replace('{{area_dinamica}}', $saida, $template);

    echo $templatePronto;

?>