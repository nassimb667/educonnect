<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Événements</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <?php include "header.php"; ?>

    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-4">Événements</h1>
        
        <!-- Événements actuels -->
        <h2 class="text-xl font-semibold mb-2">Événements actuels</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($currentEvents as $event): ?>
                <div class="bg-white shadow-md p-4 rounded-lg">
                    <h3 class="text-lg font-semibold mb-2"><?= $event['titre'] ?></h3>
                    <p class="text-gray-600 mb-4"><?= $event['description'] ?></p>
                    <p class="text-gray-500">Date de début : <?= $event['dateDebut'] ?></p>
                    <p class="text-gray-500">Date de fin : <?= $event['dateFin'] ?></p>
                    <!-- Ajoutez ici d'autres détails de l'événement si nécessaire -->
                </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Événements à venir -->
        <h2 class="text-xl font-semibold mt-8 mb-2">Événements à venir</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($upcomingEvents as $event): ?>
                <div class="bg-white shadow-md p-4 rounded-lg">
                    <h3 class="text-lg font-semibold mb-2"><?= $event['titre'] ?></h3>
                    <p class="text-gray-600 mb-4"><?= $event['description'] ?></p>
                    <p class="text-gray-500">Date de début : <?= $event['dateDebut'] ?></p>
                    <p class="text-gray-500">Date de fin : <?= $event['dateFin'] ?></p>
                    <!-- Ajoutez ici d'autres détails de l'événement si nécessaire -->
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php include "footer.php"; ?>
</body>
</html>
