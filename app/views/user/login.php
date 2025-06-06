<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Prijava</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-gray-100 to-white min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md p-8 bg-white rounded-2xl shadow-xl">
        <h2 class="text-3xl font-semibold text-center text-gray-800 mb-6">Prijava</h2>

        <?php if (isset($_SESSION['login_error'])): ?>
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 text-sm">
                <?= $_SESSION['login_error']; unset($_SESSION['login_error']); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="index.php?controller=user&action=login">
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Korisničko ime</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                        <i class="fas fa-user"></i>
                    </span>
                    <input type="text" name="username" id="username" required
                        class="pl-10 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Lozinka</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                        <i class="fas fa-lock"></i>
                    </span>
                    <input type="password" name="password" id="password" required
                        class="pl-10 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <button type="submit"
                class="w-full py-2 px-4 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-200">
                <i class="fas fa-sign-in-alt mr-2"></i> Prijavi se
            </button>
        </form>

        <p class="mt-4 text-sm text-center text-gray-600">
            Nemaš nalog?
            <a href="index.php?controller=user&action=register" class="text-blue-500 hover:underline">Registruj se</a>
        </p>
    </div>
</body>
</html>
