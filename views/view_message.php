<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <?php include "header.php"; ?>

    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-4">Messages</h1>

        <div class="flex flex-col gap-4">
            <?php if (empty($messages)): ?>
                <p class="text-gray-600">Aucun message à afficher pour le moment.</p>
            <?php else: ?>
                <?php foreach ($messages as $index => $message): ?>
                    <div class="<?= ($message['idExpediteur'] === $user_id) ? 'text-right' : 'text-left' ?>">
                        <div
                            class="<?= ($message['idExpediteur'] === $user_id) ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700' ?> p-4 rounded-lg max-w-xs">
                            <p><?= htmlspecialchars($message['contenu']) ?></p>
                            <p class="text-xs text-gray-300"><?= htmlspecialchars($message['dateEnvoi']) ?></p>
                            <!-- Ajout du bouton de suppression -->
                            <?php if ($message['idExpediteur'] === $user_id): ?>
                                <form action="../controllers/controller_message.php" method="post">
                                    <input type="hidden" name="delete" value="<?= $message['idMessage'] ?>">
                                    <button type="submit" class="text-xs text-gray-500 hover:text-red-500 mt-2">Supprimer</button>
                                </form>
                            <?php endif; ?>

                            <!-- Affichage des réponses -->
                            <?php $responses = Message::getResponse($message['idMessage']); ?>
                            <?php if (!empty($responses)): ?>
                                <div class="mt-4">
                                    <h2 class="text-sm font-bold mb-2">Réponses :</h2>
                                    <?php foreach ($responses as $response): ?>
                                        <div class="bg-gray-100 p-2 mb-2 rounded-lg">
                                            <p class="text-black"><?= htmlspecialchars($response['reponse']) ?></p>
                                            <p class="text-xs text-gray-300"><?= htmlspecialchars($response['date_reponse']) ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <!-- Input de réponse -->
                            <button class="bg-gray-300 text-gray-700 py-1 px-2 rounded-lg mt-2 reply-btn"
                                data-index="<?= $index ?>">Répondre</button>
                            <form action="../controllers/controller_message.php" method="post" class="hidden reply-form"
                                id="reply-form-<?= $index ?>">
                                <input type="hidden" name="messageId" value="<?= $message['idMessage'] ?>">
                                <textarea name="message" class="p-2 rounded-lg border border-gray-300 mr-2"
                                    placeholder="Votre réponse"></textarea>
                                <button type="submit" name="response"
                                    class="bg-green-500 text-white py-2 px-4 rounded-lg">Envoyer</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <form action="../controllers/controller_message.php" method="post" class="mt-8 flex">
            <input type="hidden" name="destinataire_id" >
            <textarea id="messageInput" name="message" class="flex-grow p-2 rounded-lg border border-gray-300 mr-2"
                placeholder="Votre message"></textarea>
            <button type="submit" name="submit" class="bg-green-500 text-white py-2 px-4 rounded-lg">Démarrer la conversation</button>
        </form>
    </div>

    <?php include "footer.php"; ?>

    <script>
        const replyButtons = document.querySelectorAll('.reply-btn');
        const replyForms = document.querySelectorAll('.reply-form');

        replyButtons.forEach(button => {
            button.addEventListener('click', (event) => {
                const index = event.target.dataset.index;
                const form = document.getElementById(`reply-form-${index}`);

                replyForms.forEach(f => {
                    f.classList.add('hidden');
                });

                form.classList.toggle('hidden');
            });
        });
    </script>
</body>

</html>
