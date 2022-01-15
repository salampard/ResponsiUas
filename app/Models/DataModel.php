<?php

namespace App\Models;

use CodeIgniter\Model;

class DataModel extends Model
{
    protected $table = 'data';
    protected $useTimestamps = false;

    protected $allowedFields = ['nim', 'nama', 'email', 'kodeOTP', 'expiredDate', 'fp'];
    protected $primaryKey = 'nim';

    public function getData($email)
    {
        return $this->where(['email' => $email])->first();
    }
    public function getAll()
    {
        return $this->findAll();
    }
}
