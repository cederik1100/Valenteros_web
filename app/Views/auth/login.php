<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <?php include __DIR__ . '/../components/navigation.php' ?>
  <h1 class="text-3xl text-gray-300 text-center font-bold py-10">Home</h1>

  <div class="max-w-lg mx-auto pt-8 mt-20 bg-slate-900 dark:bg-gray-800 rounded-lg shadow-md px-8 py-10 flex flex-col items-center">
    <h1 class="text-xl font-bold text-center text-gray-300 dark:text-gray-200 mb-8">Login</h1>

    <!-- Error message Display -->
    <?php if (session()->has('success')): ?>
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
        <ul>
          <div class="alert alert-success">
            <?= esc(session('success')) ?>
          </div>
        </ul>
      </div>
    <?php endif; ?>

    <?php if (session()->has('error')): ?>
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
        <ul>
          <div class="alert alert-danger">
            <?= esc(session('error')) ?>
          </div>
        </ul>
      </div>
    <?php endif; ?>

    <form action="<?= base_url('/') ?>" method="post" class="w-full flex flex-col gap-4">
      <?= csrf_field() ?>

      <div class="flex items-start flex-col justify-start">
        <label for="username" class="text-sm text-gray-300 dark:text-gray-200 mr-2">Username:</label>
        <input type="text" id="username" name="username" class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-500">
      </div>

      <div class="flex items-start flex-col justify-start">
        <label for="password" class="text-sm text-gray-300 dark:text-gray-200 mr-2">Password:</label>
        <input type="password" id="password" name="password" class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-500">
      </div>

      <div class="flex items-center mt-2">
        <input type="checkbox" id="togglePassword" class="mr-2">
        <label for="togglePassword" class="text-sm font-medium text-gray-300">Show Password</label>
<!-- 
        Forgot Password Link
        <a href="#" onclick="toggleModal()" class="ml-auto text-sm text-blue-400 hover:text-blue-600">Forgot password?</a> -->
      </div>

      <button type="submit" class="bg-blue-400 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md shadow-sm">Login</button>
    </form>

    <div class="mt-4 text-center">
      <span class="text-sm text-gray-500 dark:text-gray-300">Don't have an account yet? </span>
      <a href="<?= base_url('register') ?>" class="text-blue-400 hover:text-blue-600">Register</a>
    </div>
  </div>


  
  <!-- Modal for Forgot Password -->
  <div id="forgotPasswordModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white dark:bg-gray-700 rounded-lg w-96 p-6">
      <h2 class="text-xl font-bold text-gray-700 dark:text-gray-200 mb-4">Forgot Password</h2>
      <p class="text-gray-600 dark:text-gray-300 mb-4">Enter your email to reset your password.</p>

      <form action="<?= base_url('resetPassword') ?>" method="post" class="flex flex-col gap-4">
        <label for="email" class="text-sm text-gray-700 dark:text-gray-200">Email:</label>
        <input type="email" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500">
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 rounded-md mt-2">Send Reset Link</button>
      </form>
      <button onclick="toggleModal()" class="mt-4 text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-300">Close</button>
    </div>
  </div>

  <script>
    // Toggle password visibility
    document.getElementById('togglePassword').addEventListener('change', function() {
      const passwordField = document.getElementById('password');
      passwordField.type = this.checked ? 'text' : 'password';
    });

    // Function to toggle the forgot password modal
    function toggleModal() {
      const modal = document.getElementById('forgotPasswordModal');
      modal.classList.toggle('hidden');
    }
  </script>
</body>

</html>
