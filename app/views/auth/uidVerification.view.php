<?php include __DIR__ . "/../partials/head.view.php" ?>

<p class="bg-red-900 text-red-300 text-xs font-medium rounded top-0 z-30 absolute w-full text-center error-p">
    <?= $_SESSION['error']; ?>
    <?php unset($_SESSION['error']); ?>
</p>
<p class="bg-green-900 text-green-300 text-xs font-medium rounded top-0 z-30 absolute w-full text-center success-p">
    <?= $_SESSION['success']; ?>
    <?php unset($_SESSION['success']); ?>
</p>

<div class="min-h-screen flex flex-col">
    <div class="flex-grow flex items-center justify-center bg-gray-900 px-4 py-12 sm:px-6 lg:px-8">
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-900/30 via-gray-900 to-gray-900"></div>

        <div class="absolute inset-0">
            <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="grid" width="50" height="50" patternUnits="userSpaceOnUse">
                        <path d="M 50 50 L 0 50 L 25 0 Z" fill="rgba(99, 102, 241, 0.02)" />
                        <path d="M 50 0 L 0 0 L 25 50 Z" fill="rgba(99, 102, 241, 0.03)" />
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid)" />
            </svg>
        </div>

        <div class="relative max-w-md w-full">
            <div class="mb-8 text-center">
                <div class="h-12 w-12 mx-auto bg-indigo-600 rounded-xl flex items-center justify-center mb-4">
                    <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
            </div>

            <div class="bg-gray-800 rounded-lg border border-gray-700 p-8 shadow-2xl backdrop-blur-sm bg-opacity-90">
                <div class="space-y-2 text-center mb-8">
                    <h2 class="text-3xl font-bold tracking-tight text-white">Enter Verification Code</h2>
                    <p class="text-gray-400 text-sm">Please enter the verification code sent to your email</p>
                </div>

                <form action="/reset/check" method="POST" class="space-y-6">
                    <input type="hidden" name="email" value="<?= $email ?>">
                    <div class="space-y-4">
                        <div>
                            <label for="code" class="block text-sm font-medium text-white mb-2">Verification Code</label>
                            <input type="text" id="code" name="code"
                                class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white font-mono text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200"
                                required
                                pattern="[a-f0-9]{8}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{12}"
                                placeholder="xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx"
                                spellcheck="false"
                                autocomplete="off">
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full bg-indigo-600 text-white font-medium rounded-lg px-4 py-2.5 text-center hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-800 transition duration-200">
                        Verify Code
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-gray-400">
                        You don't have account?
                        <a href="/register" class="text-indigo-400 hover:text-indigo-300 font-medium hover:underline transition duration-200">
                            Resigter
                        </a>
                        <br>Or
                        <a href="/login" class="text-indigo-400 hover:text-indigo-300 font-medium hover:underline transition duration-200">
                            Login
                        </a>
                        <br>Or
                        <a href="/calendar" class="text-indigo-400 hover:text-indigo-300 font-medium hover:underline transition duration-200">
                            Check Calendar
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>