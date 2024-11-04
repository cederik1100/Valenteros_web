<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include __DIR__.'/../components/navigation.php'?>
    <h1 class="text-3xl text-gray-300 text-center font-bold py-10">Home</h1>

    <div class="max-w-lg mx-auto pt-8 mt-20 bg-slate-900 dark:bg-gray-800 rounded-lg shadow-md px-8 py-10 flex flex-col items-center">
    <h1 class="text-xl font-bold text-center text-gray-300 dark:text-gray-200 mb-8">Login</h1>

    <!-- Error Display -->
    <?php if (session()->has('error')): ?>
    <div class="alert alert-danger">
        <?= esc(session('error')) ?>
    </div>
    <?php endif; ?>
    
    <form action="<?= base_url('auth/login')?>" method="post" class="w-full flex flex-col gap-4">
    <?= csrf_field() ?> 

      <div class="flex items-start flex-col justify-start">
        <label for="username" class="text-sm text-gray-300 dark:text-gray-200 mr-2">Username:</label>
        <input type="text" id="username" name="username" class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-500">
      </div>

      <div class="flex items-start flex-col justify-start">
        <label for="password" class="text-sm text-gray-300 dark:text-gray-200 mr-2">Password:</label>
        <input type="password" id="password" name="password" class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-500">
      </div>

      <button type="submit" class="bg-blue-400 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md shadow-sm">Login</button>
    </form>

    <div class="mt-4 text-center">
      <span class="text-sm text-gray-500 dark:text-gray-300">Don't have an account yet? </span>
      <a href="register" class="text-blue-400 hover:text-blue-600">Register</a>
    </div>
    </form>
  </div>
</body>
</html>