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
        <h1 class="text-3xl font-bold mb-8">Créer un nouvel article</h1>
        <form action="controller_educ_event.php" method="POST" class="max-w-md mx-auto">
            <div class="mb-4">
                <label for="titre" class="block text-gray-700 font-bold mb-2">Titre :</label>
                <input type="text" id="titre" name="titre" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">Description :</label>
                <textarea id="description" name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            </div>
            <div class="mb-4">
                <label for="dateDebut" class="block text-gray-700 font-bold mb-2">Date de début :</label>
                <input type="datetime-local" id="dateDebut" name="dateDebut" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="dateFin" class="block text-gray-700 font-bold mb-2">Date de fin :</label>
                <input type="datetime-local" id="dateFin" name="dateFin" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" name="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Créer</button>
                <a href="controller_educ_home.php" class="text-blue-500 hover:text-blue-700 font-bold py-2 px-4">Retour</a>
            </div>
            </div>
        </form>
    </div>
</body>

</html>
