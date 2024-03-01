<?php

    // classes definirem que página sera exibida para o usuario apartir do seu controller
    class core{

        // 
        private $controller;
        private $acao;

        // metodo que define o controller a ser trabalhado

        public function pedindoController($pagina)
        {
            if (method_exists('paginasUsuario',$pagina))
            {
                return "paginasUsuario";
            }elseif(method_exists('paginasAdm',$pagina))
            {
                return "paginasAdm";
            }else
            {
                $this->acao = "erroPedido";
                return 'paginasUsuario';
            }
        }

        // metodo de exibição dos dados da página pedida
        public function start($urlGet){

            if ($urlGet == null) 
            {
                $this->acao = 'home';
                $this->controller = $this->pedindoController('home');
            }else
            {
                $this->acao = $urlGet['pagina'];
                $this->controller = $this->pedindoController($urlGet['pagina']);
            }

            if (isset($urlGet['id']) && $urlGet['id'] != null) 
            {
                $id = $urlGet['id'];
            }else
            {
                $id = null;
            }

            call_user_func(array(new $this->controller,$this->acao), array($id));
        }

        // metodo que define que página sera exibida ao usuario
        public function estruturaPeidida($estrutura)
        {
            // o recebendo o valor da estrutura da plataforma requerida e entregando ela
            switch ($estrutura) 
            {
                case 'usuario':
                    return file_get_contents('template/estrutura.html');
                    break;
                
                case 'administrador':
                    return file_get_contents('template/estruturaAdm.html');
                    break;
            }
        }
    }

?>