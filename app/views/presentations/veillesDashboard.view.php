<?php include __DIR__ . "/../partials/header.view.php" ?>

<div class="flex h-fit">
    <?php include __DIR__ . "/../partials/dashboardAdminSideBar.view.php" ?>

    <div class="flex-1">
        <main class="p-3">
            <div class="grid grid-rows gap-6">
                <div class="flex gap-2">
                    <div class="col-span-1 bg-gray-800 rounded-lg p-4 h-fit w-[50%]">
                        <!-- <h2 class="text-xl font-bold text-indigo-400 mb-4">Next Veille</h2> -->
                        <div class="bg-gray-700 p-4 rounded-lg">
                            <h3 class="font-semibold text-lg mb-2"><?= $next_title ?></h3>
                            <div class="flex flex-col text-sm text-gray-400">
                                <span>Start Date: <?= $next_start ?></span>
                                <span>End Date: <?= $next_end ?></span>
                            </div>
                            <div class="mt-4 flex justify-between items-center">
                                <span class="px-2 py-1 bg-green-900 text-green-300 rounded">Upcoming</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-1 bg-gray-800 rounded-lg p-4 h-fit w-[50%]">
                        <!-- <h2 class="text-xl font-bold text-indigo-400 mb-4">Last Published Veille</h2> -->
                        <div class="bg-gray-700 p-4 rounded-lg">
                            <h3 class="font-semibold text-lg mb-2"><?= $last_title ?></h3>
                            <div class="flex flex-col text-sm text-gray-400">
                                <span>Start Date: <?= $last_start ?></span>
                                <span>End Date: <?= $last_end ?></span>
                            </div>
                            <div class="mt-4 flex justify-between items-center">
                                <span class="px-2 py-1 bg-green-900 text-green-300 rounded">Last Published</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-1 bg-gray-800 rounded-lg p-4">
                    <h2 class="text-xl font-bold text-indigo-400 mb-4">Student Suggestions</h2>
                    <div class="custom-scrollbar max-h-96 overflow-y-auto">
                        <?php if (empty($suggestions)):  ?>
                            <div class="flex items-center justify-center bg-gray-900 rounded-lg p-6 text-center">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-500 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <h3 class="text-lg font-semibold text-gray-300 mb-2">There's no suggestions at the moment</h3>
                                    <p class="text-gray-500">There are currently no suggestions waiting for review. Check back later.</p>
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
                                        <button type="submit" name="action" value="1" class="px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition-colors">
                                            Approve
                                        </button>
                                        <button type="submit" name="action" value="0" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition-colors">
                                            Reject
                                        </button>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="col-span-1 bg-gray-800 rounded-lg p-4">
                    <h2 class="text-xl font-bold text-indigo-400 mb-4">Add Veille Topic</h2>
                    <form class="space-y-8" method="POST" action="/dashboard/veilles/create">
                        <div class="flex flex-col gap-2">
                            <label for="title">
                                <span>Veille Title</span>
                            </label>
                            <input type="text" name="title" id="title" placeholder="Veille Topic" class="w-full bg-gray-700 text-white p-2 rounded">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex flex-col gap-2">
                                <label for="start">
                                    <span>Start Date & Time</span>
                                </label>
                                <input type="datetime-local" name="start" id="start" class="bg-gray-700 text-white p-2 rounded">
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="end">
                                    <span>End Date & Time</span>
                                </label>
                                <input type="datetime-local" name="end" id="end" class="bg-gray-700 text-white p-2 rounded">
                            </div>
                        </div>
                        <button type="submit" class="w-full bg-indigo-600 text-white p-2 rounded hover:bg-indigo-700">
                            Create Veille
                        </button>
                    </form>
                </div>

                <div class="col-span-1 bg-gray-800 rounded-lg p-4">
                    <h2 class="text-xl font-bold text-indigo-400 mb-4">Current Veilles</h2>

                    <div class="mb-4">
                        <input type="text"
                            id="veilleSearch"
                            placeholder="Search veilles..."
                            class="w-full bg-gray-700 text-white p-2 rounded">
                    </div>

                    <div class="custom-scrollbar max-h-96 overflow-y-auto">
                        <div id="veillesList">
                            <?php foreach ($current_veilles as $veille):
                                extract($veille) ?>
                                <div class="bg-gray-700 p-4 mb-3 rounded-lg">
                                    <div class="flex flex-col gap-2">
                                        <div class="flex justify-between items-start">
                                            <h3 class="font-semibold text-lg veilleTitle"><?= $title ?></h3>
                                            <div class="flex gap-2">
                                                <button onclick="openModifyModal(<?= $veille_id ?>, '<?= $title ?>', '<?= $start ?>', '<?= $end ?>')"
                                                    class="px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition-colors">
                                                    Modify
                                                </button>
                                                <button onclick="openAssignModal(<?= $veille_id ?>)"
                                                    class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700 transition-colors">
                                                    Assign
                                                </button>
                                                <form action="/dashboard/veilles/delete" method="POST" class="inline">
                                                    <input type="hidden" name="veille_id" value="<?= $veille_id ?>">
                                                    <button type="submit"
                                                        class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition-colors">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="text-sm text-gray-400">
                                            <span>Start: <?= $start ?></span>
                                            <span class="mx-2">|</span>
                                            <span>End: <?= $end ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div id="modifyModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                    <div class="bg-gray-800 p-6 rounded-lg w-full max-w-md">
                        <h3 class="text-xl font-bold text-indigo-400 mb-4">Modify Veille</h3>
                        <form action="/dashboard/veilles/update" method="POST" class="space-y-4">
                            <input type="hidden" id="modifyVeilleId" name="veille_id">
                            <div class="flex flex-col gap-2">
                                <label for="modifyTitle">Title</label>
                                <input type="text" id="modifyTitle" name="title" class="bg-gray-700 text-white p-2 rounded">
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="flex flex-col gap-2">
                                    <label for="modifyStart">Start Date & Time</label>
                                    <input type="datetime-local" id="modifyStart" name="start" class="bg-gray-700 text-white p-2 rounded">
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label for="modifyEnd">End Date & Time</label>
                                    <input type="datetime-local" id="modifyEnd" name="end" class="bg-gray-700 text-white p-2 rounded">
                                </div>
                            </div>
                            <div class="flex justify-end gap-2 mt-4">
                                <button type="button" onclick="closeModifyModal()"
                                    class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                                    Cancel
                                </button>
                                <button type="submit"
                                    class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div id="assignModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                    <div class="bg-gray-800 p-6 rounded-lg w-full max-w-md">
                        <h3 class="text-xl font-bold text-indigo-400 mb-4">Assign Students</h3>
                        <form action="/dashboard/veilles/assign" method="POST" class="space-y-4">
                            <input type="hidden" id="assignVeilleId" name="veille_id">
                            <div class="flex flex-col gap-2">
                                <input type="text"
                                    id="assignStudentSearch"
                                    placeholder="Search students..."
                                    class="w-full bg-gray-700 text-white p-2 rounded">
                                <div class="max-h-60 overflow-y-auto bg-gray-700 p-2 rounded custom-scrollbar">
                                    <div id="assignStudentList" class="flex flex-col gap-2">
                                        <?php foreach ($students as $student):
                                            extract($student) ?>
                                            <label class="flex items-center gap-2">
                                                <input type="checkbox"
                                                    name="students[]"
                                                    value="<?= $user_id ?>"
                                                    class="form-checkbox">
                                                <span><?= $full_name ?></span>
                                            </label>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-end gap-2 mt-4">
                                <button type="button" onclick="closeAssignModal()"
                                    class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                                    Cancel
                                </button>
                                <button type="submit"
                                    class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                                    Assign Students
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <script>
                    document.getElementById('veilleSearch').addEventListener('input', function() {
                        const searchTerm = this.value.toLowerCase();
                        const veilles = document.getElementById('veillesList').children;

                        Array.from(veilles).forEach(veille => {
                            const title = veille.querySelector('h3').textContent.toLowerCase();
                            veille.style.display = title.includes(searchTerm) ? 'block' : 'none';
                        });
                    });

                    function openModifyModal(veilleId, title, start, end) {
                        document.getElementById('modifyModal').classList.remove('hidden');
                        document.getElementById('modifyVeilleId').value = veilleId;
                        document.getElementById('modifyTitle').value = title;
                        document.getElementById('modifyStart').value = start;
                        document.getElementById('modifyEnd').value = end;
                    }

                    function closeModifyModal() {
                        document.getElementById('modifyModal').classList.add('hidden');
                    }

                    function openAssignModal(veilleId) {
                        document.getElementById('assignModal').classList.remove('hidden');
                        document.getElementById('assignVeilleId').value = veilleId;
                    }

                    function closeAssignModal() {
                        document.getElementById('assignModal').classList.add('hidden');
                    }

                    document.getElementById('assignStudentSearch').addEventListener('input', function() {
                        const searchTerm = this.value.toLowerCase();
                        const students = document.getElementById('assignStudentList').children;

                        Array.from(students).forEach(student => {
                            const name = student.textContent.toLowerCase();
                            student.style.display = name.includes(searchTerm) ? 'flex' : 'none';
                        });
                    });
                </script>
        </main>
    </div>
</div>


<?php include __DIR__ . "/../partials/footer.view.php" ?>