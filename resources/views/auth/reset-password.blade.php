@vite('resources/css/app.css')
<div class="flex items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-900">
    <div class="w-full max-w-md px-8 py-6 mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-center text-gray-700 dark:text-gray-100">Reset Password</h1>

        <form method="POST" action="{{ route('password.update') }}" class="mt-4">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <input name="email" type="hidden" placeholder="Email Address" value="{{ request()->email }}" class="w-full input input-bordered dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100" required/>

            <div class="mt-4">
                <label class="label">
                    <span class="text-base label-text dark:text-gray-100">Password</span>
                </label>
                <input name="password" type="password" placeholder="Password" class="w-full input input-bordered dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100" required/>
            </div>

            <div class="mt-4">
                <label class="label">
                    <span class="text-base label-text dark:text-gray-100">Confirm Password</span>
                </label>
                <input name="password_confirmation" type="password" placeholder="Confirm Password" class="w-full input input-bordered dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100" required/>
            </div>

            @if ($errors->any())
                <div class="mt-4">
                    <ul class="text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mt-4">
                <button type="submit" class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    Reset Password
                </button>
            </div>
        </form>
    </div>
</div>