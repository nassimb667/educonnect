<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Journal</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-8">Modifier Journal</h1>

        <!-- Liste des articles du journal -->
        <ul>
            <?php foreach ($journals as $journal): ?>
                <li class="mb-4 border-b pb-4">
                    <h2 class="text-xl font-bold"><?= $journal['date'] ?></h2>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="journal_id" value="<?= $journal['idJournal'] ?>">
                        <textarea name="contenu" class="mt-2 w-full"><?= $journal['contenu'] ?></textarea>
                        <input type="file" name="image" class="mt-2">
                        <button type="submit" name="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2">Valider les modifications</button>
                    </form>
                    <!-- Afficher l'image -->
                    <?php if (!empty($journal['image'])): ?>
                        <img src="../assets/img/journal/<?= $journal['image'] ?>" alt="Image du journal" class="mt-2 w-64">
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>

</html>
