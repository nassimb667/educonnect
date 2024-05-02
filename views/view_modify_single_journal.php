<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Article de Journal</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-8">Modifier Article de Journal</h1>

        <!-- Formulaire de modification de l'article de journal -->
        <form action="../controllers/controller_modify_single_journal.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="journal_id" value="<?= $journal['idJournal'] ?>">
            <div class="mb-4">
                <label for="contenu" class="block text-gray-700 font-bold mb-2">Contenu :</label>
                <textarea id="contenu" name="contenu" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="5"><?= $journal['contenu'] ?></textarea>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-bold mb-2">Image :</label>
                <input type="file" id="image" name="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <button type="submit" name="modify" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Modifier</button>
        </form>
    </div>
</body>

</html>
