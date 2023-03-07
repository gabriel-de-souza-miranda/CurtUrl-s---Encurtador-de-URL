<?php

namespace App\Controllers;
//use CodeIgniter\CLI\CLI;

class Delete extends BaseController
{

    public function Del()
    {      
        $data['titulo'] = "CurtURL's - Histórico de URL's'";
        $data['logado'] = $this->isLoggedIn();

        $id = $this->request->getPost('id');

        $urlModel = new \App\Models\urlOn_model(); 

        $urlDel = $urlModel->find($id);
        
        //d($urlDel);
        //echo "este é o ID:".$id;

        $urlModel->delete($urlDel);

        //return view('historico.php', $data);
        $this->session->setFlashData ('msgSuc', 'URL excluida com SUCESSO');
        return redirect()->to(base_url('historicourls/hist'));


    }
}
