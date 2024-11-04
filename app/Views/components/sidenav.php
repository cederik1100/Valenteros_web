<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="bg-slate-800">
<div
  class="relative flex h-[calc(100vh-0rem)] w-full max-w-[20rem] flex-col rounded-xl bg-slate-900 bg-clip-border p-4 text-gray-700 shadow-xl shadow-blue-gray-900/5">
  <div class="p-4 mb-2">
  <a href="#" class="mr-4 block cursor-pointer py-1.5 text-xl">
    <img src="<?= base_url('images/logo.png')?>" alt="logo" class="w-10 h-10 text-gray-500">
    </a>
  </div>
  <nav class="flex min-w-[240px] flex-col gap-1 p-2 font-sans text-base font-normal text-gray-300">   
    <div class="hidden lg:block">
      <ul class="flex items-center gap-2 mt-2 mb-4 lg:mb-0 lg:mt-0 lg:flex-row lg:items-center lg:gap-6">
        <li class="flex items-center p-1 text-md gap-x-2 text-gray-200">
          <a href="../auth/logout" class="flex items-center">
            Log Out
          </a>
        </li>
      </ul>
    </div>
  </nav>
</div>
</body>
</html>