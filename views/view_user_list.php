<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-4">Liste des utilisateurs</h1>

        <?php if (empty($usersByGroup)): ?>
            <p>Aucun utilisateur trouvé.</p>
        <?php else: ?>
            <?php foreach ($usersByGroup as $group => $users): ?>
                <div class="mb-8">
                    <h2 class="text-xl font-semibold mb-2">Groupe <?= $group ?></h2>
                    <ul>
                        <?php foreach ($users as $user): ?>
                            <li><?= $user ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>

</html>
