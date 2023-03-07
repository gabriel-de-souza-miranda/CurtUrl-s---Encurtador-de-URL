<?php namespace App\Models;

use CodeIgniter\Model;

class urlOn_Model extends Model
{
    protected $table      = 'url_on';
    protected $primaryKey = 'id';    

    protected $allowedFields = ['email_user', 'url_short', 'url_long', 'quant_acessos'];
    protected $returnType     = 'array';


    /*protected $validationRules = [
        'utl_long' => 'required|min_length[3]|alpha_numeric'
    ];*/
}

