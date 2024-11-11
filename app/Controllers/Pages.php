<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Pages extends BaseController
{
    function about()
    {
        $session = session();
        if ($session->get('isLoggedIn')) {
            return redirect()->to('pages/tasks');
        }
        return view('pages/about');
    }
    function contacts()
    {
        $session = session();
        if ($session->get('isLoggedIn')) {
            return redirect()->to('pages/tasks');
        }
        return view('pages/contacts');
    }

    public function emailContacts()
    {
         // Load validation library
         $validation = \Config\Services::validation();

         // Define validation rules
         $rules = [
             'name' => 'required|min_length[3]|max_length[50]',
             'email' => 'required|valid_email',
             'message' => 'required|min_length[10]'
         ];
 
         if ($this->validate($rules)) {
             // Get form data
             $name = $this->request->getPost('name');
             $email = $this->request->getPost('email');
             $message = $this->request->getPost('message');
 
             // Load email library
             $emailService = \Config\Services::email();
 
             // Configure email
             $emailService->setFrom($email, $name); // Sender's email and name
             $emailService->setTo('ntek.system.inc.2024@gmail.com'); // Recipient's email
             $emailService->setSubject('New Contact Message');
             $emailService->setMessage("
                 <h2>New Contact Message</h2>
                 <p><strong>Name:</strong> {$name}</p>
                 <p><strong>Email:</strong> {$email}</p>
                 <p><strong>Message:</strong></p>
                 <p>{$message}</p>
             ");
 
             // Attempt to send the email
             if ($emailService->send()) {
                 return redirect()->to('contacts')->with('success', 'Thank you for your message! We will get back to you soon.');
             } else {
                 // Get error for debugging
                 $data['error'] = $emailService->printDebugger(['headers']);
                 return redirect()->to('contacts')->with('error', 'Unable to send email. Please try again later.');
             }
         } else {
             // If validation fails, return with errors
             return redirect()->to('contacts')->withInput()->with('errors', $validation->getErrors());
         }
     }
 }
