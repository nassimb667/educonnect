<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="../assets/style/style.css">
    <title>Accueil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="bg-gray-100">

    <?php include "header.php"; ?>

    <div class="container mx-auto my-8 p-8 bg-white rounded-md shadow-md">
        <h1 class="text-3xl mb-6">Bienvenue sur la page d'accueil, <?php echo $nom; ?> <?php echo $prenom; ?>!</h1>
        <h2 class="text-2xl mb-4">Nos Derniers Événements:</h2>
        <!-- Afficher les 5 derniers événements -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($latestEvents as $event): ?>
                <div class="bg-gray-200 p-4 rounded-md">
                    <h2 class="text-lg font-semibold mb-2"><?php echo $event['titre']; ?></h2>
                    <p class="text-sm text-gray-600"><?php echo $event['description']; ?></p>
                    <p class="text-sm text-gray-500">Date de début : <?php echo $event['dateDebut_fr']; ?></p>
                    <p class="text-sm text-gray-500">Date de fin : <?php echo $event['dateFin_fr']; ?></p>
                    <!-- Ajouter l'image ici -->
                    <img src="../assets/img/<?php echo $event['image']; ?>" alt="Image de l'événement"
                        class="w-full max-w-xs h-auto mt-2 rounded-md">
                    <!-- Lien "Lire plus" -->
                    <a href="../controllers/controller_event2.php?id=<?php echo $event['idEvenement']; ?>" class="text-blue-500 block mt-2">Lire plus</a>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php include "footer.php"; ?>

</body>

</html>
