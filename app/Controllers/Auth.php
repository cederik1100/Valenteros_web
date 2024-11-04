<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Users;
use App\Models\LoginHistory as LoginHistoryModel;

class Auth extends BaseController
{
    public function showRegister()
    {
        return view('pages/register');
    }

    public function register()
    {
        $model = new Users();

        // Validation rules without email
        if (!$this->validate([
            'firstName' => 'required|alpha|min_length[2]|max_length[50]',
            'lastName' => 'required|alpha|min_length[2]|max_length[50]',
            'username' => 'required|alpha_dash|min_length[5]|max_length[20]|is_unique[users.username]',
            'password' => [
                'rules' => 'required|min_length[6]|max_length[30]|regex_match[/(?=.*[A-Z])(?=.*[0-9])(?=.*[\W_])/]',
                'errors' => [
                    'regex_match' => 'Password must contain at least one uppercase letter, one number, and one special character (or underscore).',
                ]
            ],

            'confirmPassword' => 'required|matches[password]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Data to be saved
        $data = [
            'firstName' => $this->request->getVar('firstName'),
            'lastName' => $this->request->getVar('lastName'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ];

        // Attempt to save the user data
        if ($model->save($data)) {
            return redirect()->to('pages/login')->with('success', 'Registration successful! Please log in.');
        } else {
            return redirect()->back()->withInput()->with('errors', ['An error occurred while registering. Please try again.']);
        }
    }


    public function showLogin()
    {
        return view('pages/login');
    }
    public function login()
    {
        // Set timezone to Manila
        date_default_timezone_set('Asia/Manila');
        
        $session = session();
        $model = new Users();
        $loginHistoryModel = new LoginHistoryModel();
    
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('username', $username)->first();
    
        if ($data) {
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if ($authenticatePassword) {
                // Log login history
                $ipAddress = file_get_contents('https://api.ipify.org'); // Get user's IP address
                $loginHistoryModel->insert([
                    'user_id' => $data['id'],
                    'login_time' => date('Y-m-d H:i:s'), // Current date and time in Manila time
                    'ip_address' => $ipAddress
                ]);
    
                // Set session data
                $ses_data = [
                    'id' => $data['id'],
                    'firstName' => $data['firstName'],
                    'lastName' => $data['lastName'],
                    'username' => $data['username'],
                    'isLoggedIn' => true
                ];
                $session->set($ses_data);
    
                return redirect()->to('pages/tasks');
            } else {
                return redirect()->back()->withInput()->with('error', 'Wrong Password');
            }
        } else {
            return redirect()->back()->withInput()->with('error', 'Username not found');
        }
    }
    
    public function logout()
    {
        // Set timezone to Manila
        date_default_timezone_set('Asia/Manila');
        
        $session = session();
        $loginHistoryModel = new LoginHistoryModel();
    
        $userId = $session->get('id');
    
        if ($userId) {
            // Update logout time for the current user
            $loginHistoryModel->set('logout_time', date('Y-m-d H:i:s'))
                ->where('user_id', $userId)
                ->where('logout_time', null) // Ensure it updates the correct record
                ->update();
        }
    
        $session->destroy();
        return redirect()->to('pages/login');
    }
    
}
