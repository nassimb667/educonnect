<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <?php include "header_educ.php"; ?>

    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-4">Messages</h1>

        <!-- Affichage des messages -->
        <div class="flex flex-col gap-4">
            <?php if (empty($messages)): ?>
                <p class="text-gray-600">Aucun message à afficher pour le moment.</p>
            <?php else: ?>
                <?php foreach ($messages as $message): ?>
                    <div class="<?= ($message['idExpediteur'] === $userId) ? 'text-right' : 'text-left' ?>">
                        <div
                            class="<?= ($message['idExpediteur'] === $userId) ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700' ?> p-4 rounded-lg max-w-xs">
                            <?php echo $nom; ?>         <?php echo $prenom; ?>
                            <p><?= $message['contenu'] ?></p>
                            <p class="text-xs text-gray-300"><?= $message['dateEnvoi'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- Formulaire d'envoi de messages -->
        <div class="mt-8 flex">
            <textarea id="message" name="message" class="flex-grow p-2 rounded-lg border border-gray-300 mr-2"
                placeholder="Votre message"></textarea>
            <button id="sendMessageBtn" class="bg-green-500 text-white py-2 px-4 rounded-lg">Envoyer</button>
        </div>
    </div>

    <?php include "footer.php"; ?>

    <script>
        // Récupérer le bouton d'envoi et le champ de saisie
        const sendMessageBtn = document.getElementById('sendMessageBtn');
        const messageInput = document.getElementById('message');

       
        sendMessageBtn.addEventListener('click', () => {
            // Récupérer le contenu du message
            const messageContent = messageInput.value;

            messageInput.value = '';
        });
    </script>
</body>

</html>