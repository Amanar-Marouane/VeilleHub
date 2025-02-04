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

        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=\" 30\" height=\"30\" viewBox=\"0 0 30 30\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cpath d=\"M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z\" fill=\"rgba(255,255,255,0.07)\"%3E%3C/path%3E%3C/svg%3E')] opacity-20"></div>

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
                    <h2 class="text-3xl font-bold tracking-tight text-white">Log into your Account</h2>
                    <p class="text-gray-400">And Join thousands of learners around the world</p>
                </div>

                <form action="/login/user" method="POST" class="space-y-6">
                    <div class="space-y-4">
                        <div>
                            <label for="email" class="block text-sm font-medium text-white mb-2">Email Address</label>
                            <input type="email" id="email" name="email"
                                class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200"
                                required placeholder="you@example.com">
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-white mb-2">Password</label>
                            <input type="password" id="password" name="password"
                                class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200"
                                required placeholder="••••••••">
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full bg-indigo-600 text-white font-medium rounded-lg px-4 py-2.5 text-center hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-800 transition duration-200">
                        Create Account
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-gray-400">
                        You don't have account?
                        <a href="/register" class="text-indigo-400 hover:text-indigo-300 font-medium hover:underline transition duration-200">
                            Resigter
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