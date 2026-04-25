<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - USM Pharmacy</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
        .text-gradient {
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-green-50 via-yellow-50 to-green-50 min-h-screen flex items-center justify-center p-4" x-data="{ showPassword: false }">
    <div class="max-w-md w-full">
        <!-- Logo/Header Area -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center gap-3 mb-2">
                <img src="{{ asset('images/usm_logo.png') }}" alt="USM Logo" class="h-16 w-auto">
                <div class="text-left">
                    <span class="bg-gradient-to-r from-green-800 via-green-700 to-green-600 text-gradient font-bold text-2xl block leading-tight">
                        USM Pharmacy
                    </span>
                    <span class="text-xs text-green-700 font-medium">
                        University of Southern Mindanao
                    </span>
                </div>
            </div>
        </div>

        <!-- Login Card -->
        <div class="bg-white rounded-xl shadow-2xl overflow-hidden border-b-8 border-yellow-500">
            <div class="bg-gradient-to-r from-green-800 via-green-700 to-green-600 text-white p-6 border-b-4 border-yellow-500">
                <h2 class="text-2xl font-bold mb-1 bg-gradient-to-r from-yellow-300 via-yellow-400 to-orange-400 text-gradient">System Login</h2>
                <p class="text-green-100 text-sm">Authorized Access Only</p>
            </div>

            <div class="p-8">
                <!-- Errors -->
                @if ($errors->any())
                    <div class="mb-4 bg-red-50 border border-red-200 rounded-lg p-3 flex items-start gap-2">
                        <i data-lucide="alert-circle" class="text-red-600 w-5 h-5 flex-shrink-0 mt-0.5"></i>
                        <p class="text-sm text-red-700">
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </p>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Department / Role <span class="text-red-500">*</span>
                        </label>
                        <select name="role" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent bg-white" required>
                            <option value="">Select your department</option>
                            <option value="nurse">Nursing / Medical Assistant</option>
                            <option value="pharmacist">Pharmacy Department</option>
                            <option value="stockkeeper">Inventory Management</option>
                            <option value="patient">Patient Portal</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i data-lucide="mail" class="text-gray-400 w-5 h-5"></i>
                            </div>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" required autofocus>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Password <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i data-lucide="lock" class="text-gray-400 w-5 h-5"></i>
                            </div>
                            <input :type="showPassword ? 'text' : 'password'" name="password" placeholder="Enter your password" class="w-full pl-10 pr-12 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" required>
                            <button type="button" @click="showPassword = !showPassword" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                                <i x-show="!showPassword" data-lucide="eye" class="w-5 h-5"></i>
                                <i x-show="showPassword" data-lucide="eye-off" class="w-5 h-5"></i>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center gap-2 text-gray-600 cursor-pointer">
                            <input type="checkbox" name="remember" class="rounded border-gray-300 text-orange-500 focus:ring-orange-500">
                            <span>Remember me</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-green-700 hover:text-orange-500 transition-colors font-medium">Forgot password?</a>
                        @endif
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-green-600 via-yellow-500 to-orange-500 text-white py-3 rounded-full font-bold hover:from-green-700 hover:via-yellow-600 hover:to-orange-600 transition-all focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 shadow-lg">
                        Sign In to System
                    </button>
                </form>

                <div class="mt-6 pt-6 border-t border-gray-200">
                    <p class="text-xs text-gray-500 text-center mb-3">Demo Access Credentials:</p>
                    <div class="space-y-2 text-xs text-center">
                        <div class="grid grid-cols-2 gap-2">
                            <div class="bg-green-50 p-2 rounded border border-green-700">
                                <span class="font-medium text-green-900 block">Nurse:</span>
                                <span class="text-gray-700">nurse001 / nurse123</span>
                            </div>
                            <div class="bg-yellow-50 p-2 rounded border border-yellow-500">
                                <span class="font-medium text-yellow-900 block">Pharmacist:</span>
                                <span class="text-gray-700">pharm001 / pharm123</span>
                            </div>
                            <div class="bg-green-50 p-2 rounded border border-green-700">
                                <span class="font-medium text-green-900 block">Stock Keeper:</span>
                                <span class="text-gray-700">stock001 / stock123</span>
                            </div>
                            <div class="bg-yellow-50 p-2 rounded border border-yellow-500">
                                <span class="font-medium text-yellow-900 block">Patient:</span>
                                <span class="text-gray-700">patient001 / patient123</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Don't have an account? 
                        <a href="{{ url('/') }}" class="text-green-700 font-bold hover:text-orange-500 transition-colors">Sign up here</a>
                    </p>
                </div>
            </div>

            <div class="bg-gray-50 px-8 py-4 border-t border-gray-200">
                <p class="text-xs text-center text-gray-600 flex items-center justify-center gap-1">
                    <i data-lucide="shield-check" class="w-3 h-3"></i>
                    Secure SSL encrypted connection.
                </p>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-8 text-center text-xs text-gray-500">
            <p>&copy; 2026 University of Southern Mindanao Pharmacy.</p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            lucide.createIcons();
        });
    </script>
</body>
</html>
