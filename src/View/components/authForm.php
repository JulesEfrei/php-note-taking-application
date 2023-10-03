<?php if ($mode === "login"): ?>
    <section class="bg-gray-200 flex justify-center items-center h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg w-80">
            <h1 class="text-2xl font-semibold mb-6">Login</h1>
            <form>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                    <input class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           id="email" type="email" placeholder="Enter your email">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                    <input class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           id="password" type="password" placeholder="Enter your password">
                </div>
                <div class="mb-4 flex justify-between items-center">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">Login
                    </button>
                    <a href="/register" class="text-blue-500 hover:underline text-xs">Not register yet?</a>
                </div>
            </form>
        </div>
    </section>
<?php elseif ($mode === "register"): ?>
    <section class="bg-gray-200 flex justify-center items-center h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg w-80">
            <h1 class="text-2xl font-semibold mb-6">Register</h1>
            <form>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
                    <input class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           id="name" type="text" placeholder="Enter your name">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                    <input class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           id="email" type="email" placeholder="Enter your email">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                    <input class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           id="password" type="password" placeholder="Enter your password">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="confirm-password">Confirm
                        Password</label>
                    <input class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           id="confirm-password" type="password" placeholder="Confirm your password">
                </div>
                <div class="mb-4 flex justify-between items-center">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">Register
                    </button>
                    <a href="/login" class="text-blue-500 hover:underline text-xs">Already have an account?</a>
                </div>
            </form>
        </div>
    </section>
<?php endif; ?>