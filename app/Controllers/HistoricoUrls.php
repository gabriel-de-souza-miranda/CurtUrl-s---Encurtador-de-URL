<?php

namespace App\Controllers;

use CodeIgniter\CLI\CLI;

class HistoricoUrls extends BaseController
{

    public function Hist()
    {
        $raizSistema = "http://localhost/curt-urls/public/"; 

        if (!$this->isLoggedIn()) {

            $this->session->setFlashData('msgErro', 'Faça o login primeiro.');

            return redirect()->to(base_url('site/login'));
        } else {

            $session = session();
            $log = $session->get('email');

            $data['titulo'] = "CurtURL's - Histórico de URL's";
            $data['logado'] = $this->isLoggedIn();

            $usuarioModel = new \App\Models\urlOn_Model(); 

            $urlUser = $usuarioModel->where('email_user', $log)->findAll();
            //d($urlUser);

            if (count($urlUser) == 0) {
                $data['titulo'] = "CurtURL's - Histórico de URL's";
                $data['erro'] = "Nenhuma Url encontrada em seu histórico";

                return view('historico.php', $data);
            }else{

                $data['urli'] = $raizSistema;
                $data['urls'] = $urlUser;

                return view('historico.php', $data);
            }
        }
    }
}
