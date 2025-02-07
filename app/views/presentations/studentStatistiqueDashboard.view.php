<?php include __DIR__ . "/../partials/header.view.php" ?>
<div class="flex h-screen overflow-hidden">
    <?php include __DIR__ . "/../partials/dashboardStudentSideBar.view.php" ?>
    
    <div class="flex-1 overflow-y-auto">
        <main class="p-6 h-full">
            <div class="grid grid-cols-2 gap-6 h-full">
                <div class="bg-gray-800 rounded-lg p-6 flex flex-col">
                    <h2 class="text-xl font-bold text-indigo-400 mb-4">Your Ranking</h2>
                    <div class="flex items-center justify-center flex-grow">
                        <div class="text-center">
                            <span class="text-5xl font-bold text-indigo-400"><?= $rank_position ?></span>
                            <p class="text-gray-400 mt-2">out of <?= $total_students ?> students</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-800 rounded-lg p-6 flex flex-col">
                    <h2 class="text-xl font-bold text-indigo-400 mb-4">Overview</h2>
                    <div class="space-y-4 flex-grow">
                        <div class="bg-gray-700 rounded-lg p-4 flex justify-between items-center">
                            <span class="text-gray-400">Total Participition</span>
                            <span class="text-indigo-400 font-bold"><?= $participition_count ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<?php include __DIR__ . "/../partials/footer.view.php" ?>