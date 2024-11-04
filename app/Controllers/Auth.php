<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Users;

class Auth extends BaseController
{
    public function showRegister()
    {
        return view('auth/register');
    }

    public function register()
    {
        $model = new Users();

        // Validation rules
        if (!$this->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'username' => 'required|is_unique[users.username]',
            'password' => 'required|min_length[6]'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'firstName' => $this->request->getVar('firstName'),
            'lastName' => $this->request->getVar('lastName'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        ];
        
        $model->save($data);
        return redirect()->to('auth/login');
    }

    public function showLogin()
    {
        return view('auth/login');
    }
    public function login()
    {
        $session = session();
        $model = new Users();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('username', $username)->first();

        if ($data) {
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if ($authenticatePassword) {
                $ses_data = [
                    'id' => $data['id'],
                    'firstName' => $data['firstName'],
                    'lastName' => $data['lastName'],
                    'username' => $data['username'],
                    'isLoggedIn' => true
                ];
                $session->set($ses_data);

                return redirect()->to('pages/dashboard');
            } else {
                return redirect()->back()->withInput()->with('error', 'Wrong Password');
            }
        } else {
            return redirect()->back()->withInput()->with('error', 'Username not found');
        }
    }

    public function dashboard()
    {
        return view('pages/dashboard');
    }

    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('auth/login');
    }
}
