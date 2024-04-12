<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Votre Enfant</title>
</head>

<body>
    <form action="../controllers/controller_child.php" method="POST" enctype="multipart/form-data" class="max-w-lg mx-auto p-6 bg-white rounded-md shadow-md">
        <div>
            <label for="nom_enfant" class="block text-sm font-medium text-gray-700">Nom de l'enfant</label>
            <input type="text" id="nom_enfant" name="nom_enfant" class="mt-1 p-2 border border-gray-300 block w-full rounded-md" required>
        </div>
        <div>
            <label for="prenom_enfant" class="block text-sm font-medium text-gray-700">Prénom de l'enfant</label>
            <input type="text" id="prenom_enfant" name="prenom_enfant" class="mt-1 p-2 border border-gray-300 block w-full rounded-md" required>
        </div>
        <div>
            <label for="date_naissance_enfant" class="block text-sm font-medium text-gray-700">Date de naissance de l'enfant</label>
            <input type="date" id="date_naissance_enfant" name="date_naissance_enfant" class="mt-1 p-2 border border-gray-300 block w-full rounded-md" required>
        </div>
        <div>
            <label for="photo_enfant" class="block text-sm font-medium text-gray-700">Photo de l'enfant :</label>
            <input type="file" name="photo_enfant" id="photo_enfant" accept="image/*">
        </div>
        <div class="mt-4">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Inscrire l'enfant</button>
            <a href="../controllers/controller_signup.php"
                    class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Retour</a>
        </div>
    </form>
</body>

</html>
