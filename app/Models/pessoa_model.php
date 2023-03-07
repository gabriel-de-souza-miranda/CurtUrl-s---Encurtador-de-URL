<?php namespace App\Models;

use CodeIgniter\Model;

class pessoa_model extends Model
{
        protected $table      = 'usuarios';
        protected $primaryKey = 'email';
    
        protected $returnType     = 'object';
        protected $useSoftDeletes = false;
    
        protected $allowedFields = ['nome','email', 'senha', 'hash_rec_senha'];
    
        protected $useTimestamps = false;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';
        protected $deletedField  = 'deleted_at';
    
        protected $validationRules    = 'usuarios';
        protected $validationMessages = [];
        protected $skipValidation     = false;
    
}