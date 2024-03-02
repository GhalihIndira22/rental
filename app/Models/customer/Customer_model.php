<?php

namespace app\Models\customer;

use CodeIgniter\Model;

class Customer_model extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'password'];

    public function getCustomerByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

}