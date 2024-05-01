<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'événement</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="../assets/style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="bg-gray-100">

    <?php include "header.php"; ?>

    <div class="container mx-auto my-8 px-4">
        <h1 class="text-3xl mb-6 text-center">Détails de l'événement</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-md shadow-md">
                <h2 class="text-xl font-semibold mb-2"><?php echo $eventDetails['titre']; ?></h2>
                <p class="text-gray-600 mb-4"><?php echo $eventDetails['description']; ?></p>
                <p class="text-gray-500">Date de début : <?php echo $eventDetails['dateDebut']; ?></p>
                <p class="text-gray-500">Date de fin : <?php echo $eventDetails['dateFin']; ?></p>
            </div>
            <div class="bg-white p-6 rounded-md shadow-md">
                <!-- Afficher l'image de l'événement -->
                <img src="../assets/img/<?php echo $eventDetails['image']; ?>" alt="Image de l'événement" class="w-full h-auto rounded-md">
            </div>
        </div>
        <a href="../controllers/controller_home.php" class="block w-full md:w-auto bg-gray-500 text-white px-4 py-2 rounded-md mt-6 text-center">Retour</a>
    </div>

    <?php include "footer.php"; ?>

</body>

</html>
