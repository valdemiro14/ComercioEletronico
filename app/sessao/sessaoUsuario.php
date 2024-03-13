<?php

	abstract class sessaoUsuario{
		private static function insertSessaoDatabase($idConta,$con)
		{
			$sql = $con->prepare("INSERT INTO sessao_usuarios (usuario, dia, hora) VALUES (:usuario, :dia, :hora)");
			
			$dia = date('Y-m-d');
			$hora = date('H:i');

			$sql->bindValue(':usuario',$idConta);
			$sql->bindValue(':dia',$dia);
			$sql->bindValue(':hora',$hora);
			$sql->execute();
		}

		public static function sessao($conta = null,$senha = null,$terminar = null)
		{
			if ($terminar != null) 
			{
				unset($_SESSION['sessaoUsuario']);

				header('Location: ?pagina=home');
				exit();
			}elseif ($conta == null || $senha == null) 
			{
				if (isset($_SESSION['sessaoUsuario'])) {
					return true;
				}else
				{
					return false;
				}
			}elseif ($conta != null && $senha != null && $terminar == null) 
			{
				if (isset($_SESSION['sessaoUsuario'])) {
					return 'já existe uma sessao aberta';
				}else
				{
					$conexao = conexao::pegandoConexao();

					if (!empty($_POST['conta']) || !empty($_POST['senha'])) 
					{
						$sql = $conexao->prepare("SELECT * FROM usuarios WHERE contacto = '$conta' OR email = '$conta' AND senha = '$senha'");
						$sql->execute();

						if ($sql->rowCount() == 1) 
						{
							while ($tb=$sql->fetchObject()) 
							{
								self::insertSessaoDatabase($tb->id,$conexao);
							}

							$_SESSION['sessaoUsuario'] = true;

							return 'sessão aberta com sucesso';
						}else
						{
							return 'a conta ou senha devem estar errada';
						}	
					}else
					{
						return "Os campos não devem estar vazias";
					}
				}
			}
		}
	}

?>