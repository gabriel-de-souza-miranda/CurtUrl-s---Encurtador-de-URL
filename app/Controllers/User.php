<?php namespace App\Controllers;

class User extends BaseController
{
	//parte que so pode ser acessada se estiver logado
	
	public function index_login()
	{

		if(! $this->isLoggedIn()){

			$this->session->setFlashData ('msgErro', 'Faça o login primeiro.');

			return redirect()->to(base_url('site/login'));
		}
		
		$session = session();
        //$log = $session->get('logado');
        //$nome = $session->get('nome');
        $id = $session->get('id');

        $data['titulo'] = "CurtURL's - Página Inicial";
        $data['logado'] = $this->isLoggedIn();

        $db = \Config\Database::connect();

        $query = $db->query("SELECT url_short, url_long, quant_acessos FROM url_on WHERE id = '$id'");
		$row = $query->getRowArray();

		$query = $db->query("SELECT COUNT(id) as rep FROM url_on WHERE id = '$id'");
		$result   = $query->getRow();

		$quant = $result->rep;
		
		if($quant > 0){

			$data['url_long'] = $row['url_long'];
			$data['url_short'] = $row['url_short'];
			$data['quant_acessos'] = $row['quant_acessos'];
			$data['quant'] = $quant;
			//$data['rep'] = $row;					

			return view('index_login', $data);s

		}else{

			$data['titulo'] = "CurtURL's - Página Inicial";
			$data['logado'] = $this->isLoggedIn();
			//$data['historico'] = "";
			$data['erro'] = 'Nenhuma Url encontrada em seu histórico';

			return view('index_login', $data);

		}
	}

	//cadastrar os novos usuarios
	public function inseriruser()
	{
		$data['msg'] = "";
		$data['erro_email'] = "";
		$data['erro_nome_senha'] = "";


		$nome = $this->request->getPost('nome');
		$email = $this->request->getPost('email');
		$senha = $this->request->getPost('senha');
		$senhacon = $this->request->getPost('senhacon');



		$pessoaModel = new \App\Models\pessoa_model(); 
			

		$valida_dados = [
			'nome' => $nome,
			'email' => $email,
			'Senha' => $senha,
			'senhacon' => $senhacon
		];


		$validation =  \Config\Services::validation();
		$validation->setRuleGroup('usuarios');

		if ( ! $validation->run( $valida_dados ) ){

			$validationErrors = $validation->getErrors();
			$data = $validation->listErrors();
			
			$this->session->setFlashData ('msgErro',$data);
			
			return redirect()->to(base_url('site/cadastro'));

		}
		
		
		date_default_timezone_set('America/fortaleza');
		$dados = [
			'nome' => $nome,
			'email' => $email,
			'senha' => password_hash($senha, PASSWORD_DEFAULT),
			'ip'=> getHostByName(php_uname('n') ),
			'data_login' => date('Y/m/d')  ,
			'horario_login' =>  date('H:i:s')
			
		];
		

		

		
		$usuarioModel = new \App\Models\user_model(); 
		$usuarioModel->insert($dados);
		$this->session->set('logado', 1);

		$this->session->set('nome', $nome);
		$this->session->set('email', $email);
		


		
		return redirect()->to(base_url('user/index_login'));		
		
	

	}
	
	public function new_senha(){
		$msgErro = $this->session->getFlashData('msgErro');
		$data = [
			'titulo' => "CurtURL's - Nova Senha",
			'logado' => $this->isLoggedIn(),
			'msgErro' => $msgErro
		] ;

		return view('new_senha.php',$data);
	}

	public function alteraSenha(){
		
	
		$email = $_SESSION['email'];
		

		$senhaAtual = $this->request->getPost('senhaAtual');
		$novaSenha = $this->request->getPost('novaSenha');
		$senhaConf = $this->request->getPost('senhaConf');
		
		
		$db = \Config\Database::connect();
       

        $query = $db->query("SELECT senha FROM usuarios WHERE email = '$email' ");
		$senhaAtual_bd = $query->getRow('senha');
			

		if(password_verify($senhaAtual, $senhaAtual_bd)){
			//password_hash($senha, PASSWORD_DEFAULT)
			if($novaSenha == $senhaConf){
				$usuarioModel = new \App\Models\pessoa_model();
                   
				$update_usuarios = [
					'senha' =>password_hash($novaSenha, PASSWORD_DEFAULT)
				];

				$db2      = \Config\Database::connect();
				$update_usuarioModel = $db2->table('usuarios');

				$update_usuarioModel->where('email', $email);
				$update_usuarioModel->update($update_usuarios);
				return redirect()->to(base_url('user/index_login'));
				}
			else{
				$this->session->setFlashData('msgErro', 'A nova senha e a de confirmacao devem ser iguais ! ');
				return redirect()->to(base_url('user/new_senha'));
			}

			
		}

		else{
			$this->session->setFlashData('msgErro', 'Senha Invalida');
			
			return redirect()->to(base_url('user/new_senha'));
		}
		
		


		
	}


	/*
	public function inserir()
	{
		

		$data['msg'] = "";
		$data['erro_email'] = "";
		$data['erro_nome_senha'] = "";


		$nome = $this->request->getPost('nome');
		$email = $this->request->getPost('email');
		$senha = $this->request->getPost('senha');

		if (filter_var($email, FILTER_VALIDATE_EMAIL) == FALSE) {
			$data['titulo'] = "CurtURL's - Página Inicial";
			$data['logado'] = 0;
			$data['erro_email'] = 'Email inválido.';

			//return redirect()->to(base_url('index.php'));
			return view('cadastro.php', $data);
			
		}
		
		if($nome == '' || $senha == ''){
			$data['titulo'] = "CurtURL's - Página Inicial";
			$data['logado'] = 0;
			$data['erro_nome_senha'] = 'Prencha todos os compos por favor!';
		
			return view('cadastro.php', $data);
		}
		else{

			$pessoaModel = new \App\Models\pessoa_model(); 

			$query = $pessoaModel->get();
			foreach ($query->getResult() as $row){
				if($row->email == $email){
					//$this->session->set('logado', 1);
					$this->session->setFlashData ('msgErro', 'Email existente, faça o login!');
					return redirect()->to(base_url('site/login'));
				}            
			}

			
				
			$usuarioModel = new \App\Models\user_model(); 

			$dados = [
				'nome' => $nome,
				'email' => $email,
				'senha' => password_hash($senha, PASSWORD_DEFAULT)
			];

				$usuarioModel->insert($dados);
				$this->session->set('logado', 1);

				$this->session->set('nome', $nome);
				$this->session->set('email', $email);
				
				return redirect()->to(base_url('user/index_login'));		
		}	
		

	}

	public function Historico()
    {
		
		$session = session();
        //$log = $session->get('logado');
        //$nome = $session->get('nome');
        $id = $session->get('id');

        $data['titulo'] = "CurtURL's - Página Inicial";
        $data['logado'] = $this->isLoggedIn();
        $data['historico'] = "";
        $data['erro'] = 'Nenhuma Url encontrada em seu histórico';


        $db = \Config\Database::connect();

        $query = $db->query("SELECT url_short, url_long, quant_acessos FROM url_on WHERE id = '$id'");
        $row = $query->getRowArray();

        $data = [
            //'id' => $row['id'],
            'url_long' => $row['url_long'],
            'url_short' => ['url_short'],
            'quant_acessos' => ['quant_acessos']
        ];

		return view('index_login', $data);
	}*/

	//----------------------------------------------------
}
