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
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-4">Profil de l'utilisateur</h1>
        <div class="bg-white shadow-md p-4 rounded-lg">
            <!-- Informations personnelles -->
            <div>
                <h2 class="text-xl font-semibold mb-4">Informations personnelles</h2>
                <p><span class="font-semibold">Nom:</span> <?= $user['nom'] ?></p>
                <p><span class="font-semibold">Prénom:</span> <?= $user['prenom'] ?></p>
                <p><span class="font-semibold">Email:</span> <?= $user['email'] ?></p>
                <p><span class="font-semibold">Téléphone:</span> <?= $user['phone'] ?></p>
                <!-- Bouton de modification -->
                <button id="modifierBtn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Modifier</button>
            </div>
            <!-- Formulaire de modification caché par défaut -->
            <form id="formModification" action="../controllers/controller_profil.php" method="POST" class="hidden mt-4" enctype="multipart/form-data">
                <label for="nom">Modifier le nom:</label><br>
                <input type="text" id="nom" name="nom" value="<?= $user['nom'] ?>"><br>
                <label for="email">Modifier l'email:</label><br>
                <input type="email" id="email" name="email" value="<?= $user['email'] ?>"><br>
                <label for="phone">Modifier le téléphone:</label><br>
                <input type="tel" id="phone" name="phone" value="<?= $user['phone'] ?>"><br>
                <label for="photoEnfant">Modifier la photo de l'enfant:</label><br>
                <input type="file" id="photoEnfant" name="new_photo"><br><br>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Enregistrer</button>
            </form>
        </div>
        <!-- Informations sur l'enfant -->
        <div class="bg-white shadow-md p-4 rounded-lg mt-8 flex items-center justify-between">
            <div>
                <h2 class="text-xl font-semibold mb-4">Informations sur l'enfant</h2>
                <p><span class="font-semibold">Nom:</span> <?= $user['nomEnfant'] ?></p>
                <p><span class="font-semibold">Prénom:</span> <?= $user['prenomEnfant'] ?></p>
                <p><span class="font-semibold">Date de naissance:</span> <?= $dateNaissanceEnfant ?></p>
                <p class="text-sm text-gray-500 mt-2">* Veuillez ne modifier vos informations que si nécessaire et en informer le centre pour fournir des documents si nécessaire.</p>
            </div>
            <!-- Photo de l'enfant -->
            <div>
                <?php if (isset($user['photoEnfant'])) : ?>
                    <img src="<?= $user['photoEnfant'] ?>" alt="Photo de l'enfant" class="h-24 w-24 rounded-full">
                <?php endif; ?>
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