<?php

namespace App\Controllers;

use CodeIgniter\CLI\CLI;


class Encurtador extends BaseController
{

    public function shortUrl()
    {
        $session = session();
        $log = $session->get('logado');
        $login = $session->get('email');

        if ($this->request->getMethod() === 'post') {

            $urlOriginal = $this->request->getPost('encurtar');

            if ($log == 0) {
                //se o usuario não estiver logado
                if (filter_var($urlOriginal, FILTER_VALIDATE_URL) == FALSE) {
                    $data['titulo'] = "CurtURL's - Página Inicial";
                    $data['logado'] = $log;
                    $data['erro'] = 'Digite uma URL válida';

                    //return redirect()->to(base_url('index.php'));
                    return view('index.php', $data);
                } else {

                    //$urlOriginal = $this->request->getPost('encurtar');

                    $x = 0 . sha1($urlOriginal)[0] . sha1($urlOriginal)[1] . sha1($urlOriginal)[2] . sha1($urlOriginal)[3] . sha1($urlOriginal)[4] . sha1($urlOriginal)[5] . sha1($urlOriginal)[6];

                    $urlEncurtada = "$x";

                    $raizSistema = "http://localhost/curt-urls/public/";

                    $dados = [
                        'url_long' => $urlOriginal,
                        'url_short' => $urlEncurtada
                    ];

                    $urlModel = new \App\Models\urlOff_Model();

                    $urlModel->insert($dados);

                    $data['titulo'] = "CurtURL's - Página Inicial";
                    $data['logado'] = 0;
                    $data['urlShort'] = $raizSistema . $urlEncurtada;

                    return view('index.php', $data);
                }
            } elseif ($log == 1) {
                //se o usuario estiver logado
                if (filter_var($urlOriginal, FILTER_VALIDATE_URL) == FALSE) {
                    $data['titulo'] = "CurtURL's - Página Inicial";
                    $data['logado'] = $log;
                    $data['erro_url'] = 'Digite uma URL válida';

                    //return redirect()->to(base_url('index.php'));
                    return view('index_login.php', $data);
                } else {

                    //$urlOriginal = $this->request->getPost('encurtar');

                    $x = 1 . sha1($urlOriginal)[0] . sha1($urlOriginal)[1] . sha1($urlOriginal)[2] . sha1($urlOriginal)[3] . sha1($urlOriginal)[4] . sha1($urlOriginal)[5] . sha1($urlOriginal)[6];

                    $urlEncurtada = "$x";

                    $raizSistema = "http://localhost/curt-urls/public/";

                    $db = \Config\Database::connect();

                    $query = $db->query("SELECT email FROM usuarios WHERE email = '$login' ");
                    $row = $query->getRowArray();

                    $dados = [
                        'email_user' => $row['email'],
                        'url_long' => $urlOriginal,
                        'url_short' => $urlEncurtada,
                        'quant_acessos' => 0
                    ];
                    
                    $urlModel = new \App\Models\urlOn_Model();

                    $urlModel->insert($dados);

                    $data['titulo'] = "CurtURL's - Página Inicial";
                    $data['logado'] = 1;
                    $data['urlShort'] = $raizSistema . $urlEncurtada;

                    return view('index_login.php', $data);
                }
            }
        } else {
            $data = [
                'titulo' => "CurtURL's - Página Inicial",
                'logado' => 0
            ];
            return view('index.php', $data);
        }
    }



    //DESENCURTADOR
    public function desencurtar($shotURI)
    {

        //echo "Recebido $shotURI como parametro";

        $dados = [
            'url_short' => $shotURI
        ];

        $db = \Config\Database::connect();


        if ($shotURI[0] == 0) {

            $query = $db->query("SELECT url_short, url_long FROM url_off WHERE url_short = '$shotURI'");
            $results = $query->getResultArray();


            foreach ($results as $row) {
                echo $row['url_short'];
                echo $row['url_long'];

                return redirect()->to($row['url_long']);
            }
        } elseif($shotURI[0] == 1) {
            $query = $db->query("SELECT id, url_short, url_long, quant_acessos FROM url_on WHERE url_short = '$shotURI'");
            $results = $query->getResultArray();


            foreach ($results as $row) {
                echo $row['id'];
                echo $row['url_long'];
                echo $row['quant_acessos'];               
            }

            $data = [
                'quant_acessos' => $row['quant_acessos']+1
            ];

            $urlModel = new \App\Models\urlOn_Model();

            $urlModel->update($row['id'], $data);

            return redirect()->to($row['url_long']);
        
        }
    }
    //----------------------------------------------------
}
