<?php

namespace App\Models;

use CodeIgniter\Model;

class CompanyModel extends Model
{
    protected $table      = 'company';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['idCompany', 'profileCompany', 'namaCompany', 'emailCompany', 'passwordCompany', 'handphoneCompany', 'alamat', 'status'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getCompanyByEmail($email)
    {
        return $this->where('emailCompany', $email)->first();
    }
}
