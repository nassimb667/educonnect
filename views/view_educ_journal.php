<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journal éducatif</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-8">Journal éducatif</h1>

        <!-- Formulaire pour ajouter une entrée au journal -->
        <div class="mb-8">
            <h2 class="text-xl font-bold mb-4">Ajouter une entrée au journal</h2>
            <form action="controller_educ_journal.php" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto">
                <select id="user" name="user"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <?php foreach ($users as $user): ?>
                        <option value="<?= $user['id'] ?>"><?= $user['prenom'] . ' ' . $user['nom'] ?></option>
                    <?php endforeach; ?>
                </select>

                <div class="mb-4">
                    <label for="date" class="block text-gray-700 font-bold mb-2">Date :</label>
                    <input type="date" id="date" name="date"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="contenu" class="block text-gray-700 font-bold mb-2">Contenu :</label>
                    <textarea id="contenu" name="contenu"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                </div>
                <!-- Champ pour l'image -->
                <div class="mb-4">
                    <label for="image" class="block text-gray-700 font-bold mb-2">Image :</label>
                    <input type="file" id="image" name="image"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" name="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
