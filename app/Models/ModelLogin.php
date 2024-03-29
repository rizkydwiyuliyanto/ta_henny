<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLogin extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_user';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = ['id_user', 'nama_user', 'email', 'password', 'level'];

    public function CekUser($email, $password)
    {
        return $this->db->table('tbl_user')
            ->where('email', $email)
            ->where('password', $password)
            ->get()->getRowArray();
    }
}
