<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Événement créé avec succès</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-8">inscription executer succès</h1>
        <p class="text-gray-700">Vous allez être redirigé vers la page de connexion dans 3 secondes...</p>
    </div>
    <script>
        setTimeout(function() {
            window.location.href = '../controllers/controller_signin.php';
        }, 3000);
    </script>
</body>

</html>