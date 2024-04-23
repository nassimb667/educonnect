<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journaux</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <?php include "header.php"; ?>

    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-4">Journaux</h1>
        
        <!-- Affichage des journaux -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php if (empty($journals)): ?>
                <p class="text-gray-600">Aucun journal à afficher pour le moment.</p>
            <?php else: ?>
                <?php foreach ($journals as $journal): ?>
                    <div class="bg-white shadow-md p-4 rounded-lg">
                        <h2 class="text-xl font-semibold mb-2"><?= $journal['date'] ?></h2>
                        <p class="text-gray-600 mb-4"><?= $journal['contenu'] ?></p>
                        <?php if (!empty($journal['image'])): ?>
                            <img src="../assets/img/journal/<?= $journal['image'] ?>" alt="Image du journal" class="w-full rounded-lg">
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <?php include "footer.php"; ?>
</body>
</html>
