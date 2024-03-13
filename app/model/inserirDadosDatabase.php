<?php

    // essa classe permiti que os certos dados sejam trados antes da inserçãp
    abstract class tratarDados
    {

    }

    // essa classe vai a inserção dos dados no banco de dados
    class insercaoDadosDatabase
    {
        public static function cadastrarUsuario($infoUsuarios)
        {
            // pegando a conexao ao banco de dados
            $conexao = conexao::pegandoConexao();

            //var_dump($conexao);
            if (!empty($infoUsuarios['nome']) && !empty($infoUsuarios['sobrenome']) && !empty($infoUsuarios['niver']) && !empty($infoUsuarios['numero']) && !empty($infoUsuarios['senha']) && $infoUsuarios['senha'] == $infoUsuarios['confirmaSenha']) {
                // codido sql para fazer o cadastro no banco de dados
                $sql = $conexao->prepare('INSERT INTO usuarios (nome, sobrenome, aniversario, contacto, email, senha, estado) VALUES (:nome, :sobrenome, :aniversario, :contacto, :mail, :senha, :estado)');

                // preprarando os dados para o envio
                $senhaCriptografada = sha1($infoUsuarios['senha']);
                $sql->bindValue(':nome',$infoUsuarios['nome']);
                $sql->bindValue(':sobrenome',$infoUsuarios['sobrenome']);
                $sql->bindValue(':aniversario',$infoUsuarios['niver']);
                $sql->bindValue(':contacto',$infoUsuarios['numero']);
                $sql->bindValue(':mail',$infoUsuarios['mail']);
                $sql->bindValue(':senha',$senhaCriptografada);
                $sql->bindValue(':estado',1);

                // executando o tudo
                $sql->execute();

                echo "Cadastro de usuario feito com sucesso";
            }
            else
            {
                echo "Deve preencher bem os campos do formulário e não deixalos vazios.";
            }
        }

        // os metodos abaixo seguem o mesmo modelo de baixo
    }

?>