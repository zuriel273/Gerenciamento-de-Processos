<?php
class LoginController extends ActionController{
	private static $dao;
	
	public function indexAction(){
		Base::$page_title = "Login";
		parent::render("index");
	}

	public function loginAuthAction(){

		if(!isSet($_POST) || empty($_POST))
			Base::redireciona("login/index");

		$login = $_POST["Login"];
		$cpf = $login['cpf'];
		$senha = $login['senha'];

		//var_dump($login);
		if((!$cpf) || (!$senha)){
			$_SESSION["msg"] = "Por favor, todos campos devem ser preenchidos! <br /><br />";
		}else{
			$pessoa = new Pessoa();
			$pessoa->setCpf($cpf);
			$pessoa->setSenha($senha);

			$pDAO = new PessoaDAO();
			$pessoa = $pDAO->logado($pessoa);
			
			if($pessoa != NULL){
				session_start(session_id());
				$_SESSION['logado'] = $pessoa;
				Base::redireciona("index.php");
			}else{
				$_SESSION["msg"] = "Usuario não cadastrado! <br /><br />";	
			}
			
		}

	}

	public function desAuthAction(){
		Base::logout();
	}

}
?>