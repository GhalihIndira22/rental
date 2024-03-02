<?php

namespace app\Controllers\customer;

use App\Controllers\BaseController;
use app\Models\customer\Customer_model;

class Register extends BaseController
{
    /**
     * @throws \ReflectionException
     */
    public function register(): string|\CodeIgniter\HTTP\RedirectResponse
    {
        helper('form');
        $validation = \Config\Services::validation();

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'username' => 'required|min_length[3]|max_length[255]|is_unique[customers.username]',
                'email' => 'required|valid_email|is_unique[customers.email]',
                'password' => 'required|min_length[8]'
            ];

            if (!$this->validate($rules)) {
                return view('customer/register', ['validation' => $validation]);
            }

            $customerModel = new Customer_model();
            $customerModel->save([
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
            ]);

            return redirect()->to('/');
        }

        return view('customer/register');
    }
}
