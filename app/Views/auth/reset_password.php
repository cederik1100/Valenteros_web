<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <!-- Include Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<form action="<?= base_url('updatePassword') ?>" method="POST" class="w-full max-w-lg bg-white p-8 shadow-md rounded-lg">
    <!-- CSRF Token (If you're using Laravel or CodeIgniter) -->
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="space-y-6">
        <!-- New Password Field -->
        <div>
            <label for="newPassword" class="block text-sm font-semibold text-gray-700">New Password</label>
            <input id="newPassword" type="password" name="newPassword" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Enter your new password" required>
        </div>

        <!-- Confirm Password Field -->
        <div>
            <label for="confirmPassword" class="block text-sm font-semibold text-gray-700">Confirm Password</label>
            <input id="confirmPassword" type="password" name="confirmPassword" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Re-enter your new password" required>
        </div>

        <!-- Show Password Checkbox -->
        <div class="flex items-center space-x-2">
            <input type="checkbox" id="showPassword" class="h-4 w-4" onclick="togglePasswordVisibility()">
            <label for="showPassword" class="text-sm text-gray-600">Show Password</label>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full py-3 bg-indigo-500 text-white font-semibold rounded-md hover:bg-indigo-600 focus:outline-none">Reset Password</button>
    </div>
</form>

<script>
    function togglePasswordVisibility() {
        var passwordFields = document.querySelectorAll('#newPassword, #confirmPassword');
        passwordFields.forEach(function(field) {
            field.type = field.type === 'password' ? 'text' : 'password';
        });
    }
</script>

</body>
</html>
