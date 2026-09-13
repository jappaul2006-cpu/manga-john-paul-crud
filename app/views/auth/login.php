<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Login to CRUD</h2>
        
        <?php if(isset($error)): ?>
            <div class="bg-red-100 text-red-700 p-2 rounded mb-4 text-sm text-center"><?= $error; ?></div>
        <?php endif; ?>

        <form action="<?= site_url('auth/process_login'); ?>" method="POST" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-600">Username</label>
                <input type="text" name="username" required class="w-full mt-1 p-2 border rounded focus:ring focus:ring-blue-300">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" name="password" required class="w-full mt-1 p-2 border rounded focus:ring focus:ring-blue-300">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700 font-medium">Login</button>
        </form>
    </div>
</body>
</html>
