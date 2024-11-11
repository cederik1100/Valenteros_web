<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-800 text-gray-800">

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6 text-center">Edit Task</h1>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="bg-green-200 text-green-800 p-4 mb-4 rounded">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="bg-red-200 text-red-800 p-4 mb-4 rounded">
                <?= implode('<br>', session()->getFlashdata('errors')) ?>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('pages/update/' . esc($task['id'])) ?>" method="POST" class="bg-slate-900 shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <?= csrf_field(); // CSRF protection 
            ?>
            <div class="mb-4">
                <label class="block text-gray-300 text-sm font-bold mb-2" for="task">
                    Task
                </label>
                <input type="text" id="task" name="task" value="<?= esc($task['task']) ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-300 text-sm font-bold mb-2" for="status">
                    Status
                </label>
                <select id="status" name="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="pending" <?= $task['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
                    <option value="completed" <?= $task['status'] === 'completed' ? 'selected' : '' ?>>Completed</option>
                </select>
            </div>

            <div class="flex items-center justify-between">
            <a href="<?= site_url('tasks') ?>" class="w-1/6 bg-red-600 items-center justify-center text-center text-white font-semibold p-2 rounded-md hover:bg-red-700 transition duration-200">
                    Cancel
                </a>
                <button type="submit" class="w-1/6 bg-blue-600 text-white font-semibold p-2 rounded-md hover:bg-blue-700 transition duration-200">
                    Update Task
                </button>
            </div>
        </form>
    </div>

</body>

</html>