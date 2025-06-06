<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Dodaj sliku</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-gray-100 to-white min-h-screen flex items-center justify-center">
    <div class="w-full max-w-lg p-8 bg-white rounded-2xl shadow-xl">
        <h2 class="text-3xl font-semibold text-center text-gray-800 mb-6">
            <i class="fas fa-upload text-blue-500 mr-2"></i> Dodaj sliku
        </h2>

        <?php if (isset($_SESSION['upload_error'])): ?>
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 text-sm">
                <?= $_SESSION['upload_error']; unset($_SESSION['upload_error']); ?>
            </div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data" action="index.php?controller=image&action=upload">
            <div class="mb-6">
                <label for="image" class="block text-sm font-medium text-gray-700">Izaberite sliku</label>
                <div class="mt-1 relative">
                    <input type="file" name="image" id="image" required
                        class="block w-full text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm cursor-pointer focus:outline-none focus:ring focus:border-blue-500">
                </div>
            </div>

            <button type="submit"
                class="w-full py-2 px-4 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-200">
                <i class="fas fa-cloud-upload-alt mr-2"></i> Postavi sliku
            </button>

            <div class="text-center mt-4">
                <a href="index.php?controller=image&action=index"
                   class="text-blue-500 text-sm hover:underline">
                    <i class="fas fa-arrow-left mr-1"></i> Nazad na galeriju
                </a>
            </div>
        </form>
    </div>
</body>
</html>
