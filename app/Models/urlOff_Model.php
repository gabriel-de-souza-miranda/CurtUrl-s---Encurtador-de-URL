<?php namespace App\Models;

use CodeIgniter\Model;

class urlOff_Model extends Model
{
    protected $table      = 'url_off';
    protected $primaryKey = 'id';    

    protected $allowedFields = ['url_short', 'url_long'];
    protected $returnType     = 'array';


    /*protected $validationRules = [
        'utl_long' => 'required|min_length[3]|alpha_numeric'
    ];*/
}

