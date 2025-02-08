<?php include __DIR__ . "/../partials/head.view.php" ?>

<p class="bg-red-900 text-red-300 text-xs font-medium  rounded top-0 z-30 absolute w-full text-center error-p">
    <?= $_SESSION['error']; ?>
    <?php unset($_SESSION['error']); ?>
</p>
<p class="bg-green-900 text-green-300 text-xs font-medium  rounded top-0 z-30 absolute w-full text-center success-p">
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
                        <rect width="40" height="40" fill="none" stroke="rgba(99, 102, 241, 0.05)" stroke-width="1" />
                        <circle cx="20" cy="20" r="1" fill="rgba(99, 102, 241, 0.07)" />
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid)" />
            </svg>
        </div>

        <div class="relative max-w-md w-full">
            <div class="mb-8 text-center">
                <div class="h-12 w-12 mx-auto bg-indigo-600 rounded-xl flex items-center justify-center mb-4">
                    <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
            </div>

            <div class="bg-gray-800 rounded-lg border border-gray-700 p-8 shadow-2xl backdrop-blur-sm bg-opacity-90">
                <div class="space-y-2 text-center mb-8">
                    <h2 class="text-3xl font-bold tracking-tight text-white">Create an Account</h2>
                    <p class="text-gray-400">And Join thousands of learners around the world</p>
                </div>

                <form action="/register/user" method="POST" class="space-y-6">
                    <div class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-white mb-2">Full Name</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <input type="text" id="name" name="name"
                                    class="w-full pl-10 px-3 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200"
                                    required placeholder="full name">
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-white mb-2">Email Address</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <input type="email" id="email" name="email"
                                    class="w-full pl-10 px-3 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200"
                                    required placeholder="you@example.com">
                            </div>
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-white mb-2">Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <input type="password" id="password" name="password"
                                    class="w-full pl-10 px-3 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200"
                                    required placeholder="••••••••">
                                <button type="button" onclick="togglePassword('password')" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" id="password-toggle" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div>
                            <label for="confirm-password" class="block text-sm font-medium text-white mb-2">Confirm Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <input type="password" id="confirm-password" name="confirm_password"
                                    class="w-full pl-10 px-3 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200"
                                    required placeholder="••••••••">
                                <button type="button" onclick="togglePassword('confirm-password')" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" id="confirm-password-toggle" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                            <p id="password-match-message" class="mt-1 text-sm hidden"></p>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full bg-indigo-600 text-white font-medium rounded-lg px-4 py-2.5 text-center hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-800 transition duration-200">
                        Create Account
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-gray-400">
                        Already have an account?
                        <a href="/login" class="text-indigo-400 hover:text-indigo-300 font-medium hover:underline transition duration-200">
                            Sign in
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
    function togglePassword(fieldId) {
        const field = document.getElementById(fieldId);
        const toggleIcon = document.getElementById(fieldId + '-toggle');

        if (field.type === 'password') {
            field.type = 'text';
            toggleIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
        `;
        } else {
            field.type = 'password';
            toggleIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
        `;
        }
    }

    document.getElementById('password').addEventListener('input', validatePassword);
    document.getElementById('confirm-password').addEventListener('input', validatePassword);

    function validatePassword() {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm-password').value;
        const message = document.getElementById('password-match-message');

        if (confirmPassword) {
            message.classList.remove('hidden');
            if (password === confirmPassword) {
                message.textContent = 'Passwords match!';
                message.className = 'mt-1 text-sm text-green-400';
            } else {
                message.textContent = 'Passwords do not match';
                message.className = 'mt-1 text-sm text-red-400';
            }
        } else {
            message.classList.add('hidden');
        }
    }
</script>
</body>

</html>