<?php include __DIR__ . "/../partials/header.view.php" ?>

<div class="flex h-fit">
    <?php include __DIR__ . "/../partials/dashboardAdminSideBar.view.php" ?>

    <div class="flex-1">
        <main class="p-6 min-h-[60vh]">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Total des présentations</p>
                        <p class="text-3xl font-bold text-blue-800"><?= $total_veilles ?></p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold mb-4 text-gray-700">Étudiants les plus actifs</h3>
                    <ul class="space-y-2">
                        <?php foreach ($top as $invidual):
                            extract($invidual) ?>
                            <li class="flex justify-between border-b pb-2">
                                <span class="text-gray-600"><?= $full_name ?></span>
                                <span class="font-bold text-green-600"><?= $veille_count ?> présentation(s)</span>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Taux de participation</p>
                        <p class="text-3xl font-bold text-green-800"><?= ceil($participation_rate) ?>%</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Total des suggestions</p>
                        <p class="text-3xl font-bold text-blue-800"><?= $total_suggestions ?></p>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<?php include __DIR__ . "/../partials/footer.view.php" ?>