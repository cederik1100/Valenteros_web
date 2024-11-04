<?php

namespace App\Controllers;

use App\Models\Users;

class Settings extends BaseController
{
    public function index()
    {
        $model = new Users();
        $userId = session()->get('id'); 
        $data['user'] = $model->find($userId);

        return view('pages/settings', $data);
    }

    public function update()
    {
        $model = new Users();
        $userId = session()->get('id');
    
        // Fetch current user data to compare passwords
        $user = $model->find($userId);
    
        // Validation rules
        if (!$this->validate([
            'firstName' => 'required|alpha|min_length[2]|max_length[50]',
            'lastName' => 'required|alpha|min_length[2]|max_length[50]',
            'username' => "required|alpha_dash|min_length[5]|max_length[20]|is_unique[users.username,id,{$userId}]",
            'oldPassword' => 'required',
            'password' => 'permit_empty|min_length[8]|max_length[30]|regex_match[/(?=.*\d)(?=.*[A-Z])(?=.*[\W_])/]',
            'confirmPassword' => 'matches[password]',
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
            'firstName' => $this->request->getPost('firstName'),
            'lastName' => $this->request->getPost('lastName'),
            'username' => $this->request->getPost('username'),
        ];
    
        // If a new password is provided, hash and include it in the update
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }
    
        // Update user information
        $model->update($userId, $data);
        return redirect()->to('pages/settings')->with('message', 'Profile updated successfully.');
    }
}
