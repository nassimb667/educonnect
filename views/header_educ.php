<header class="bg-black shadow-lg">
    <div class="container mx-auto flex justify-between items-center px-4 py-6">
        <div>
            <a href="../controllers/controller_educ_home.php" class="text-xl font-semibold text-white">Educonnect</a>
        </div>

        <!-- Menu -->
        <nav class="hidden sm:block">
            <ul class="flex space-x-4 ">
                <li><a href="../controllers/controller_educ_home.php" class="text-white hover:text-white-800">Accueil</a></li>
                <li><a href="../controllers/controller_educ_event.php" class="text-white hover:text-white-800">Événement</a></li>
                <li><a href="../controllers/controller_educ_emploidutemp.php" class="text-white hover:text-white-800">Emploi du temps</a></li>
                <li><a href="../controllers/controller_educ_message.php" class="text-white hover:text-white-800">Messagerie</a></li>
                <li><a href="../controllers/controller_educ_journal.php" class="text-white hover:text-white-800">Journal</a></li>
            </ul>
        </nav>

        <!-- Bouton de déconnexion -->
        <div class="relative">
            <a href="../controllers/controller_login_educ.php" class="text-white hover:text-white-800">Déconnexion</a>
        </div>
        <!-- Menu pour les écrans de petite taille -->
        <div class="sm:hidden">
            <button id="menuBtn" class="text-white hover:text-gray-800 focus:outline-none">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
    </div>
    <!-- Menu déroulant pour les écrans de petite taille -->
    <div id="mobileMenu" class="hidden sm:hidden">
        <ul class="bg-white shadow-md mt-2 w-full rounded-md py-1">
            <li><a href="../controllers/controller_educ_home.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Accueil</a></li>
            <li><a href="../controllers/controller_educ_event.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Événement</a></li>
            <li><a href="../controllers/controller_educ_emploidutemp.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Emploi du temps</a></li>
            <li><a href="../controllers/controller_educ_message.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Messagerie</a></li>
            <li><a href="../controllers/controller_educ_journal.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Journal</a></li>
        </ul>
    </div>
</header>
<script>
    const profileDropdownBtn = document.getElementById('profileDropdownBtn');
    const profileDropdownMenu = document.getElementById('profileDropdownMenu');
    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    profileDropdownBtn.addEventListener('click', () => {
        profileDropdownMenu.classList.toggle('hidden');
    });

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
