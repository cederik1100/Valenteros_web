<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include __DIR__.'/../components/navigation.php'?>
    <h1 class="text-3xl text-gray-300 text-center font-bold py-10">Contact us</h1>

    <div class="container mx-auto mt-20 px-4">
        <div class="max-w-md mx-auto bg-slate-900 p-6 rounded-lg shadow-md">
            <form action="#" method="POST">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="name">Name</label>
                    <input type="text" id="name" name="name" required class="mt-1 block w-full border border-gray-300 rounded-md p-2" />
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="email">Email</label>
                    <input type="email" id="email" name="email" required class="mt-1 block w-full border border-gray-300 rounded-md p-2" />
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="message">Message</label>
                    <textarea id="message" name="message" rows="4" required class="mt-1 block w-full border border-gray-300 rounded-md p-2"></textarea>
                </div>

                <button type="submit" class="w-full bg-blue-400 text-white font-semibold py-2 rounded-md hover:bg-blue-600">Send Message</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>