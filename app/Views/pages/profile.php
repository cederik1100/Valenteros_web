<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-800 text-gray-200">
    <!-- Include the side navigation -->
    <div class="flex">
        <?php include __DIR__.'/../components/sidenav.php'; ?>

        <!-- Main content -->
        <div class="flex-grow container mx-auto p-8 mt-20">
            <div class="max-w-md mx-auto bg-gray-900 rounded-lg shadow-lg p-6">
                <h2 class="text-3xl font-bold text-center mb-6 text-indigo-400">User Profile</h2>
                <div class="space-y-4">
                    <div>
                        <p class="text-lg font-semibold">First Name:</p>
                        <p class="text-xl mb-2 text-gray-300"><?= esc($user['firstName']) ?></p>
                    </div>

                    <div>
                        <p class="text-lg font-semibold">Last Name:</p>
                        <p class="text-xl mb-2 text-gray-300"><?= esc($user['lastName']) ?></p>
                    </div>

                    <div>
                        <p class="text-lg font-semibold">Username:</p>
                        <p class="text-xl mb-2 text-gray-300"><?= esc($user['username']) ?></p>
                    </div>
                </div>
                <div class="text-center mt-6">
                    <a href="<?= site_url('pages/settings') ?>" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
