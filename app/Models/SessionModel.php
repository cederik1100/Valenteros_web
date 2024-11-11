<?php 

            namespace App\Models;

            use CodeIgniter\Model;

            class SessionModel extends Model
            {
                protected $table = 'user_sessions';
                protected $primaryKey = 'id';
                protected $allowedFields = [
                    'user_id',
                    'token',
                    'ip_address',
                    'user_agent',
                    'created_at',
                    'expires_at'
                ];
      
           
            }

?>