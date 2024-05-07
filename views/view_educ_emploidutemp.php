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
                <input type="time" id="heure_debut" name="heure_debut"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="heure_fin" class="block text-gray-700 font-bold mb-2">Heure de fin :</label>
                <input type="time" id="heure_fin" name="heure_fin"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="jour_semaine" class="block text-gray-700 font-bold mb-2">Jour de la semaine :</label>
                <select id="jour_semaine" name="jour_semaine"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="Lundi">Lundi</option>
                    <option value="Mardi">Mardi</option>
                    <option value="Mercredi">Mercredi</option>
                    <option value="Jeudi">Jeudi</option>
                    <option value="Vendredi">Vendredi</option>
                    <option value="Samedi">Samedi</option>
                    <option value="Dimanche">Dimanche</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="matiere" class="block text-gray-700 font-bold mb-2">Nom de l'activité :</label>
                <input type="text" id="matiere" name="matiere"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div>
                <label for="groupe" class="block text-sm font-medium text-gray-700">A quels groupe : ex:1/2/3</label>
                <input type="text" id="groupe" name="groupe"
                    class="mt-1 p-2 border border-gray-300 block w-full rounded-md" required>
            </div>
            <button type="submit" name="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter Activité</button>
        </form>

        <!-- Liste des activités de l'emploi du temps -->
        <div class="mt-8">
            <h2 class="text-xl font-bold mb-4">Activités :</h2>
            <ul>
                <?php foreach ($activites as $activite): ?>
                    <li class="mb-2">
                        <span class="font-bold">GROUPE <?= $activite['groupe'] ?> : <?= $activite['jour_semaine'] ?>
                            <?= $activite['startHour'] . "h" . ($activite['startMin'] == 0 ? '00': $activite['startMin']) ?> -
                            <?= $activite['endHour'] . "h" . ($activite['endMin'] == 0 ? '00': $activite['endMin']) ?> :</span>
                        <?= $activite['matiere'] ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</body>

</html>