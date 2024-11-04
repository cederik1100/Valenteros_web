<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginHistory extends Model
{
    protected $table = 'login_history'; // Update this to your table name
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'login_time', 'logout_time', 'ip_address'];
}
