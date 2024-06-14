@vite('resources/css/app.css')
@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-900">
    <div class="w-full max-w-md px-8 py-6 mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-center text-gray-700 dark:text-gray-100">Verify Your Email Address</h1>
        
        @if (session('resent'))
            <div class="mt-4 bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md" role="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M16.707 3.293a1 1 0 0 1 0 1.414L9 12.414 7.293 10.707a1 1 0 0 1 1.414-1.414L9 9.586l6.293-6.293a1 1 0 0 1 1.414 0zM9 16a1 1 0 0 0 1-1v-4a1 1 0 1 0-2 0v4a1 1 0 0 0 1 1z"/></svg></div>
                    <div>
                        <p class="font-bold">A fresh verification link has been sent to your email address.</p>
                        <p class="text-sm">Please check your email and follow the instructions to verify your account.</p>
                    </div>
                </div>
            </div>
        @endif

        <p class="mt-4 text-gray-600 dark:text-gray-300">
            Before proceeding, please check your email for a verification link. If you did not receive the email, you can request another by clicking the button below.
        </p>

        <form method="POST" action="{{ route('verification.resend') }}" class="mt-4">
            @csrf
            <button type="submit" class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                Resend Verification Email
            </button>
        </form>
    </div>
</div>


