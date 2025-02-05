<?php include __DIR__ . "/../partials/header.view.php" ?>

<div class="flex h-fit">
    <div class="w-64 bg-gray-800 shadow-lg">
        <nav class="mt-4">
            <a href="/dashboard/accounts" class="sidebar-link flex items-center px-4 py-3 text-gray-300 hover:text-white bg-gray-700">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Accounts Management
            </a>
        </nav>
    </div>

    <div class="flex-1">
        <main class="p-6">
            <div class="mb-8">
                <h2 class="text-xl font-bold text-indigo-400 mb-4">Pending Approvals</h2>
                <div class="custom-scrollbar bg-gray-800 rounded-lg shadow-lg p-2">
                    <?php foreach ($accounts as $account):
                        if ($account['account_status'] == "Pending") :
                            extract($account) ?>
                            <div class="p-4 mb-2 border border-gray-700 rounded-lg hover:bg-gray-700 transition-colors">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="font-semibold"><?= $full_name ?></h3>
                                        <p class="text-sm text-gray-400"><?= $email ?></p>
                                    </div>
                                    <form action="" method="POST" class="flex space-x-2">
                                        <input type="hidden" value="<?= $user_id ?>">
                                        <button type="submit" name="action" class="px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition-colors">
                                            Approve
                                        </button>
                                        <button type="submit" name="action" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition-colors">
                                            Reject
                                        </button>
                                    </form>
                                </div>
                            </div>
                    <?php endif;
                    endforeach; ?>
                </div>
            </div>

            <div>
                <h2 class="text-xl font-bold text-indigo-400 mb-4">Approved Students</h2>
                <div class="custom-scrollbar bg-gray-800 rounded-lg shadow-lg p-2">
                    <?php foreach ($accounts as $account):
                        if ($account['account_status'] == "Approved") :
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
                                        <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition-colors">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                    <?php endif;
                    endforeach; ?>
                </div>
            </div>
        </main>
    </div>
</div>

<?php include __DIR__ . "/../partials/footer.view.php" ?>