@vite('resources/css/app.css')

<div class="flex items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-900">
    <div class="w-full max-w-md px-8 py-6 mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-center text-gray-700 dark:text-gray-100">Forgot Your Password?</h1>
        
        @if (session('status'))
            <div class="mt-4 bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md" role="alert">
                <div class="flex">
                    <div class="py-1">
                        <svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M16.707 3.293a1 1 0 0 1 0 1.414L9 12.414 7.293 10.707a1 1 0 0 1 1.414-1.414L9 9.586l6.293-6.293a1 1 0 0 1 1.414 0zM9 16a1 1 0 0 0 1-1v-4a1 1 0 1 0-2 0v4a1 1 0 0 0 1 1z"/></svg>
                    </div>
                    <div>
                        <p class="font-bold">{{ session('status') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if ($errors->any())
            <div class="mt-4 bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
                <div class="flex">
                   
                    <div>
                        <p class="font-bold text-red-500">{{ $errors->first('email') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="mt-4">
            @csrf

            <div>
                <label class="label">
                    <span class="text-base label-text dark:text-gray-100">Email Address</span>
                </label>
                <input name="email" type="email" placeholder="Email Address" class="w-full input input-bordered dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100" required/>
            </div>

            <div class="mt-4">
                <button type="submit" class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    Send Password Reset Link
                </button>
            </div>
        </form>
    </div>
</div>