<!-- app/Views/pages/login_history.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login History</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="flex">
        <?php include __DIR__ . '/../components/sidenav.php'; ?>

        <!-- Main content area -->
        <div class="flex-1 h-screen p-5 bg-slate-800 rounded-lg shadow-md py-10 pl-10 ml-60">
            <h1 class="text-2xl font-bold mb-4 text-gray-300">Login History</h1>
            <table class="min-w-full bg-slate-800 border border-gray-300 text-gray-200">
                <thead>
                    <tr class="bg-slate-900 text-gray-200">
                        <th class="py-2 px-4 border-b border-gray-300 text-left">User ID</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-left">Login Time</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-left">Logout Time</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-left">IP Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($logins)): ?>
                        <?php foreach ($logins as $login): ?>
                            <tr class="hover:bg-gray-500">
                                <td class="py-2 px-4 border-b border-gray-300"><?= esc($login['user_id']) ?></td>
                                <td class="py-2 px-4 border-b border-gray-300"><?= esc($login['login_time']) ?></td>
                                <td class="py-2 px-4 border-b border-gray-300"><?= esc($login['logout_time'] ?? 'Still logged in') ?></td>
                                <td class="py-2 px-4 border-b border-gray-300"><?= esc($login['ip_address']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="py-2 px-4 border-b border-gray-300 text-center">No login history available.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>