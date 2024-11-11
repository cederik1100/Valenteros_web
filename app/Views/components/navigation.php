<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Document</title>
</head>

<body class="bg-slate-800">
  <nav class="block w-full max-w-screen-2xl px-4 py-2 mx-auto text-white bg-slate-900 shadow-md rounded-md lg:px-10 lg:py-5 mt-1">
    <div class="container flex flex-wrap items-center justify-between mx-auto text-gray-100">
      <a href="#" class="mr-4 block cursor-pointer py-1.5 text-xl">
        <img src="<?= base_url('images/logo.png') ?>" alt="logo" class="w-10 h-10 text-gray-500">
      </a>
      <div class="hidden lg:block">
        <ul class="flex flex-col gap-2 mt-2 mb-4 lg:mb-0 lg:mt-0 lg:flex-row lg:items-center lg:gap-6">
          <li class="flex items-center p-3 text-gray-300 rounded-lg bg-slate-900 dark:text-white hover:bg-gray-700 dark">
            <a href="<?= base_url('/') ?>" class="flex items-center">
              Home
            </a>
          </li>
          <li class="flex items-center p-3 text-gray-300 rounded-lg bg-slate-900 dark:text-white hover:bg-gray-700 dark">
            <a href="<?= base_url('about') ?>" class="flex items-center">
              About
            </a>
          </li>
          <li class="flex items-center p-3 text-gray-300 rounded-lg bg-slate-900 dark:text-white hover:bg-gray-700 dark">
            <a href="<?= base_url('contacts') ?>" class="flex items-center">
              Contacts
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

</body>

</html>