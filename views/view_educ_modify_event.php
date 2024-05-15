<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Événement</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <?php include "header_educ.php"; ?>

    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-8">Modifier Événement</h1>

        <!-- Liste des événements actuels -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php if (empty($currentEvents)) : ?>
                <p class="text-gray-500">Aucun événement actuel pour le moment.</p>
            <?php else : ?>
                <?php foreach ($currentEvents as $event) : ?>
                    <div class="bg-white shadow-md p-4 rounded-lg">
                        <h3 id="title_<?= isset($event['idEvenement']) ? htmlspecialchars($event['idEvenement']) : '' ?>" class="text-lg font-semibold mb-2">
                            <?= isset($event['titre']) ? htmlspecialchars($event['titre']) : '' ?>
                        </h3>
                        <p id="description_<?= isset($event['idEvenement']) ? htmlspecialchars($event['idEvenement']) : '' ?>" class="text-gray-600 mb-4">
                            <?= isset($event['description']) ? htmlspecialchars($event['description']) : '' ?>
                        </p>
                        <p id="dateStart_<?= isset($event['idEvenement']) ? htmlspecialchars($event['idEvenement']) : '' ?>" data-start="<?= isset($event['dateDebut']) ? htmlspecialchars($event['dateDebut']) : '' ?>" class="text-gray-500">Date de début :
                            <?= isset($event['dateDebut']) ? htmlspecialchars($event['dateDebut']) : '' ?>
                        </p>
                        <p id="dateEnd_<?= isset($event['idEvenement']) ? htmlspecialchars($event['idEvenement']) : '' ?>" data-end="<?= isset($event['dateFin']) ? htmlspecialchars($event['dateFin']) : '' ?>" id="description_<?= isset($event['idEvenement']) ? htmlspecialchars($event['idEvenement']) : '' ?>" class="text-gray-500">Date de fin :
                            <?= isset($event['dateFin']) ? htmlspecialchars($event['dateFin']) : '' ?>
                        </p>
                        <a href="#" onclick="showModifyForm('<?= isset($event['idEvenement']) ? htmlspecialchars($event['idEvenement']) : '' ?>'); return false;" class="text-blue-500 hover:text-blue-700 font-semibold block mt-2">Modifier</a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- Formulaire de modification d'événement -->
        
        <div class="flex justify-center items-center mt-8">
            <form action="controller_educ_modify_event.php" method="POST" id="modifyEventForm" enctype="multipart/form-data" class="w-full md:w-1/2 p-6 bg-white rounded-lg hidden">
                <input type="hidden" name="eventId" id="eventId">
                <label for="newTitle" class="block">Nouveau titre :</label>
                <input type="text" name="newTitle" id="newTitle" class="w-full rounded-lg border border-gray-300 p-2 mb-4">
                <label for="newDescription" class="block">Nouvelle description :</label>
                <textarea name="newDescription" id="newDescription" class="w-full rounded-lg border border-gray-300 p-2 mb-4"></textarea>
                <label for="newStartDate" class="block">Nouvelle date de début :</label>
                <input type="datetime-local" name="newStartDate" id="newStartDate" class="w-full rounded-lg border border-gray-300 p-2 mb-4">
                <label for="newEndDate" class="block">Nouvelle date de fin :</label>
                <input type="datetime-local" name="newEndDate" id="newEndDate" class="w-full rounded-lg border border-gray-300 p-2 mb-4">
                <label for="newImage" class="block">Nouvelle image :</label>
                <input type="file" name="newImage" id="newImage" class="w-full rounded-lg border border-gray-300 p-2 mb-4">
                <button type="submit" name="update" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">Enregistrer 
                modifications</button>
            </form>
        </div>
    </div>

    <!-- Script JavaScript pour afficher le formulaire de modification -->
    <script>
        function showModifyForm(eventId) {

            document.getElementById('eventId').value = eventId;

            var title = document.getElementById('title_' + eventId).innerText;
            var description = document.getElementById('description_' + eventId).innerText;
            // récupérer les détails de l'événement à l'aide de l'identifiant de l'événement et des datasets
            var dateStart = document.getElementById('dateStart_' + eventId).dataset.start;
            var dateEnd = document.getElementById('dateEnd_' + eventId).dataset.end;

            document.getElementById('newTitle').value = title;
            document.getElementById('newDescription').value = description;
            document.getElementById('newStartDate').value = dateStart;
            document.getElementById('newEndDate').value = dateEnd;

            // on fait apparaitre le formulaire de modification
            document.getElementById('modifyEventForm').classList.remove('hidden');
        }
    </script>
</body>

</html>