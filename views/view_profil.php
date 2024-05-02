<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <?php include "header.php" ?>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8 text-center text-gray-800">Profil de l'utilisateur</h1>

        <div class="bg-white shadow-md rounded-lg p-6 mb-8">
            <h2 class="text-xl font-semibold mb-4 text-gray-800">Informations personnelles</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p><span class="font-semibold">Nom:</span> <?= $user['nom'] ?></p>
                    <p><span class="font-semibold">Prénom:</span> <?= $user['prenom'] ?></p>
                    <p><span class="font-semibold">Email:</span> <?= $user['email'] ?></p>
                    <p><span class="font-semibold">Téléphone:</span> <?= $user['phone'] ?></p>
                </div>
                <div class="flex items-center justify-center">
                    <button id="modifierBtn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Modifier</button>
                </div>
            </div>
            
            <form id="formModification" action="../controllers/controller_profil.php" method="POST" class="hidden mt-4" enctype="multipart/form-data">
                <label for="nom">Modifier le nom:</label><br>
                <input type="text" id="nom" name="nom" value="<?= $user['nom'] ?>" class="border border-gray-300 rounded-md p-2 mt-1 mb-2 w-full"><br>
                <label for="email">Modifier l'email:</label><br>
                <input type="email" id="email" name="email" value="<?= $user['email'] ?>" class="border border-gray-300 rounded-md p-2 mt-1 mb-2 w-full"><br>
                <label for="phone">Modifier le téléphone:</label><br>
                <input type="tel" id="phone" name="phone" value="<?= $user['phone'] ?>" class="border border-gray-300 rounded-md p-2 mt-1 mb-2 w-full"><br>
                <label for="photoEnfant">Modifier la photo de l'enfant:</label><br>
                <input type="file" id="photoEnfant" name="new_photo" class="border border-gray-300 rounded-md p-2 mt-1 mb-2 w-full"><br>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Enregistrer</button>
            </form>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6 mb-8">
            <h2 class="text-xl font-semibold mb-4 text-gray-800">Informations sur l'enfant</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p><span class="font-semibold">Nom:</span> <?= $user['nomEnfant'] ?></p>
                    <p><span class="font-semibold">Prénom:</span> <?= $user['prenomEnfant'] ?></p>
                    <p><span class="font-semibold">Date de naissance:</span> <?= $dateNaissanceEnfant ?></p>
                    <p class="text-sm text-gray-500 mt-2">* Veuillez ne modifier vos informations que si nécessaire et en informer le centre pour fournir des documents si nécessaire.</p>
                </div>
                <div class="flex items-center justify-center">
                    <?php if (isset($user['photoEnfant'])) : ?>
                        <img src="<?= $user['photoEnfant'] ?>" alt="Photo de l'enfant" class="h-24 w-24 rounded-full">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Sélectionner les éléments
        const modifierBtn = document.getElementById('modifierBtn');
        const formModification = document.getElementById('formModification');

        // Ajouter un gestionnaire d'événements au clic sur le bouton de modification
        modifierBtn.addEventListener('click', () => {
            // Basculer la visibilité du formulaire de modification
            formModification.classList.toggle('hidden');
        });
    </script>
</body>

</html>
