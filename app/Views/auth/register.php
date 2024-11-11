<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php include __DIR__ . '/../components/navigation.php' ?>
  <div class="max-w-lg mx-auto pt-8 mt-20 bg-slate-900 dark:bg-gray-800 rounded-lg shadow-md px-8 py-10 flex flex-col items-center">
    <h1 class="text-xl font-bold text-center text-gray-300 dark:text-gray-200 mb-8">Register</h1>
    <!-- Error Display -->
    <?php if (session()->has('errors')): ?>
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
        <ul>
          <?php foreach (session('errors') as $error): ?>
            <li class="text-red-500"><?= esc($error) ?></li>
          <?php endforeach ?>
        </ul>
      </div>
    <?php endif; ?>

    <form action="<?= base_url('pages/register'); ?>" method="POST" class="w-full flex flex-col gap-4">
      <?= csrf_field() ?>

      <div class="flex items-start flex-col justify-start">
        <label for="firstName" class="text-sm text-gray-300 dark:text-gray-200 mr-2">First Name:</label>
        <input type="text" id="firstName" name="firstName" class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-500">
      </div>

      <div class="flex items-start flex-col justify-start">
        <label for="lastName" class="text-sm text-gray-300 dark:text-gray-200 mr-2">Last Name:</label>
        <input type="text" id="lastName" name="lastName" class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-500">
      </div>

      <div class="flex items-start flex-col justify-start">
        <label for="username" class="text-sm text-gray-300 dark:text-gray-200 mr-2">Username:</label>
        <input type="text" id="username" name="username" class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-500">
      </div>

      <div class="flex items-start flex-col justify-start">
        <label for="email" class="text-sm text-gray-300 dark:text-gray-200 mr-2">Email:</label>
        <input type="email" id="email" name="email" class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-500">
      </div>

      <div class="flex items-start flex-col justify-start">
        <label for="password" class="text-sm text-gray-300 dark:text-gray-200 mr-2">Password:</label>
        <input type="password" id="password" name="password" class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-500">
      </div>

      <div class="flex items-start flex-col justify-start">
        <label for="confirmPassword" class="text-sm text-gray-300 dark:text-gray-200 mr-2">Confirm Password:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-500">
      </div>

      <div class="flex items-center mt-2">
        <input type="checkbox" id="togglePassword" class="mr-2">
        <label for="togglePassword" class="text-sm font-medium text-gray-300">Show Password</label>
      </div>

      <button type="submit" class="bg-blue-400 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md shadow-sm">Register</button>
    </form>

    <div class="mt-4 text-center">
      <span class="text-sm text-gray-400 dark:text-gray-300">Already have an account? </span>
      <a href="<?= base_url('/') ?>" class="text-blue-400 hover:text-blue-600">Login</a>
    </div>
    </form>
  </div>
  <script>
    // Toggle password visibility
    document.getElementById('togglePassword').addEventListener('change', function() {
      const passwordField = document.getElementById('password');
      const confirmPasswordField = document.getElementById('confirmPassword');
      const type = this.checked ? 'text' : 'password';
      passwordField.type = type;
      confirmPasswordField.type = type;
    });
  </script>
</body>

</html>