<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
</head>

<body>
    <?php include __DIR__ . '/../components/navigation.php'; ?>
    <h1 class="text-3xl text-gray-300 text-center font-bold py-10">Contact Us</h1>

    <div class="container mx-auto mt-20 px-4">
        <div class="max-w-md mx-auto bg-slate-900 p-6 rounded-lg shadow-md">
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
            <?php if (session()->getFlashdata('success')): ?>
                <div class="bg-green-500 text-white p-2 rounded mb-4">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <form action="<?= site_url('contacts') ?>" method="POST">
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
</body>

</html>