<?php

    // classe que vai lidar ao entregar as páginas para os usuarios
    class paginasUsuario
    {
        // metodo que exibi os dados da home
        public function home()
        {
            // preparando a página para o twig
            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('home.html');

            // insercao de dados para a view
            $parametros = array();

            if (sessaoUsuario::sessao() == true) 
            {
                $parametros['sessaoOn'] = 1;
            }

            // renderixando a página
            $conteudo = $template->render($parametros);

            // exibindo a página
            echo $conteudo;
        }

        /* os metodos abaixao seguem o mesma dinamica, cada
        sendo que o nome de cada metodo exibi uma página especifica do site
        */

        public function erroPedido()
        {
            echo "Erro 404, a página sugerida não existe";
        }

        public function cadastroUsuario()
        {
            //echo file_get_contents('app/view/cadastrarUsuario.html');

            // verificação se o usuario esta logado
            if (sessaoUsuario::sessao() == true) 
            {
                header('Location: ?pagina=home');
                exit();
            }

            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('cadastrarUsuario.html');

            $parametros = array();

            $conteudo = $template->render($parametros);

            echo $conteudo;
        }

        public function logarConta()
        {
            
            // verificação se o usuario esta logado
            if (sessaoUsuario::sessao() == true) 
            {
                header('Location: ?pagina=home');
                exit();
            }

            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('logarContaUsuario.html');

            $parametros = array();

            $conteudo = $template->render($parametros);

            echo $conteudo;
        }

        public function requisicaoLoja()
        {
            if (sessaoUsuario::sessao() != true) 
            {
                header('Location: ?pagina=home');
                exit();
            }


            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('requisicaoLoja.html');

            $parametros = array();

            $conteudo = $template->render($parametros);

            echo $conteudo;
        }
    }

?>