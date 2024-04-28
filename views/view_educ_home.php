<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Version éducateur</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <!-- Header -->
    <?php include "header_educ.php"; ?>

    <!-- Contenu -->
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-8">Statistiques et Emploi du Temps</h1>

        <!-- Statistiques et Emploi du Temps -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Statistiques -->
            <div class="bg-white shadow-md rounded-lg">
                <div class="p-4 bg-gray-800 text-white rounded-t-lg">
                    <h2 class="text-xl md:text-2xl font-semibold">Statistiques</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4">
                    <div class="bg-gray-200 rounded-lg p-4">
                        <h3 class="text-lg font-semibold mb-2">Utilisateurs famille</h3>
                        <p class="text-gray-600">Nombre total : <span class="font-bold"><?= $totalUsers ?></span></p>
                    </div>
                    <div class="bg-gray-200 rounded-lg p-4">
                        <h3 class="text-lg font-semibold mb-2">Utilisateurs Actifs</h3>
                        <p class="text-gray-600">Nombre total : <span class="font-bold"><?= $ActiveUser ?></span></p>
                    </div>
                    <div class="bg-gray-200 rounded-lg p-4">
                        <h3 class="text-lg font-semibold mb-2">Evénements</h3>
                        <p class="text-gray-600">Nombre total d'événements : <span
                                class="font-bold"><?= $eventCount ?></span></p>
                    </div>
                    <div class="bg-gray-200 rounded-lg p-4">
                        <h3 class="text-lg font-semibold mb-2">Evénements passés</h3>
                        <p class="text-gray-600">Nombre d'événements passés : <span
                                class="font-bold"><?= $eventCountP ?></span></p>
                    </div>
                    <div class="bg-gray-200 rounded-lg p-4">
                        <h3 class="text-lg font-semibold mb-2">Evénements Actuels</h3>
                        <p class="text-gray-600">Nombre d'événements en cours : <span
                                class="font-bold"><?= $eventCountA ?></span></p>
                    </div>
                    <h1>Liste des groupes et utilisateurs</h1>

                    <?php if ($utilisateurs): ?>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <?php foreach (range(1, 3) as $numGroupe): ?>
                                <div class="bg-white shadow-md rounded-lg p-4">
                                    <h3 class="text-lg font-semibold mb-2">Groupe <?= $numGroupe ?></h3>
                                    <?php
                                    $groupe = [];

                                    // Parcours des utilisateurs pour ce groupe
                                    foreach ($utilisateurs as $utilisateur) {
                                        if ($utilisateur['groupe'] == $numGroupe) {
                                            // Ajout du nom et prénom de l'utilisateur au tableau
                                            $groupe[] = "<li>{$utilisateur['prenomEnfant']} {$utilisateur['nomEnfant']}</li>";
                                        }
                                    }

                                    // Affichage des utilisateurs par groupe
                                    if (!empty($groupe)) {
                                        echo "<ul>" . implode("", $groupe) . "</ul>";
                                    } else {
                                        echo "<p class='text-gray-600'>Aucun utilisateur trouvé dans ce groupe.</p>";
                                    }
                                    ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p class="text-gray-600">Aucun utilisateur trouvé.</p>
                    <?php endif; ?>




                </div>
            </div>

            <!-- Emploi du Temps -->
            <div class="bg-white shadow-md rounded-lg">
                <div class="p-4 bg-gray-800 text-white rounded-t-lg">
                    <h2 class="text-xl md:text-2xl font-semibold">Emploi du Temps</h2>
                </div>
                <div class="p-4">
                    <?php foreach ($emploi_du_temps as $groupe => $activites): ?>
                        <div class="bg-gray-200 rounded-lg p-4 mb-4">
                            <h3 class="text-lg font-semibold mb-2">Groupe <?= $groupe ?></h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <?php foreach ($activites as $activite): ?>
                                    <div class="bg-white shadow-md rounded-lg p-4">
                                        <p class="text-gray-600 mb-2"><span class="font-semibold">Jour:</span>
                                            <?= $activite['jour_semaine'] ?></p>
                                        <p class="text-gray-600 mb-2"><span class="font-semibold">Début:</span>
                                            <?= $activite['heure_debut'] ?></p>
                                        <p class="text-gray-600 mb-2"><span class="font-semibold">Fin:</span>
                                            <?= $activite['heure_fin'] ?></p>
                                        <p class="text-gray-600 mb-2"><span class="font-semibold">Matière:</span>
                                            <?= $activite['matiere'] ?></p>
                                        <p class="text-gray-600 mb-2"><span class="font-semibold">Salle:</span>
                                            <?= $activite['salle'] ?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Le reste de votre code JavaScript pour gérer le menu burger -->
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const menu = document.getElementById('menu');
        const sidebar = document.getElementById('sidebar');

        menuToggle.addEventListener('click', () => {
            menu.classList.toggle('hidden');
            sidebar.classList.toggle('hidden');
        });

        function toggleSidebar() {
            menu.classList.add('hidden');
            sidebar.classList.add('hidden');
        }
    </script>
</body>

</html>