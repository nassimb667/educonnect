<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emploi du Temps</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-4">Emploi du Temps</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Groupe 1 -->
            <?php if ($user_group === '1'): ?>
                <div class="bg-white shadow-md p-4 rounded-lg">
                    <h2 class="text-xl font-semibold mb-4">Groupe 1</h2>
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="border-b-2 border-gray-300 py-2">Jour de la semaine</th>
                                <th class="border-b-2 border-gray-300 py-2">Heure de début</th>
                                <th class="border-b-2 border-gray-300 py-2">Heure de fin</th>
                                <th class="border-b-2 border-gray-300 py-2">Matière</th>
                                <th class="border-b-2 border-gray-300 py-2">Salle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($emploi_du_temps as $activite): ?>
                                <tr>
                                    <td class="border-b border-gray-300 py-2"><?= $activite['jour_semaine'] ?></td>
                                    <td class="border-b border-gray-300 py-2"><?= $activite['heure_debut'] ?></td>
                                    <td class="border-b border-gray-300 py-2"><?= $activite['heure_fin'] ?></td>
                                    <td class="border-b border-gray-300 py-2"><?= $activite['matiere'] ?></td>
                                    <td class="border-b border-gray-300 py-2"><?= $activite['salle'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="bg-white shadow-md p-4 rounded-lg">
                    <h2 class="text-xl font-semibold mb-4">Groupe 1</h2>
                    <p class="text-red-500">Cela n'est pas votre groupe.</p>
                </div>
            <?php endif; ?>

            <!-- Groupe 2 -->
            <!-- Groupe 2 -->
            <?php if ($user_group === '2'): ?>
                <div class="bg-white shadow-md p-4 rounded-lg">
                    <h2 class="text-xl font-semibold mb-4">Groupe 2</h2>
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="border-b-2 border-gray-300 py-2">Jour de la semaine</th>
                                <th class="border-b-2 border-gray-300 py-2">Heure de début</th>
                                <th class="border-b-2 border-gray-300 py-2">Heure de fin</th>
                                <th class="border-b-2 border-gray-300 py-2">Matière</th>
                                <th class="border-b-2 border-gray-300 py-2">Salle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($emploi_du_temps as $activite): ?>
                                
                                <?php if ($activite['groupe'] === '2'): ?>
                                    <tr>
                                        <td class="border-b border-gray-300 py-2"><?= $activite['jour_semaine'] ?></td>
                                        <td class="border-b border-gray-300 py-2"><?= $activite['heure_debut'] ?></td>
                                        <td class="border-b border-gray-300 py-2"><?= $activite['heure_fin'] ?></td>
                                        <td class="border-b border-gray-300 py-2"><?= $activite['matiere'] ?></td>
                                        <td class="border-b border-gray-300 py-2"><?= $activite['salle'] ?></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="bg-white shadow-md p-4 rounded-lg">
                    <h2 class="text-xl font-semibold mb-4">Groupe 2</h2>
                    <p class="text-red-500">Cela n'est pas votre groupe.</p>
                </div>
            <?php endif; ?>

            <!-- Groupe 3 -->
            <?php if ($user_group === '3'): ?>
                <div class="bg-white shadow-md p-4 rounded-lg">
                    <h2 class="text-xl font-semibold mb-4">Groupe 3</h2>
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="border-b-2 border-gray-300 py-2">Jour de la semaine</th>
                                <th class="border-b-2 border-gray-300 py-2">Heure de début</th>
                                <th class="border-b-2 border-gray-300 py-2">Heure de fin</th>
                                <th class="border-b-2 border-gray-300 py-2">Matière</th>
                                <th class="border-b-2 border-gray-300 py-2">Salle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($emploi_du_temps as $activite): ?>
                                
                                <?php if ($activite['groupe'] === '3'): ?>
                                    <tr>
                                        <td class="border-b border-gray-300 py-2"><?= $activite['jour_semaine'] ?></td>
                                        <td class="border-b border-gray-300 py-2"><?= $activite['heure_debut'] ?></td>
                                        <td class="border-b border-gray-300 py-2"><?= $activite['heure_fin'] ?></td>
                                        <td class="border-b border-gray-300 py-2"><?= $activite['matiere'] ?></td>
                                        <td class="border-b border-gray-300 py-2"><?= $activite['salle'] ?></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="bg-white shadow-md p-4 rounded-lg">
                    <h2 class="text-xl font-semibold mb-4">Groupe 3</h2>
                    <p class="text-red-500">Cela n'est pas votre groupe.</p>
                </div>
            <?php endif; ?>


        </div>
        <a href="../controllers/controller_home.php"
            class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600 mt-4 inline-block">Retour</a>
    </div>
</body>

</html>