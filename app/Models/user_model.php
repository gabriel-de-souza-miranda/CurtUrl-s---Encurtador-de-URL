<?php namespace App\Models;

use CodeIgniter\Model;

class user_model extends Model
{
    protected $table      = 'usuarios';
    protected $primaryKey = 'email';    

    protected $allowedFields = ['nome', 'email', 'senha','ip', 'data_login', 'horario_login', 'hash_rec_senha'];
    protected $returnType     = 'array';


    /*protected $validationRules = [
        'nome' => 'required|min_length[3]|alpha_numeric',
        'email' => 'required|min_length[3]|is_unique[usuarios.email]|valid_email',
        'senha' => 'required|min_length[3]'
    ];*/
}