<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-800 min-h-screen flex">
    <!-- Sidebar -->
    <div class="w-64 bg-gray-900 p-4">
        <?php include __DIR__ . '/../components/sidenav.php' ?>
    </div>
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
    <!-- Main Content -->
   
    <div class="flex flex-col items-center justify-center w-3/4 p-8 space-y-4">
        <a class="w-full md:w-1/2 bg-blue-600 text-white font-semibold p-2 rounded-md hover:bg-blue-700 transition duration-200 text-center"
            href="<?= site_url('editProfile') ?>">
            Edit Profile
        </a>
        <a class="w-full md:w-1/2 bg-blue-600 text-white font-semibold p-2 rounded-md hover:bg-blue-700 transition duration-200 text-center"
            href="<?= site_url('editPassword') ?>">
            Change Password
        </a>
    </div>

</body>

</html>
