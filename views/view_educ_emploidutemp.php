<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emploi du Temps</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <?php include "header_educ.php"; ?>
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-8">Emploi du Temps</h1>

        <!-- Formulaire pour ajouter une nouvelle activité -->
        <form action="" method="POST">
            <div class="mb-4">
                <label for="heure_debut" class="block text-gray-700 font-bold mb-2">Heure de début :</label>
                <input type="time" id="heure_debut" name="heure_debut" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="heure_fin" class="block text-gray-700 font-bold mb-2">Heure de fin :</label>
                <input type="time" id="heure_fin" name="heure_fin" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="nom_activite" class="block text-gray-700 font-bold mb-2">Nom de l'activité :</label>
                <input type="text" id="nom_activite" name="nom_activite" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <button type="submit" name="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter Activité</button>
        </form>

        <!-- Liste des activités de l'emploi du temps -->
        <div class="mt-8">
            <h2 class="text-xl font-bold mb-4">Activités :</h2>
            <ul>
            <?php foreach ($activites as $activite): ?>
                    <li class="mb-2">
                        <span class="font-bold">groupe:<?= $activite['groupe'] ?> <?= $activite['jour_semaine'] ?> - <?= $activite['heure_debut'] ?> - <?= $activite['heure_fin'] ?>:</span>
                        <?= $activite['matiere'] ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</body>

</html>
