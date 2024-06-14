<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100">
    <div class="flex items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-900">
        <div class="w-full max-w-md px-8 py-6 mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-md">
            <h1 class="text-3xl font-semibold text-center text-gray-700 dark:text-gray-100">Login</h1>
            <form method="POST" action="{{ route('login') }}" class="mt-4 space-y-4">
                @csrf
                <!-- Email Address -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-100">Email</label>
                    <input name="email" type="email" placeholder="Email Address" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required/>
                    @if ($errors->has('loginError'))
                    <div class="mt-2 text-sm text-red-600 dark:text-red-400">
                        {{ $errors->first('loginError') }}
                    </div>
                    @endif
                </div>
                <!-- Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-100">Password</label>
                    <input name="password" type="password" placeholder="Enter Password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required/>
                </div>
                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox" class="h-4 w-4 text-indigo-600 border-gray-300 rounded dark:bg-gray-900 dark:border-gray-700 focus:ring-indigo-500">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-900 dark:text-gray-400">Remember me</label>
                    </div>
                    <div class="text-sm">
                        <a href="{{ route('password.request') }}" class="font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">Forgot your password?</a>
                    </div>
                </div>
                <div>
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Login</button>
                </div>
                <div class="text-center mt-2">
                    <span class="text-gray-600 dark:text-gray-400">Don't have an account yet? <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">Register</a></span>
                </div>
            </form>
            <div class="mt-4 flex items-center justify-center">
                <div class="w-full border-t border-gray-300 dark:border-gray-700"></div>
                <span class="px-3 text-gray-600 dark:text-gray-400">OR</span>
                <div class="w-full border-t border-gray-300 dark:border-gray-700"></div>
            </div>
            <form action="{{ route('auth.redirect') }}" method="GET" class="mt-4">
                @csrf
                <button type="submit" class="w-full inline-flex items-center justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100 dark:hover:bg-gray-800">
                    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor">
                        <path d="M16.318 13.714v5.484h9.078c-0.37 2.354-2.745 6.901-9.078 6.901-5.458 0-9.917-4.521-9.917-10.099s4.458-10.099 9.917-10.099c3.109 0 5.193 1.318 6.38 2.464l4.339-4.182c-2.786-2.599-6.396-4.182-10.719-4.182-8.844 0-16 7.151-16 16s7.156 16 16 16c9.234 0 15.365-6.49 15.365-15.635 0-1.052-0.115-1.854-0.255-2.651z"></path>
                    </svg>
                    Login with Google
                </button>
            </form>
        </div>
    </div>
</body>
</html>
