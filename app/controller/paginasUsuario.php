<?php

    // classe que vai lidar ao entregar as páginas para os usuarios
    class paginasUsuario
    {
        // metodo que exibi os dados da home
        public function home()
        {
            echo "ola mundo usuario";
        }

        /* os metodos abaixao seguem o mesma dinamica, cada
        sendo que o nome de cada metodo exibi uma página especifica do site
        */

        public function erroPedido()
        {
            echo "ola mundo erro";
        }

        public function cadastroUsuario()
        {
            echo file_get_contents('app/view/cadastrarUsuario.html');
        }
    }

?>