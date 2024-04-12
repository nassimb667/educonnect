<header class="bg-white shadow-lg">
    <div class="container mx-auto flex justify-between items-center px-4 py-6">

        <div>
            <a href="../controllers/controller_home.php" class="text-xl font-semibold text-gray-800">Educonnect</a>
        </div>

        <!-- Menu -->
        <nav>
            <ul class="flex space-x-4">
                <li><a href="../controllers/controller_home.php" class="text-gray-600 hover:text-gray-800">Accueil</a>
                </li>
                <li><a href="../controllers/controller_event.php"
                        class="text-gray-600 hover:text-gray-800">evenement</a></li>
                <li><a href="../controllers/controller_liaison.php"
                        class="text-gray-600 hover:text-gray-800">Liaison</a></li>
                <li><a href="../controllers/controller_message.php"
                        class="text-gray-600 hover:text-gray-800">Messagerie</a></li>
                <li><a href="../controllers/controller_journal.php"
                        class="text-gray-600 hover:text-gray-800">Journal</a></li>
            </ul>
        </nav>
        <form method="POST" class="mb-4">
            <input type="submit" name="logout" value="Déconnexion"
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
        </form>
    </div>
</header>