<div class="w-64 bg-gray-800 shadow-lg">
    <nav class="mt-4">
        <a href="/dashboard/accounts" class="sidebar-link flex items-center px-4 py-3 text-gray-300 hover:text-white <?= getURI() == "dashboard/accounts" ? "bg-gray-700" : "bg-gray-900"; ?>">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            Accounts Management
        </a>
        <a href="/dashboard/veilles" class="sidebar-link flex items-center px-4 py-3 text-gray-300 hover:text-white <?= getURI() == "dashboard/veilles" ? "bg-gray-700" : "bg-gray-900"; ?>">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            Veilles Managemant
        </a>
        <a href="/dashborad/statistiques" class="sidebar-link flex items-center px-4 py-3 text-gray-300 hover:text-white <?= getURI() == "statistiques" ? "bg-gray-700" : "bg-gray-900"; ?>">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            Statistiques
        </a>
    </nav>
</div>