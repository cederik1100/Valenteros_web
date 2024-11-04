<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\LoginHistory as LoginHistoryModel;

class LoginHistory extends BaseController
{
    public function showLoginHistory()
    {
        // Assuming you store the user ID in session after logging in
        $userId = session()->get('id');

        // Initialize the login history model
        $loginHistoryModel = new LoginHistoryModel();

        // Fetch only the login history for the logged-in user
        $data['logins'] = $loginHistoryModel->where('user_id', $userId)->findAll();

        // Debugging: Check if the variable has been set correctly
        if (empty($data['logins'])) {
            log_message('error', 'No login history found for user ID: ' . $userId);
        }

        // Load the view with user-specific login history
        return view('pages/login_history', $data);
    }
}
