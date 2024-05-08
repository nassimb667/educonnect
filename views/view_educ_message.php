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


        <div class="flex flex-col gap-4">
            <?php if (empty($messages)): ?>
                <p class="text-gray-600">Aucun message à afficher pour le moment.</p>
            <?php else: ?>
                <?php foreach ($messages as $index => $message): ?>
                    <div class="<?= ($message['idExpediteur'] === $userId) ? 'text-right' : 'text-left' ?>">
                        <div
                            class="<?= ($message['idExpediteur'] === $userId) ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700' ?> p-4 rounded-lg max-w-xs">
                            <?= $message['nom']; ?>         <?= $message['prenom']; ?>
                            <p><?= $message['contenu'] ?></p>
                            <p class="text-xs text-gray-300"><?= $message['dateEnvoi'] ?></p>
                            <button class="bg-gray-300 text-gray-700 py-1 px-2 rounded-lg mt-2 reply-btn"
                                data-index="<?= $index ?>">Répondre</button>
                            <form action="../controllers/controller_educ_message.php" method="post" class="hidden reply-form"
                                id="reply-form-<?= $index ?>">
                                <input type="hidden" name="messageId" value="<?= $message['idMessage'] ?>">
                                <textarea name="message" class="p-2 rounded-lg border border-gray-300 mr-2"
                                    placeholder="Votre réponse"></textarea>
                                <button type="submit" name="submit"
                                    class="bg-green-500 text-white py-2 px-4 rounded-lg">Envoyer</button>
                            </form>
                            <?php if (!empty($message['responses'])): ?>
                                <?php foreach ($message['responses'] as $response): ?>
                                    <div class="bg-gray-100 p-2 mt-2 rounded-lg">
                                        <p><?= $response['reponse'] ?></p>
                                        <p class="text-xs text-gray-300"><?= $response['date_reponse'] ?></p>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>



            <?php endif; ?>
        </div>

    </div>

    <?php include "footer.php"; ?>

    <script>
        const replyButtons = document.querySelectorAll('.reply-btn');
        const replyForms = document.querySelectorAll('.reply-form');

        replyButtons.forEach(button => {
            button.addEventListener('click', (event) => {
                const index = event.target.dataset.index;
                const form = document.getElementById(`reply-form-${index}`);

                replyForms.forEach(form => {
                    form.classList.add('hidden');
                });

                form.classList.remove('hidden');
            });
        });

    </script>
</body>

</html>