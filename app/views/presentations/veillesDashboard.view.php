<?php include __DIR__ . "/../partials/header.view.php" ?>

<div class="flex h-fit">
    <?php include __DIR__ . "/../partials/dashboardAdminSideBar.view.php" ?>

    <div class="flex-1">
        <main class="p-3">
            <div class="grid grid-rows gap-6">
                <div class="col-span-1 bg-gray-800 rounded-lg p-4">
                    <h2 class="text-xl font-bold text-indigo-400 mb-4">Student Suggestions</h2>
                    <div class="custom-scrollbar max-h-96 overflow-y-auto">
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
                        <div class="flex flex-col gap-2">
                            <label for="studentSearch">
                                <span>Assign Students</span>
                            </label>
                            <input type="text" id="studentSearch" placeholder="Search students..." class="w-full bg-gray-700 text-white p-2 rounded">

                            <div class="max-h-40 overflow-y-auto bg-gray-700 p-2 rounded custom-scrollbar">
                                <div id="studentList" class="flex flex-col gap-2">
                                    <label class="flex items-center gap-2">
                                        <input type="checkbox" name="students[]" value="1" class="form-checkbox">
                                        <span>John Doe</span>
                                    </label>
                                    <label class="flex items-center gap-2">
                                        <input type="checkbox" name="students[]" value="2" class="form-checkbox">
                                        <span>Jane Smith</span>
                                    </label>
                                    <label class="flex items-center gap-2">
                                        <input type="checkbox" name="students[]" value="3" class="form-checkbox">
                                        <span>Michael Brown</span>
                                    </label><label class="flex items-center gap-2">
                                        <input type="checkbox" name="students[]" value="3" class="form-checkbox">
                                        <span>Michael Brown</span>
                                    </label><label class="flex items-center gap-2">
                                        <input type="checkbox" name="students[]" value="3" class="form-checkbox">
                                        <span>Michael Brown</span>
                                    </label><label class="flex items-center gap-2">
                                        <input type="checkbox" name="students[]" value="3" class="form-checkbox">
                                        <span>Michael Brown</span>
                                    </label><label class="flex items-center gap-2">
                                        <input type="checkbox" name="students[]" value="3" class="form-checkbox">
                                        <span>Michael Brown</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-indigo-600 text-white p-2 rounded hover:bg-indigo-700">
                            Create Veille
                        </button>
                    </form>
                </div>

                <script>
                    document.getElementById("studentSearch").addEventListener("input", function() {
                        let filter = this.value.toLowerCase();
                        let studentList = document.getElementById("studentList").children;

                        for (let student of studentList) {
                            let name = student.innerText.toLowerCase();
                            student.style.display = name.includes(filter) ? "flex" : "none";
                        }
                    });
                </script>


                <div class="col-span-1 bg-gray-800 rounded-lg p-4 h-fit">
                    <h2 class="text-xl font-bold text-indigo-400 mb-4">Next Veille</h2>
                    <div class="bg-gray-700 p-4 rounded-lg">
                        <h3 class="font-semibold text-lg mb-2"><?= $title ?></h3>
                        <div class="flex flex-col text-sm text-gray-400">
                            <span>Start Date: <?= $start ?></span>
                            <span>End Date: <?= $end ?></span>
                        </div>
                        <div class="mt-4 flex justify-between items-center">
                            <span class="px-2 py-1 bg-green-900 text-green-300 rounded">Upcoming</span>
                        </div>
                    </div>
                </div>
        </main>
    </div>
</div>


<?php include __DIR__ . "/../partials/footer.view.php" ?>