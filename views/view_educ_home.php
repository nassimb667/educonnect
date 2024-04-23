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
    <header class="bg-gray-800 text-white py-4">
        <div class="container mx-auto flex justify-between items-center px-4">
            <h1 class="text-2xl font-bold">Dashboard Éducatif</h1>
            <div class="flex items-center">
                <span class="mr-4"><?= $prenom ?> <?= $nom ?></span>
                <a href="#" class="text-white hover:underline">Déconnexion</a>
            </div>
        </div>
    </header>

    <!-- Contenu et barre latérale -->
    <div class="container mx-auto flex">
        <!-- Sidebar (Menu burger sur les petits écrans) -->
        <div id="sidebar" class="bg-gray-800 text-white h-screen w-64 fixed top-0 left-0 overflow-y-auto z-50 hidden md:block">
            <div class="p-4">
                <h2 class="text-2xl font-bold">Menu</h2>
                <ul class="mt-4">
                    <li class="mb-2">
                        <a href="#" class="block py-2 px-4 rounded-lg hover:bg-gray-700" onclick="toggleSidebar()">Tableau de bord</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="block py-2 px-4 rounded-lg hover:bg-gray-700" onclick="toggleSidebar()">Gestion des élèves</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="block py-2 px-4 rounded-lg hover:bg-gray-700" onclick="toggleSidebar()">Gestion des cours</a>
                    </li>
                    <!-- Ajoutez d'autres liens de navigation ici -->
                </ul>
            </div>
        </div>

        <!-- Menu burger -->
        <div class="md:hidden">
            <!-- Bouton du menu burger -->
            <button id="menu-toggle" class="block text-gray-500 hover:text-white focus:outline-none focus:text-white">
                <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path v-if="open" fill-rule="evenodd" clip-rule="evenodd" d="M4 6h16v2H4V6zm16 5H4v2h16v-2zm0 5H4v2h16v-2z" />
                    <path v-else fill-rule="evenodd" clip-rule="evenodd" d="M4 6h16v2H4V6zm0 5h16v2H4v-2zm0 5h16v2H4v-2z" />
                </svg>
            </button>
            <!-- Contenu du menu burger -->
            <div id="menu" class="fixed top-0 left-0 bg-gray-800 text-white w-64 h-full overflow-y-auto z-50 hidden">
                <div class="p-4">
                    <h2 class="text-2xl font-bold">Menu</h2>
                    <ul class="mt-4">
                        <li class="mb-2">
                            <a href="#" class="block py-2 px-4 rounded-lg hover:bg-gray-700" onclick="toggleSidebar()">Tableau de bord</a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="block py-2 px-4 rounded-lg hover:bg-gray-700" onclick="toggleSidebar()">Gestion des élèves</a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="block py-2 px-4 rounded-lg hover:bg-gray-700" onclick="toggleSidebar()">Gestion des cours</a>
                        </li>
                        <!-- Ajoutez d'autres liens de navigation ici -->
                    </ul>
                </div>
            </div>
        </div>

        <!-- Contenu -->
        <div class="flex-1 ml-0 md:ml-64 p-8">
            <h1 class="text-3xl font-bold mb-4">Tableau de bord - Version éducative</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Statistiques -->
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-xl md:text-2xl font-semibold mb-4">Statistiques</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-gray-200 rounded-lg p-4">
                            <h3 class="text-lg font-semibold mb-2">Utilisateurs famille</h3>
                            <p class="text-gray-600">Nombre total : <span class="font-bold"><?= $totalUsers ?></span></p>
                        </div>
                        <div class="bg-gray-200 rounded-lg p-4">
                            <h3 class="text-lg font-semibold mb-2">Utilisateurs Actifs</h3>
                            <p class="text-gray-600">Nombre total : <span class="font-bold"><?= $ActiveUser ?></span></p>
                        </div>
                    </div>
                </div>

                <!-- Emploi du Temps -->
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-xl md:text-2xl font-semibold mb-4">Emploi du Temps</h2>
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
