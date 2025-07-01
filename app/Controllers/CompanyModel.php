<?php
namespace App\Models;
use CodeIgniter\Model;

class CompanyModel extends Model
{
    protected $table      = 'company';
    protected $primaryKey = 'id';
    protected $allowedFields = ['profileCompany', 'namaCompany', 'emailCompany', 'passwordCompany', 'handphoneCompany', 'alamat', 'status', 'created_at', 'updated_at'];
}