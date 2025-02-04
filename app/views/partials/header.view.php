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
            <a href="/subjects" class="text-gray-300 hover:text-indigo-500 transition duration-300">Sujets</a>
            <a href="/presentations" class="text-gray-300 hover:text-indigo-500 transition duration-300">Présentations</a>
            <a href="/stats" class="text-gray-300 hover:text-indigo-500 transition duration-300">Statistiques</a>
            <a href="/stats" class="text-gray-300 hover:text-indigo-500 transition duration-300">Mon Profil</a>
        </div>

        <div class="flex items-center space-x-4">
            <a href="/login" class="bg-gray-700 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-300 mr-2">
                Connexion
            </a>
            <a href="/register" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition duration-300">
                Inscription
            </a>
        </div>

        <div class="md:hidden">
            <button type="button" class="text-gray-300 hover:text-white focus:outline-none">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </nav>
</header>