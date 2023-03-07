<?php namespace App\Controllers;

class Site extends BaseController
{
    //parte publica do site

    public function index()
	{
		$data = [
			'titulo' => "CurtURL's - Pagina inicial",
			'logado' => $this->isLoggedIn()
		] ;

		return view('index.php', $data);
	}

	public function login()
	{
		$msgErro = $this->session->getFlashData('msgErro');
		

		$data = [
			'titulo' => "CurtURL's - Cadastro",
			'logado' => $this-> isLoggedIn(),
			'msgErro' => $msgErro
		] ;


		return view('login.php', $data);
    }
    
    public function cadastro()
	{

		$msgErro = $this->session->getFlashData('msgErro');
		$data = [
			'titulo' => "CurtURL's - Cadastro",
			'logado' => $this->isLoggedIn(),
			'msgErro' => $msgErro
		] ;

		return view('cadastro.php', $data);
	}

	//view senha
    public function senha(){
        $data ['titulo'] = "CurtURL's - Recuperar Senha";
        $data ['logado'] = $this->isLoggedIn();

		
		if($this->isLoggedIn()){

			$this->session->setFlashData ('msgErro', 'Página Inválida para seu User');

			return redirect()->to(base_url('user/index_login'));
        }

        return view('senha.php', $data);
        
	}
	
	//view para definir senha
	public function novasenha(){

        $data ['titulo'] = "CurtURL's - Definir nova senha";
        $data ['logado'] = $this->isLoggedIn();
		
	
        return view('novasenha', $data);
	}
	
	
}
