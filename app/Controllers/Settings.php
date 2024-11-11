<?php

namespace App\Controllers;

use App\Models\Users;

class Settings extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/')->with('error', 'You must be logged in to access this page.');
        }
        $model = new Users();
        $userId = session()->get('id');
        $data['user'] = $model->find($userId);

        return view('logged/settings', $data);
    }


    public function showEditProfile(){
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/')->with('error', 'You must be logged in to access this page.');
        }
        $model = new Users();
        $userId = session()->get('id');
        $data['user'] = $model->find($userId);

        return view('logged/editProfile', $data);
    }

    public function EditProfile(){

        $model =  new Users();
        $userId = session()->get('id');

        // Fetch current user data to compare passwords
        $user = $model->find($userId);

        // Validation rules
        if (!$this->validate([
            'firstName' => 'required|alpha|min_length[2]|max_length[50]',
            'lastName' => 'required|alpha|min_length[2]|max_length[50]',
            'username' => "required|alpha_dash|min_length[5]|max_length[20]|is_unique[users.username,id,{$userId}]",
        ])) {
            // Return with validation errors
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Verify the changes
        if (!password_verify($this->request->getPost('password'), $user['password'])) {
            redirect()->back()->withInput()->with('errors', ['password' => 'Password is incorrect.']);
        }
        
        // Prepare data for update
        $data = [
            'firstName' => $this->request->getPost('firstName'),
            'lastName' => $this->request->getPost('lastName'),
            'username' => $this->request->getPost('username'),
        ];

        // Update user information
        $model->update($userId, $data);
        return redirect()->back()->with('success', 'Profile updated successfully.');
        
    }

    public function showEditPassword(){
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/')->with('error', 'You must be logged in to access this page.');
        }
        $model = new Users();
        $userId = session()->get('id');
        $data['user'] = $model->find($userId);

        return view('logged/editPassword', $data);
    }

    public function editPassword(){
        $model = new Users();
        $userId = session()->get('id');

        // Fetch current user data to compare passwords
        $user = $model->find($userId);

        // Validation rules
        if (!$this->validate([
            'oldPassword' => 'required',
            'password' => [
                'rules' => 'required|min_length[6]|max_length[30]|regex_match[/(?=.*[A-Z])(?=.*[0-9])(?=.*[\W_])/]',
                'errors' => [
                    'regex_match' => 'Password must contain at least one uppercase letter, one number, and one special character.',
                ]
            ],
            'confirmPassword' => 'required|matches[password]',
        ])) {
            // Return with validation errors
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Verify the old password
        if (!password_verify($this->request->getPost('oldPassword'), $user['password'])) {
            // Add an error for incorrect old password
            return redirect()->back()->withInput()->with('errors', ['oldPassword' => 'The old password is incorrect.']);
        }    

        // Prepare data for update        
        $data = [
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        // Update user information
        $model->update($userId, $data);
        return redirect()->back()->with('success', 'Password updated successfully.');
    }
    
}
