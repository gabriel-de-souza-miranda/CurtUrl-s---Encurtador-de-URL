<?php

namespace App\Controllers;

class Auth extends BaseController
{
    //parte de login e logout

    public function login()
    {

        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('senha');

        $pessoaModel = new \App\Models\pessoa_model();

        $query = $pessoaModel->get();
        foreach ($query->getResult() as $row) {
            if ($row->email == $email) {
                if (password_verify($senha, $row->senha)) {
                    $db = \Config\Database::connect();

                    $query   = $db->query("SELECT nome, email FROM usuarios WHERE email = '$email' LIMIT 1");
                    $row   = $query->getRowArray();



                    date_default_timezone_set('America/fortaleza');
                    $dados = [
                        'email_user' => $email,
                        'ip_user' => getHostByName(php_uname('n')),
                        'data_login' => date('Y/m/d'),
                        'horario_login' =>  date('H:i:s'),
                        'tipo_evento' => 'LOGIN'
                    ];
                    $update_usuarios = [
                        'ip' => getHostByName(php_uname('n')),
                        'data_login' => date('Y/m/d'),
                        'horario_login' =>  date('H:i:s')
                    ];

                    $usuarioModel = new \App\Models\eventos_login_model();
                    $usuarioModel->insert($dados);

                    $db      = \Config\Database::connect();
                    $update_usuarioModel = $db->table('usuarios');

                    $update_usuarioModel->where('email', $email);
                    $update_usuarioModel->update($update_usuarios);

                    $this->session->set('logado', 1);
                    //$this->session->set('id', $row['id']);
                    $this->session->set('email', $row['email']);
                    $this->session->set('nome', $row['nome']);
                    return redirect()->to(base_url('user/index_login'));
                }
            }
        }


        $this->session->setFlashData('msgErro', 'Email ou Senha invalidos.');
        return redirect()->to(base_url('site/login'));
    }

    public function logout()
    {
        $this->session->destroy();

        return redirect()->to(base_url('site/login'));
    }

    public function defsenha()
    {

        $data['titulo'] = "CurtURL's - Definir nova senha";
        $data['logado'] = $this->isLoggedIn();

        $hash = $this->request->getPost('cod');
        $senha = $this->request->getPost('senha');

        if ($hash == '' || $senha == '') {
            $data['msgErro'] = 'Preencha todos os campos';

            return view('novasenha', $data);
        }

        $db = \Config\Database::connect();
        //$userModel = new \App\Models\user_model(); 

        $query = $db->query("SELECT nome, email, senha, hash_rec_senha FROM usuarios WHERE hash_rec_senha = '$hash'");
        $user = $query->getRow();

        if($user == NULL){
            $data['msgErro'] = 'Codigo validação inválido, digite novamente ';

            return view('novasenha', $data);
        }

       $dados = [
            'senha' => password_hash($senha, PASSWORD_DEFAULT),
            'hash_rec_senha' => NULL
        ];

        $userModel = new \App\Models\user_model();

        $userModel->update($user->email, $dados);

        //$userModel->update($user->email, $dados);

        $data['msgErro'] = 'Senha alterada com sucesso';

        return view('login', $data);

        //d($user->email);
    }
}
