<?php include __DIR__ . "/../partials/header.view.php" ?>

<div class="flex h-fit">
    <?php include __DIR__ . "/../partials/dashboardAdminSideBar.view.php" ?>

    <div class="flex-1">
        <main class="p-6">
            <div class="mb-8">
                <h2 class="text-xl font-bold text-indigo-400 mb-4">Pending Approvals</h2>
                <div class="custom-scrollbar bg-gray-800 rounded-lg shadow-lg p-2">
                    <?php if (empty($pending_accounts)):  ?>
                        <div class="flex items-center justify-center bg-gray-900 rounded-lg p-6 text-center">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-500 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <h3 class="text-lg font-semibold text-gray-300 mb-2">No Pending Account Approvals</h3>
                                <p class="text-gray-500">There are currently no accounts waiting for review. Check back later.</p>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php foreach ($pending_accounts as $account):
                        extract($account) ?>
                        <div class="p-4 mb-2 border border-gray-700 rounded-lg hover:bg-gray-700 transition-colors">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="font-semibold"><?= $full_name ?></h3>
                                    <p class="text-sm text-gray-400"><?= $email ?></p>
                                </div>
                                <form action="/dashboard/accounts/validation" method="POST" class="flex space-x-2">
                                    <input type="hidden" name="user_id" value="<?= $user_id ?>">
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

            <div>
                <h2 class="text-xl font-bold text-indigo-400 mb-4">Approved Students</h2>
                <div class="custom-scrollbar bg-gray-800 rounded-lg shadow-lg p-2">
                    <?php if (empty($approved_accounts)):  ?>
                        <div class="flex items-center justify-center bg-gray-900 rounded-lg p-6 text-center">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-500 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <h3 class="text-lg font-semibold text-gray-300 mb-2">No Approved Students</h3>
                                <p class="text-gray-500">No students have been approved yet. Accounts will appear here after review.</p>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php foreach ($approved_accounts as $account):
                        extract($account) ?>
                        <div class="p-4 mb-2 border border-gray-700 rounded-lg hover:bg-gray-700 transition-colors">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="font-semibold"><?= $full_name ?></h3>
                                    <p class="text-sm text-gray-400"><?= $email ?></p>
                                </div>
                                <div class="flex gap-2">
                                    <span class="px-2 py-1 bg-green-900 text-green-200 rounded text-sm">
                                        Approved
                                    </span>
                                    <form action="/dashboard/accounts/validation" method="POST" class="flex space-x-2">
                                        <input type="hidden" name="user_id" value="<?= $user_id ?>">
                                        <button type="submit" name="action" value="0" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition-colors">
                                            Reject
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </main>
    </div>
</div>

<?php include __DIR__ . "/../partials/footer.view.php" ?>