<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="max-w-md mx-auto py-12 px-6">
        <h2 class="text-3xl font-bold text-center mb-8">Inscription</h2>
        <?php if (!empty($errors)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Erreur!</strong>
                <span class="block sm:inline">
                    <?php foreach ($errors as $error): ?>
                        <?php echo $error ?><br>
                    <?php endforeach ?>
                </span>
            </div>
        <?php endif ?>
        <form method="POST" class="space-y-6" enctype="multipart/form-data" novalidate>
            <div>
                <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                <input type="text" id="nom" name="nom" autocomplete="off"
                    class="mt-1 p-2 border border-gray-300 block w-full rounded-md" required>
            </div>
            <div>
                <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom</label>
                <input type="text" id="prenom" name="prenom" autocomplete="off"
                    class="mt-1 p-2 border border-gray-300 block w-full rounded-md" required>
            </div>
            <div>
                <label for="mail" class="block text-sm font-medium text-gray-700">Adresse email</label>
                <input type="email" id="mail" name="mail" autocomplete="off"
                    class="mt-1 p-2 border border-gray-300 block w-full rounded-md" required>
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                <input type="password" id="password" name="password"
                    class="mt-1 p-2 border border-gray-300 block w-full rounded-md" required>
            </div>
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmation du mot
                    de passe</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="mt-1 p-2 border border-gray-300 block w-full rounded-md" required>
            </div>
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Téléphone</label>
                <input type="text" id="phone" name="phone" pattern="[0-9]+"
                    title="Entrez un numéro de téléphone valide (chiffres seulement)"
                    class="mt-1 p-2 border border-gray-300 block w-full rounded-md" required>
            </div>
            <select name="role_utilisateur" class="mt-1 p-2 border border-gray-300 block w-full rounded-md" >
                <option value="">-- Veuillez sélectionner un rôle --</option>
                <?php foreach ($roles as $role): ?>
                    <option value="<?php echo $role['type_id']; ?>"><?php echo $role['role']; ?></option>
                <?php endforeach; ?>
            </select>
            <div class="flex justify-between items-center">
                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">S'inscrire</button>
                <a href="../controllers/controller_signin.php"
                    class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Retour</a>
            </div>
        </form>
    </div>
</body>

</html>