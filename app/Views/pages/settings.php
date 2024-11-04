<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-800 flex items-center justify-center min-h-screen">
    <?php include __DIR__.'/../components/sidenav.php' ?>
    <div class="bg-slate-900 p-6 rounded-lg shadow-md w-1/3">
        <h1 class="text-2xl text-gray-300 font-semibold mb-4">Edit Your Profile</h1>

        <!-- Display Error Messages -->
        <?php if (session()->getFlashdata('errors')): ?>
            <div class="bg-red-500 text-white p-2 rounded mb-4">
                <ul>
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Display Success Message -->
        <?php if (session()->getFlashdata('message')): ?>
            <div class="bg-green-500 text-white p-2 rounded mb-4">
                <?= session()->getFlashdata('message') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('settings/update') ?>" method="post" class="space-y-4">
            <div>
                <label for="firstName" class="block text-sm font-medium text-gray-300">First Name:</label>
                <input type="text" name="firstName" id="firstName" value="<?= esc($user['firstName']) ?>" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="lastName" class="block text-sm font-medium text-gray-300">Last Name:</label>
                <input type="text" name="lastName" id="lastName" value="<?= esc($user['lastName']) ?>" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="username" class="block text-sm font-medium text-gray-300">Username:</label>
                <input type="text" name="username" id="username" value="<?= esc($user['username']) ?>" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="oldPassword" class="block text-sm font-medium text-gray-300">Old Password:</label>
                <input type="password" name="oldPassword" id="oldPassword" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-300">New Password:</label>
                <input type="password" name="password" id="password" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="confirmPassword" class="block text-sm font-medium text-gray-300">Confirm New Password:</label>
                <input type="password" name="confirmPassword" id="confirmPassword" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div class="flex items-center mt-2">
                <input type="checkbox" id="togglePassword" class="mr-2">
                <label for="togglePassword" class="text-sm font-medium text-gray-300">Show Password</label>
            </div>

            <button type="submit" class="w-full mt-4 bg-blue-600 text-white font-semibold p-2 rounded-md hover:bg-blue-700 transition duration-200">Update</button>
        </form>
    </div>

    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('change', function () {
            const passwordField = document.getElementById('password');
            const confirmPasswordField = document.getElementById('confirmPassword');
            const oldPasswordField = document.getElementById('oldPassword');
            const type = this.checked ? 'text' : 'password';
            passwordField.type = type;
            confirmPasswordField.type = type;
            oldPasswordField.type = type;
        });
    </script>
</body>
</html>
