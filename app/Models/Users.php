<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'firstName', 
        'lastName',
        'email', 
        'username', 
        'password'];
   
        public function updateUser($id, $data)
        {
            return $this->where('id', $id)->set($data)->update();
        }
}
