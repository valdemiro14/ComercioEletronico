<?php

    // classe que vai lidar com todos os processo relacionados com inserção e alteração no banco de dados
    class crudSistema
    {
        // metodo que vai tratar em enviar os dados do formulário de cadastro de usuarios
        public function cadastrarUsuario(){
            try{
                if(isset($_POST) || $_POST != null)
                {
                    
                }
            }catch(PDOException $e)
            {
                echo "Erro ao cadastrar o usuario". $e->getMessage();
            }
        }
    }

?>