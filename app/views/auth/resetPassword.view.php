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
                    <pattern id="grid" width="60" height="60" patternUnits="userSpaceOnUse">
                        <circle cx="10" cy="10" r="2" fill="rgba(99, 102, 241, 0.03)" />
                        <circle cx="30" cy="30" r="2" fill="rgba(99, 102, 241, 0.04)" />
                        <circle cx="50" cy="10" r="2" fill="rgba(99, 102, 241, 0.03)" />
                        <circle cx="10" cy="50" r="2" fill="rgba(99, 102, 241, 0.03)" />
                        <circle cx="50" cy="50" r="2" fill="rgba(99, 102, 241, 0.04)" />
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid)" />
            </svg>
        </div>

        <div class="relative max-w-md w-full">
            <div class="mb-8 text-center">
                <div class="h-12 w-12 mx-auto bg-indigo-600 rounded-xl flex items-center justify-center mb-4">
                    <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                    </svg>
                </div>
            </div>

            <div class="bg-gray-800 rounded-lg border border-gray-700 p-8 shadow-2xl backdrop-blur-sm bg-opacity-90">
                <div class="space-y-2 text-center mb-8">
                    <h2 class="text-3xl font-bold tracking-tight text-white">Reset Your Password</h2>
                    <p class="text-gray-400">Enter your email address to reset your password</p>
                </div>

                <form action="/reset/password" method="POST" class="space-y-6">
                    <div class="space-y-4">
                        <div>
                            <label for="email" class="block text-sm font-medium text-white mb-2">Email Address</label>
                            <div class="relative">
                                <input type="email" id="email" name="email"
                                    class="w-full px-3 py-2 pl-10 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200"
                                    required placeholder="you@example.com">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full bg-indigo-600 text-white font-medium rounded-lg px-4 py-2.5 text-center hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-800 transition duration-200">
                        Send Reset Link
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