<?php include __DIR__ . "/partials/head.view.php"; ?>

<div class="min-h-[100vh] bg-gray-900 flex items-center justify-center px-4">
    <div class="text-center">
        <h1 class="text-9xl font-bold text-indigo-600 mb-4">404</h1>

        <h2 class="text-4xl font-bold text-white mb-3">Page Not Found</h2>
        <p class="text-gray-400 text-lg mb-8">The page you are looking for doesn't exist or has been moved.</p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/calendar" class="inline-flex items-center justify-center space-x-2 bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg transition-colors">
                <i data-feather="calendar" class="w-5 h-5"></i>
                <span>Back to Calendrier</span>
            </a>
            <a href="/subjects" class="inline-flex items-center justify-center space-x-2 bg-gray-800 hover:bg-gray-700 text-white px-6 py-3 rounded-lg transition-colors">
                <i data-feather="book-open" class="w-5 h-5"></i>
                <span>Browse Sujets</span>
            </a>
        </div>
    </div>
</div>