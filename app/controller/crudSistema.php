<?php

    // classe que vai lidar com todos os processo relacionados com inserção e alteração no banco de dados
    class crudSistema
    {
        // metodo que vai tratar em enviar os dados do formulário de cadastro de usuarios
        public function cadastrarUsuario()
        {
            try
            {
                if(isset($_POST) || $_POST != null)
                {
                    insercaoDadosDatabase::cadastrarUsuario($_POST);
                }
            }catch(PDOException $e)
            {
                echo "Erro ao cadastrar o usuario". $e->getMessage();
            }
        }

        // metodo que vai logar a conta do usuario
        public function logarContaDatabase(){
            try
            {
                if (isset($_POST) || $_POST != null) 
                {
                    if(empty($_POST['conta']) || empty($_POST['senha']))
                    {
                        echo 'Os campos não devem estar vazios';
                    }else
                    {
                        echo sessaoUsuario::sessao($_POST['conta'],$_POST['senha']);
                    } 
                }
            }catch(PDOException $e)
            {
                echo "Erro ao tentar logar a sua conta". $e->getMessage();
            }
        }

        public function terminaSessao(){
            sessaoUsuario::sessao(null,null,true);
        }
    }

?>