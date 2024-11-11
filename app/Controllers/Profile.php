<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Users;

class Profile extends BaseController
{
    public function index($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/')->with('error', 'You must be logged in to access this page.');
        }

        $userModel = new Users();

        // Fetch user data by ID
        $user = $userModel->find($id);

        // Check if user exists
        if (!$user) {
            return redirect()->to('/')->with('error', 'User not found');
        }

        // Pass user data to the view
        return view('logged/profile', ['user' => $user]);
    }
}
