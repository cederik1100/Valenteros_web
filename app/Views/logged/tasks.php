<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-800 text-gray-200">
    <div class="flex min-h-screen">
        <!-- Sidebar Navigation -->
        <aside class="w-64 bg-gray-900 p-4">
            <?php include __DIR__.'/../components/sidenav.php'; ?>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <h1 class="text-3xl font-bold mb-6 text-center">Task List</h1>

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

            <div class="overflow-x-auto">
                <table class="min-w-full bg-slate-900 border border-gray-200">
                    <thead>
                        <tr class="bg-gray-900 text-gray-200 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">ID</th>
                            <th class="py-3 px-6 text-left">user-ID</th>
                            <th class="py-3 px-6 text-left">Task</th>
                            <th class="py-3 px-6 text-left">Status</th>
                            <th class="py-3 px-6 text-left">Created At</th>
                            <th class="py-3 px-6 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-200 text-sm font-light">
                        <?php foreach ($tasks as $task): ?>
                            <tr class="border-b border-gray-200 hover:bg-gray-500">
                                <td class="py-3 px-6"><?= esc($task['id']) ?></td>
                                <td class="py-3 px-6"><?= esc($task['user_id']) ?></td>
                                <td class="py-3 px-6"><?= esc($task['task']) ?></td>
                                <td class="py-3 px-6">
                                    <form action="tasks" method="POST" class="inline">
                                        <input type="hidden" name="id" value="<?= esc($task['id']) ?>">
                                        <select name="status" onchange="this.form.submit()"
                                            class="py-1 px-3 rounded-full text-xs <?= $task['status'] === 'completed' ? 'bg-green-200 text-green-800' : 'bg-yellow-200 text-yellow-800' ?>">
                                            <option value="pending" <?= $task['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
                                            <option value="completed" <?= $task['status'] === 'completed' ? 'selected' : '' ?>>Completed</option>
                                        </select>
                                    </form>
                                </td>
                                <td class="py-3 px-6"><?= esc($task['created_at']) ?></td>
                                <td class="py-3 px-6">
                                    <a href="<?= site_url(' edit/' . esc($task['id'])) ?>"
                                        class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 mx-2 rounded">
                                        Edit
                                    </a>
                                    <form action="<?= site_url('delete/' . esc($task['id'])) ?>" method="POST"
                                        class="inline" onsubmit="return confirm('Are you sure you want to delete this task?');">
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 mx-2 rounded">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="mt-4 flex justify-center">
                <a href="<?= site_url('create') ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Add New Task
                </a>
            </div>
        </main>
    </div>
</body>

</html>
