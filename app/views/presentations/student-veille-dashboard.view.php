<?php include __DIR__ . "/../partials/header.view.php" ?>

<div class="flex h-fit">
    <?php include __DIR__ . "/../partials/dashboardStudentSideBar.view.php" ?>

    <div class="flex-1">
        <main class="p-3">
            <div class="grid grid-rows gap-6">
                <div class="flex gap-2">
                    <div class="col-span-1 bg-gray-800 rounded-lg p-4 h-fit w-[50%]">
                        <!-- <h2 class="text-xl font-bold text-indigo-400 mb-4">Next Veille</h2> -->
                        <div class="bg-gray-700 p-4 rounded-lg">
                            <h3 class="font-semibold text-lg mb-2"><?= $upcoming_title ?></h3>
                            <div class="flex flex-col text-sm text-gray-400">
                                <span>Start Date: <?= $upcoming_start ?></span>
                                <span>End Date: <?= $upcoming_end ?></span>
                            </div>
                            <div class="mt-4 flex justify-between items-center">
                                <span class="px-2 py-1 bg-green-900 text-green-300 rounded">Upcoming</span>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="col-span-1 bg-gray-800 rounded-lg p-4 h-fit w-[50%]">
                        <h2 class="text-xl font-bold text-indigo-400 mb-4">Last Published Veille</h2>
                        <div class="bg-gray-700 p-4 rounded-lg">
                            <h3 class="font-semibold text-lg mb-2"><?= $last_title ?></h3>
                            <div class="flex flex-col text-sm text-gray-400">
                                <span>Start Date: <?= $last_start ?></span>
                                <span>End Date: <?= $last_end ?></span>
                            </div>
                            <div class="mt-4 flex justify-between items-center">
                                <span class="px-2 py-1 bg-green-900 text-green-300 rounded">Last Suggested</span>
                            </div>
                        </div>
                    </div> -->
                </div>

                <!-- <div class="col-span-1 bg-gray-800 rounded-lg p-4">
                    <h2 class="text-xl font-bold text-indigo-400 mb-4">Your Suggestions</h2>
                    <div class="custom-scrollbar max-h-96 overflow-y-auto">
                        <?php if (empty($suggestions)):  ?>
                            <div class="flex items-center justify-center bg-gray-900 rounded-lg p-6 text-center">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-500 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <h3 class="text-lg font-semibold text-gray-300 mb-2">There's no suggestions at the moment</h3>
                                    <p class="text-gray-500">Try to give some suggestions :></p>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php foreach ($suggestions as $suggest):
                            extract($suggest) ?>
                            <div class="bg-gray-700 p-4 mb-3 rounded-lg">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <h3 class="font-semibold"><?= $suggest_content ?></h3>
                                    </div>
                                    <form action="/dashboard/suggestions/validation" method="POST" class="flex space-x-2">
                                        <input type="hidden" name="suggest_id" value="<?= $suggest_id ?>">
                                        <button type="submit" name="action" value="0" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition-colors">
                                            DELETE
                                        </button>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div> -->

                <div class="col-span-1 bg-gray-800 rounded-lg p-6 shadow-lg">
                    <h2 class="text-xl font-bold text-indigo-400 mb-6 flex items-center gap-2">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Add a Suggestion
                    </h2>

                    <form class="space-y-6" method="POST" action="/dashborad/student/suggest">
                        <div class="space-y-2">
                            <label for="title" class="block text-sm font-medium text-gray-300">
                                Suggestion Title
                                <span class="text-indigo-400">*</span>
                            </label>
                            <div class="relative">
                                <input
                                    type="text"
                                    name="title"
                                    id="title"
                                    required
                                    placeholder="Enter your suggestion title"
                                    class="w-full bg-gray-700 text-white px-4 py-3 rounded-lg
                           border border-gray-600
                           placeholder-gray-400
                           focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50
                           hover:border-gray-500
                           transition-all duration-200">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="note" class="block text-sm font-medium text-gray-300">
                                Additional Notes
                                <span class="text-gray-400 text-xs ml-1">(optional)</span>
                            </label>
                            <textarea
                                name="note"
                                id="note"
                                rows="4"
                                placeholder="Add any additional details or context..."
                                class="w-full bg-gray-700 text-white px-4 py-3 rounded-lg
                       border border-gray-600
                       placeholder-gray-400
                       focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50
                       hover:border-gray-500
                       transition-all duration-200
                       resize-none"></textarea>
                        </div>

                        <button
                            type="submit"
                            class="w-full bg-indigo-600 text-white px-4 py-3 rounded-lg
                   hover:bg-indigo-700 
                   focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-800
                   transform hover:-translate-y-0.5
                   transition-all duration-200
                   font-medium
                   flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Submit Suggestion
                        </button>
                    </form>
                </div>

                <div class="col-span-1 bg-gray-800 rounded-lg p-4">
                    <h2 class="text-xl font-bold text-indigo-400 mb-4">Current Veilles You Assigned To</h2>

                    <div class="relative mb-4">
                        <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>

                        <input
                            type="text"
                            id="veilleSearch"
                            placeholder="Search by title, date or time..."
                            class="w-full bg-gray-700 text-white pl-10 pr-4 py-3 rounded-lg
                                border border-gray-600 
                                placeholder-gray-400
                                focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50
                                hover:border-gray-500
                                transition-all duration-200
                                outline-none
                                text-sm">

                        <button
                            id="clearSearch"
                            class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-white transition-colors duration-200 hidden"
                            onclick="clearSearchInput()">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <script>
                        function clearSearchInput() {
                            const searchInput = document.getElementById('veilleSearch');
                            const clearButton = document.getElementById('clearSearch');
                            searchInput.value = '';
                            clearButton.classList.add('hidden');
                            searchInput.dispatchEvent(new Event('input'));
                            searchInput.focus();
                        }

                        document.addEventListener('DOMContentLoaded', function() {
                            const searchInput = document.getElementById('veilleSearch');
                            const clearButton = document.getElementById('clearSearch');
                            const veillesList = document.getElementById('veillesList');

                            searchInput.addEventListener('input', function(e) {
                                clearButton.classList.toggle('hidden', !this.value);

                                const searchTerm = e.target.value.toLowerCase().trim();
                                const veilles = veillesList.getElementsByClassName('bg-gray-700');

                                Array.from(veilles).forEach(veille => {
                                    const title = veille.querySelector('.veilleTitle').textContent.toLowerCase();
                                    const dates = Array.from(veille.getElementsByTagName('time'))
                                        .map(time => time.textContent.toLowerCase())
                                        .join(' ');

                                    const content = `${title} ${dates}`;

                                    if (content.includes(searchTerm)) {
                                        veille.style.display = '';
                                        veille.style.opacity = '1';
                                        veille.style.transform = 'translateY(0)';
                                    } else {
                                        veille.style.opacity = '0';
                                        veille.style.transform = 'translateY(-10px)';
                                        setTimeout(() => {
                                            veille.style.display = 'none';
                                        }, 200);
                                    }
                                });
                            });

                            Array.from(veillesList.getElementsByClassName('bg-gray-700')).forEach(veille => {
                                veille.style.transition = 'opacity 0.2s ease, transform 0.2s ease';
                            });

                            searchInput.addEventListener('keydown', function(e) {
                                if (e.key === 'Escape') {
                                    clearSearchInput();
                                }
                            });
                        });
                    </script>

                    <div class="custom-scrollbar max-h-96 overflow-y-auto">
                        <div id="veillesList">
                            <?php foreach ($assigned_veilles as $veille):
                                extract($veille) ?>
                                <div class="bg-gray-700 p-4 mb-3 rounded-lg hover:bg-gray-600 transition-all duration-200">
                                    <div class="flex flex-col gap-3">
                                        <h3 class="font-semibold text-lg text-white veilleTitle"><?= $title ?></h3>

                                        <div class="grid grid-cols-2 gap-4">
                                            <div class="flex flex-col">
                                                <span class="text-xs text-gray-400 uppercase tracking-wide">Start Date</span>
                                                <time class="text-sm text-white font-medium">
                                                    <?= date('M d, Y', strtotime($start)) ?>
                                                </time>
                                                <time class="text-xs text-gray-400">
                                                    <?= date('h:i A', strtotime($start)) ?>
                                                </time>
                                            </div>

                                            <div class="flex flex-col">
                                                <span class="text-xs text-gray-400 uppercase tracking-wide">End Date</span>
                                                <time class="text-sm text-white font-medium">
                                                    <?= date('M d, Y', strtotime($end)) ?>
                                                </time>
                                                <time class="text-xs text-gray-400">
                                                    <?= date('h:i A', strtotime($end)) ?>
                                                </time>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>


<?php include __DIR__ . "/../partials/footer.view.php" ?>