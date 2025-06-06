<?php session_start(); ?>
<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Galerija slika</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-gray-100 to-white min-h-screen">

    <nav class="bg-white shadow mb-8">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-gray-800">Galerija</h1>
            <a href="index.php?controller=user&action=logout" 
               class="text-sm text-white bg-red-500 hover:bg-red-600 px-4 py-2 rounded transition duration-200">
                <i class="fas fa-sign-out-alt mr-1"></i> Odjavi se
            </a>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <?php if (!empty($images)): ?>
                <?php foreach ($images as $image): ?>
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <img src="uploads/<?= htmlspecialchars($image['filename']) ?>"
                             onerror="this.onerror=null; this.src='https://via.placeholder.com/300x200?text=Slika+nije+nađena';"
                             alt="Slika"
                             class="w-full h-56 object-cover">

                        <div class="p-4">
                            <div class="text-sm text-gray-600">
                                <i class="fas fa-user mr-1"></i>
                                <?= !empty($image['username']) ? htmlspecialchars($image['username']) : 'Nepoznat korisnik' ?>
                            </div>
                            <div class="text-sm text-gray-600 mt-1">
                                <i class="fas fa-calendar-alt mr-1"></i>
                                <?= htmlspecialchars($image['created_at']) ?>
                            </div>

                            <?php if (isset($_SESSION['user']) && $_SESSION['user']['id'] == $image['user_id']): ?>
                                <form action="index.php?controller=image&action=delete" method="post" class="mt-3" onsubmit="return confirm('Da li si siguran da želiš da obrišeš ovu sliku?');">
                                    <input type="hidden" name="image_id" value="<?= $image['id'] ?>">
                                    <button type="submit"
                                            class="text-sm bg-red-100 text-red-600 px-3 py-1 rounded hover:bg-red-200 transition">
                                        <i class="fas fa-trash-alt mr-1"></i> Obriši
                                    </button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-span-full text-center text-gray-500 text-lg">
                    Nema slika za prikaz.
                </div>
            <?php endif; ?>
        </div>

        <div class="text-center mt-10">
            <a href="index.php?controller=image&action=upload"
               class="inline-block bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition duration-200">
               <i class="fas fa-upload mr-2"></i> Dodaj novu sliku
            </a>
        </div>
    </div>

</body>
</html>
