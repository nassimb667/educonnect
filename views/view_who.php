<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choix de la version</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-8">Bienvenue sur notre plateforme</h1>
        <p class="text-lg mb-4">Veuillez choisir la version de la plateforme à laquelle vous souhaitez accéder :</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <a href="../controllers/controller_login_educ.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg text-center">Version Éducateur/e</a>
            <a href="../controllers/controller_signin.php" class="bg-green-500 hover:bg-green-700 text-white font-bold py-4 px-8 rounded-lg text-center">Version Famille</a>
        </div>

        <p class="mt-8 text-sm text-gray-600">Note : La version éducateur est destinée aux éducateur et aux institutions éducatives pour la gestion des événements , tandis que la version famille est destinée à un usage domestique pour les familles avec des fonctionnalités adaptées.</p>
    </div>
</body>
</html>
