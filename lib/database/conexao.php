<?php

    // class que permite a conexao
    abstract class conexao
    {
        private static $con;

        // metodo que vai entregar a conexao ao banco de dados, fazendo o pedido via objeto PDO
        public static function pegandoConexao()
        {
            if(self::$con == null){
                self::$con new PDO('mysql: host=localhost; dbname=marktplace_db','root','');
            }

            return self::$con;
        }
    }

?>