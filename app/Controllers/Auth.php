<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Users;
use App\Models\LoginHistory as LoginHistoryModel;
use App\Models\SessionModel;

class Auth extends BaseController
{
    public function showRegister()
    {
        $session = session();
        if ($session->get('isLoggedIn')) {
            return redirect()->to('tasks');
        }
        return view('auth/register');
    }

    public function register()
    {
        $model = new Users();

        // Validation rules without email
        if (!$this->validate([
            'firstName' => 'required|alpha|min_length[2]|max_length[50]',
            'lastName' => 'required|alpha|min_length[2]|max_length[50]',
            'username' => 'required|alpha_dash|min_length[5]|max_length[20]|is_unique[users.username]',
            'email' => 'required|valid_email|is_unique[users.email]',
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
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ];

        // Attempt to save the user data
        if ($model->save($data)) {
            return redirect()->to('/')->with('success', 'Registration successful! Please log in.');
        } else {
            return redirect()->back()->withInput()->with('errors', ['An error occurred while registering. Please try again.']);
        }
    }


    public function showLogin()
    {
        $session = session();
        if ($session->get('isLoggedIn')) {
            return redirect()->to('tasks');
        }
        return view('auth/login');
    }
    public function login()
    {
        $session = session();
        if ($session->get('isLoggedIn')) {
            return redirect()->to('tasks');
        }

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

                return redirect()->to('tasks');
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
        return redirect()->to('/');
    }

    public function emailForgotPassword()
    {
        // Load helper and library for form and session handling
        helper(['form', 'url']);
        $session = session();

        // Retrieve and validate the email input
        $email = $this->request->getPost('email');
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Check if the email exists in the database
            $userModel = new Users();
            $user = $userModel->where('email', $email)->first();

            if ($user) {
                // Generate a unique token and set an expiration time
                $token = bin2hex(random_bytes(50));
                $expiresAt = date('Y-m-d H:i:s', strtotime('+1 hour'));

                //ip link
                $ch = curl_init('https://api.ipify.org');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $ipAddress = curl_exec($ch);
                curl_close($ch);

                // Create a new session record with the reset token and expiration time
                $profileModel = new SessionModel();
                $sessionData = [
                    'user_id' => $user['id'],
                    'token' => $token,
                    'ip_address' => $ipAddress,
                    'user_agent' => $this->request->getUserAgent()->getAgentString(),
                    'created_at' => date('Y-m-d H:i:s'),
                    'expires_at' => $expiresAt
                ];

                if ($profileModel->insert($sessionData)) {
                    // Prepare the reset link and email message
                    $resetLink = site_url('resetPassword?token=' . $token);
                    $message = "Hi, please click the following link to reset your password: " . $resetLink;

                    // Send email
                    $emailService = \Config\Services::email();
                    $emailService->setTo($email);
                    $emailService->setFrom('ntek.system.inc.2024@gmail.com', 'Ntek');
                    $emailService->setSubject('Password Reset Request');
                    $emailService->setMessage($message);


                    if ($emailService->send()) {
                        $session->setFlashdata('success', 'Password reset link has been sent to your email.');
                    } else {
                        $session->setFlashdata('errors', 'Failed to send reset link. Please try again later.');
                    }
                } else {
                    $session->setFlashdata('errors', 'Failed to create session for token. Please try again.');
                }
            } else {
                $session->setFlashdata('errors', 'Email not found.');
            }
        } else {
            $session->setFlashdata('errors', 'Please enter a valid email address.');
        }

        // Redirect back to the form with success or error messages
        return redirect()->back();
    }

    public function resetPassword()
    {
        return view('auth/reset_password');
    }

    public function updatePassword()
    {
        
        
    }
}
