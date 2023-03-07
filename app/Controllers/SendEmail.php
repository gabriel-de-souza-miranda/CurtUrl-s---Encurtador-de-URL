<?php

namespace App\Controllers;

class SendEmail extends BaseController
{
    //enviar email para usuario
    public function email()
    {
        $email = $this->request->getPost('email');
        $emailuser = $this->request->getPost('email');

        $url = 'http://localhost/curt-urls/public/site/novasenha';
        $hash = rand(1, 1000000);


        $data['titulo'] = "CurtURL's - Recuperar Senha";
        $data['logado'] = $this->isLoggedIn();

        $pessoaModel = new \App\Models\pessoa_model();

        //nome do usuario relacionado ao email
        $name = $pessoaModel->find($email);
        
        //d($name->nome);

        $query = $pessoaModel->get();
        foreach ($query->getResult() as $row) {
            if ($row->email == $email) {
                
                $dados = [
                    'hash_rec_senha' => $hash
                ];
                
                $pessoaModel->update($name->email, $dados);

                $email = \Config\Services::email();
                $email->setFrom('apptestingmcs07@gmail.com', 'CurtUrl´s');
                $email->setTo($emailuser);
                $email->setSubject('Recuperação de senha');
                $email->setMessage('Olá, ' . $name->nome . ', para definir uma nova senha de acesso ao Curt´s URL´s, entre no link abaixo e digite este código: '.$hash.' <br><br><a href="'.$url.'"> ' .$url.' </a>'); //Aqui vc pode inserir conteúdo em HTML também
                $email->send();
                //echo $email->printDebugger(); //Isto mostra alguma informação de erro se tiver, mas o ideal é fazer um redirecionamento ou carregar alguma 

                $data['msgErro'] = "Mensagem enviada para seu email, verifique sua caixa de entrada";
                //return redirect()->to(base_url('site/senha'));
                return view('senha.php', $data);
            }
        }

        $data['msgErro'] = "Email inválido";

        return view('senha.php', $data);

    }
}
