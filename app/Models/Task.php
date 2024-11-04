<?php

namespace App\Models;

use CodeIgniter\Model;

class Task extends Model
{
    protected $table      = 'tasks'; 
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['task',
                                'user_id',
                                'status',]; 
}
