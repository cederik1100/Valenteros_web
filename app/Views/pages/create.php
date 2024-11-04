<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Task</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-slate-800 flex items-center justify-center h-screen">
    <?php include __DIR__.'/../components/sidenav.php'?>
    <div class="bg-slate-900 p-8 rounded-lg shadow-lg max-w-md w-full">
        <h2 class="text-2xl font-semibold text-gray-300 mb-6">Add a New Task</h2>

        <form action="<?= site_url('pages/create') ?>" method="post" class="space-y-4">
            <?= csrf_field() ?>

            <?php $errors = session()->getFlashdata('errors'); ?>

            <!-- Task Field -->
            <div>
                <label for="task" class="block text-gray-300 font-medium">Task:</label>
                <input type="text" name="task" id="task" value="<?= old('task') ?>" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <?php if (isset($errors['task'])): ?>
                    <p class="text-red-500 text-sm"><?= $errors['task'] ?></p>
                <?php endif; ?>
            </div>

            <!-- Status Field -->
            <div>
                <label for="status" class="block text-gray-300 font-medium">Status:</label>
                <select name="status" id="status" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="pending" <?= old('status') === 'pending' ? 'selected' : '' ?>>Pending</option>
                    <option value="completed" <?= old('status') === 'completed' ? 'selected' : '' ?>>Completed</option>
                </select>
                <?php if (isset($errors['status'])): ?>
                    <p class="text-red-500 text-sm"><?= $errors['status'] ?></p>
                <?php endif; ?>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-blue-500 text-white font-medium py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Add Task</button>
        </form>
    </div>
</body>
</html>
