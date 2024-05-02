<header class="bg-black shadow-lg">
    <div class="container mx-auto flex justify-between items-center px-4 py-6">
        <div>
            <a href="../controllers/controller_home.php" class="text-xl font-semibold text-gray-800">
                <img src="../assets/img/logo/logo.png" alt="Logo" class="w-20">
            </a>
        </div>

        <!-- Menu -->
        <nav class="hidden sm:block">
            <ul class="flex space-x-4">
                <li><a href="../controllers/controller_educ_home.php" class="text-white hover:text-white-800">Accueil</a></li>
                <li><a href="../controllers/controller_educ_event.php" class="text-white hover:text-white-800">Événement</a></li>
                <li><a href="../controllers/controller_educ_emploidutemp.php" class="text-white hover:text-white-800">Emploi du temps</a></li>
                <li><a href="../controllers/controller_educ_message.php" class="text-white hover:text-white-800">Messagerie</a></li>
                <li>
                    <div class="relative">
                        <button id="journalDropdownBtn" class="text-white hover:text-white-800 focus:outline-none">
                            Journal
                            <svg class="h-5 w-5 inline-block ml-1 -mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                        <ul id="journalDropdownMenu" class="hidden absolute bg-white shadow-md mt-2 w-32 rounded-md py-1">
                            <li><a href="../controllers/controller_educ_journal.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Ajouter journal</a></li>
                            <li><a href="../controllers/controller_educ_modify_journal.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Modifier journal</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- Bouton de déconnexion -->
        <div class="relative">
            <a href="../controllers/controller_login_educ.php" class="text-white hover:text-white-800">Déconnexion</a>
        </div>
    </div>
</header>
<script>
    const journalDropdownBtn = document.getElementById('journalDropdownBtn');
    const journalDropdownMenu = document.getElementById('journalDropdownMenu');

    journalDropdownBtn.addEventListener('click', () => {
        journalDropdownMenu.classList.toggle('hidden');
    });
</script>
