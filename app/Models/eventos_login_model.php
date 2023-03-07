<?php namespace App\Models;

use CodeIgniter\Model;

class eventos_login_model extends Model
{
    protected $table      = 'eventos_login';
    protected $primaryKey = 'email_user';    

    protected $allowedFields = ['email_user','ip_user', 'data_login', 'horario_login','tipo_evento'];
    protected $returnType     = 'object';


    /*protected $validationRules = [
        'nome' => 'required|min_length[3]|alpha_numeric',
        'email' => 'required|min_length[3]|is_unique[usuarios.email]|valid_email',
        'senha' => 'required|min_length[3]'
    ];*/
}