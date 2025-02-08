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
                    <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                        <path d="M20 0L0 10L0 30L20 40L40 30L40 10L20 0Z" fill="rgba(99, 102, 241, 0.03)" />
                        <path d="M20 0L40 10L40 30L20 40L0 30L0 10L20 0Z" fill="rgba(99, 102, 241, 0.04)" />
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
                    <h2 class="text-3xl font-bold tracking-tight text-white">Enter Your new Password</h2>
                </div>

                <form action="/reset/force" method="POST" class="space-y-6">
                    <input type="hidden" name="email" value="<?= $email ?>">
                    <div class="space-y-4">
                        <div class="relative">
                            <label for="password" class="block text-sm font-medium text-white mb-2">New Password</label>
                            <input type="password" id="password" name="password"
                                class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200"
                                required placeholder="**************">
                            <button type="button" onclick="togglePassword()" class="absolute right-3 top-9 text-gray-400 hover:text-white">
                                <svg id="eye-icon" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full bg-indigo-600 text-white font-medium rounded-lg px-4 py-2.5 text-center hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-800 transition duration-200">
                        Done
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

<script>
    function togglePassword() {
        const password = document.getElementById('password');
        const eyeIcon = document.getElementById('eye-icon');

        if (password.type === 'password') {
            password.type = 'text';
            eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />`;
        } else {
            password.type = 'password';
            eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />`;
        }
    }
</script>
</body>

</html>