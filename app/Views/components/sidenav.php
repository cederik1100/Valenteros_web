<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>

    <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-slate-900 dark :bg-gray-500">
            <ul class="space-y-2 font-medium">
                <a href="#" class="mr-4 block cursor-pointer py-1.5 text-xl p-20 pt-10">
                    <img src="<?= base_url('images/logo.png') ?>" alt="logo" class="w-10 h-10 text-gray-500">
                </a>

                <li>
                    <a href="<?= site_url('pages/tasks')?>" class="flex items-center p-2 text-gray-200 rounded-lg bg-slate-800 dark:text-gray-300 hover:bg-gray-700 dark">
                        <span class="ms-3">Todo</span>
                    </a>
                </li>
                <li>
                <a href="<?= site_url('pages/profile/' . session()->get('id')) ?>" class="flex items-center p-2 text-gray-200 rounded-lg bg-slate-800 dark:text-white hover:bg-gray-700 dark">
                        <span class="ms-3">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('pages/settings')?>" class="flex items-center p-2 text-gray-200 rounded-lg bg-slate-800 dark:text-white hover:bg-gray-700 dark">
                        <span class="ms-3">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('pages/history')?>" class="flex items-center p-2 text-gray-200 rounded-lg bg-slate-800 dark:text-white hover:bg-gray-700 dark">
                        <span class="ms-3">History</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('auth/logout')?>" class="flex items-center p-2 text-gray-200 rounded-lg bg-slate-800 dark:text-white hover:bg-gray-700 dark">
                        <span class="ms-3">Logout</span>
                    </a>
                </li>

            </ul>
        </div>
    </aside>


</body>

</html>