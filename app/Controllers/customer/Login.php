<?php

namespace App\Controllers\customer;

use App\Controllers\BaseController;
use App\Models\customer\Customer_model;

class Login extends BaseController
{
    protected $customerModel;

    public function __construct()
    {
        $this->customerModel = new Customer_model();
    }

    public function login()
    {
        // Check if form is submitted
        if ($this->request->getMethod() === 'post') {
            // Retrieve form input
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            // Retrieve user from database
            $user = $this->customerModel->where('username', $username)->first();

            if ($user) {
                // Verify password
                if (password_verify($password, $user['password'])) {
                    // Password is correct, log in user
                    // For example, set session and redirect to dashboard
                    // $this->session->set('user_id', $user['id']);
                    // return redirect()->to('dashboard');
                    return redirect()->to('/'); // Change '/dashboard' to your actual dashboard route
                } else {
                    // Incorrect password, set error message and reload login page
                    $data['error'] = 'Incorrect password';
                    return view('customer/login', $data);
                }

            } else {
                // User not found, set error message and reload login page
                $data['error'] = 'User not found';
                return view('customer/login', $data);
            }
        }

        // If form is not submitted, load login page without error message
        return view('customer/login');
    }
}
