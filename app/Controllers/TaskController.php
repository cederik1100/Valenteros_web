<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Task;
use App\Models\Users;

class TaskController extends BaseController
{
    public function index()
    {
        $taskModel = new Task();
    
        // Get the current logged-in user's ID from the session
        $userId = session()->get('id');
    
        // Retrieve tasks for the logged-in user
        $data['tasks'] = $taskModel->where('user_id', $userId)->findAll();
    
        // Load the view and pass the tasks data
        return view('pages/tasks', $data);
    }
    

    public function updateStatus()
    {
        // Load the task model
        $taskModel = new Task();

        // Get the request data
        $id = $this->request->getPost('id');
        $status = $this->request->getPost('status');

        // Update the task status in the database
        $taskModel->update($id, ['status' => $status]);

        // Redirect back to the task list or where you want to go
        return redirect()->to('pages/tasks')->with('success', 'Task status updated successfully.');
    }

    public function edit($id)
{

    $taskModel = new Task();
    $task = $taskModel->find($id);

    if (!$task) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException("Task with ID $id not found.");
    }

    return view('pages/edit', ['task' => $task]);
}

public function update($id)
    {
        $model = new Task();

        
        $this->validate([
            'task' => 'required|min_length[3]',
            'status' => 'required|in_list[pending,completed]',
        ]);

        $data = [
            'task' => $this->request->getVar('task'),
            'status' => $this->request->getVar('status'),
        ];

        if ($model->update($id, $data)) {
            return redirect()->to('/pages/tasks')->with('success', 'Task updated successfully');
        } else {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }
    }

    public function create()
    {
        return view('pages/create');
    }

    public function store()
{
    $model = new Task();
    

    // Validate input
    if (!$this->validate([
        'task' => 'required|min_length[3]',
        'status' => 'required|in_list[pending,completed]',
    ])) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    // Prepare data for insertion
    $data = [
        'task' => $this->request->getVar('task'),
        'status' => $this->request->getVar('status'),
        'user_id' => session()->get('id'),
    ];

    // Save task to the database
    if ($model->insert($data)) {
        return redirect()->to('/pages/tasks')->with('success', 'Task created successfully');
    } else {
        return redirect()->back()->withInput()->with('errors', $model->errors());
    }
}
}


