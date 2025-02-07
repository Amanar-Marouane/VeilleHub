<?php
include __DIR__ . "/head.view.php";
?>

<header class="bg-gray-800 shadow-md">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between py-4">
        <div class="flex items-center space-x-4">
            <a href="/" class="bg-gradient-to-r from-indigo-500 to-purple-500 bg-clip-text text-transparent text-2xl font-bold">
                Veille Hub
            </a>
        </div>

        <div class="hidden md:flex items-center space-x-6">
            <a href="/calendar" class="text-gray-300 hover:text-indigo-500 transition duration-300">Calendrier</a>
            <?php if (isset($_SESSION['user_id'])) : ?>
                <a href="/<?= $_SESSION["account_type"] == "Admin" ? "dashboard/accounts" : "dashboard/student" ?>" class="text-gray-300 hover:text-indigo-500 transition duration-300">DashBoard</a>
                <a href="/profil" class="text-gray-300 hover:text-indigo-500 transition duration-300">Mon Profil</a>
            <?php endif ?>
        </div>

        <div class="flex items-center space-x-4">
            <?php if (!isset($_SESSION['user_id'])) : ?>
                <a href="/login" class="bg-gray-700 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-300 mr-2">
                    Connexion
                </a>
                <a href="/register" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition duration-300">
                    Inscription
                </a>
            <?php else : ?>
                <a href="/logout" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition duration-300">
                    Logout
                </a>
            <?php endif ?>
        </div>


        <div class="md:hidden">
            <button type="button" class="text-gray-300 hover:text-white focus:outline-none">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </nav>
    <p class="bg-red-900 text-red-300 text-xs font-medium  rounded top-0 z-30 absolute w-full text-center error-p">
        <?= $_SESSION['error']; ?>
        <?php unset($_SESSION['error']); ?>
    </p>
    <p class="bg-green-900 text-green-300 text-xs font-medium  rounded top-0 z-30 absolute w-full text-center success-p">
        <?= $_SESSION['success']; ?>
        <?php unset($_SESSION['success']); ?>
    </p>
</header>