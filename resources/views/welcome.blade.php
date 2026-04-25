<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>USM Pharmacy Management System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
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
<body class="bg-white" x-data="{ showLoginModal: false, showMobileMenu: false, showPassword: false }">
    <!-- Header -->
    <header class="bg-gradient-to-r from-green-800 via-green-700 to-green-600 shadow-lg sticky top-0 z-40 border-b-4 border-yellow-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between py-3">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/usm_logo.png') }}" alt="USM Logo" class="h-14 w-auto">
                    <div>
                        <span class="bg-gradient-to-r from-yellow-300 via-yellow-400 to-orange-400 text-gradient font-bold text-lg block leading-tight">
                            USM Pharmacy
                        </span>
                        <span class="text-xs text-green-100">
                            University of Southern Mindanao
                        </span>
                    </div>
                </div>

                <nav class="hidden md:flex items-center gap-8 text-green-50 text-sm font-medium">
                    <a href="#home" class="hover:text-yellow-400 transition-colors">Home</a>
                    <a href="#about" class="hover:text-yellow-400 transition-colors">About</a>
                    <a href="#services" class="hover:text-yellow-400 transition-colors">Services</a>
                    <a href="#contact" class="hover:text-yellow-400 transition-colors">Contact</a>
                </nav>

                <div class="flex items-center gap-4">
                    <button @click="showLoginModal = true" class="hidden md:block bg-gradient-to-r from-yellow-400 via-yellow-500 to-orange-500 text-green-900 px-6 py-2 rounded-full font-bold hover:from-yellow-500 hover:via-orange-500 hover:to-orange-600 transition-all shadow-lg">
                        Login
                    </button>
                    <button @click="showMobileMenu = !showMobileMenu" class="md:hidden text-white">
                        <i x-show="!showMobileMenu" data-lucide="menu"></i>
                        <i x-show="showMobileMenu" data-lucide="x"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div x-show="showMobileMenu" x-collapse class="md:hidden pb-4 border-t border-green-600 pt-4">
                <nav class="flex flex-col gap-3 text-green-50">
                    <a href="#home" class="hover:text-yellow-400 transition-colors">Home</a>
                    <a href="#about" class="hover:text-yellow-400 transition-colors">About</a>
                    <a href="#services" class="hover:text-yellow-400 transition-colors">Services</a>
                    <a href="#contact" class="hover:text-yellow-400 transition-colors">Contact</a>
                    <button @click="showLoginModal = true; showMobileMenu = false" class="bg-gradient-to-r from-yellow-400 via-yellow-500 to-orange-500 text-green-900 px-6 py-2 rounded-full font-bold hover:from-yellow-500 hover:via-orange-500 hover:to-orange-600 transition-all text-left shadow-lg">
                        Login
                    </button>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class="relative bg-gradient-to-br from-green-50 via-yellow-50 to-green-50 overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-yellow-200 rounded-full -translate-y-1/2 translate-x-1/2 opacity-40"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-green-200 rounded-full translate-y-1/2 -translate-x-1/2 opacity-40"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="z-10">
                    <div class="mb-6">
                        <div class="flex items-center gap-2 mb-4">
                            <div class="h-1 w-12 bg-gradient-to-r from-green-600 via-yellow-500 to-orange-500 rounded"></div>
                            <span class="text-sm font-bold bg-gradient-to-r from-green-700 to-green-600 text-gradient uppercase tracking-wide">
                                USM Pharmacy Management
                            </span>
                        </div>
                        <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
                            <span class="text-green-800">Choose a</span>
                            <br />
                            <span class="bg-gradient-to-r from-green-600 via-yellow-500 to-orange-500 text-gradient">
                                Better System
                            </span>
                        </h1>
                        <p class="text-lg text-gray-600 mb-8 max-w-lg">
                            Live better with University of Southern Mindanao's integrated pharmacy management system. Streamlined prescription handling, inventory control, and patient care.
                        </p>
                        <button @click="showLoginModal = true" class="bg-gradient-to-r from-green-600 via-yellow-500 to-orange-500 text-white px-8 py-3 rounded-full font-bold hover:from-green-700 hover:via-yellow-600 hover:to-orange-600 transition-all shadow-xl hover:shadow-2xl">
                            Start Now →
                        </button>
                    </div>
                </div>

                <div class="relative">
                    <div class="bg-gradient-to-br from-yellow-100 via-green-50 to-green-100 rounded-3xl p-8 h-96 flex items-center justify-center relative overflow-hidden border-4 border-transparent bg-clip-padding" style="border-image: linear-gradient(135deg, #166534, #eab308, #f97316) 1">
                        <div class="absolute top-8 right-8 bg-white rounded-2xl shadow-xl p-4 flex items-center gap-3 z-10 border-2 border-transparent" style="border-image: linear-gradient(to right, #eab308, #f97316) 1">
                            <div class="flex -space-x-2">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-yellow-400 to-yellow-500 border-2 border-white"></div>
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-green-600 to-green-700 border-2 border-white"></div>
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-yellow-500 to-green-600 border-2 border-white"></div>
                            </div>
                            <div>
                                <p class="text-xl font-bold text-green-800">12,398</p>
                                <p class="text-xs text-gray-600">Prescriptions</p>
                            </div>
                            <i data-lucide="check-circle" class="text-green-600 w-5 h-5"></i>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-white rounded-2xl p-6 shadow-lg border-2 border-transparent" style="border-image: linear-gradient(135deg, #eab308, #f97316) 1">
                                <div class="w-12 h-12 bg-gradient-to-br from-green-600 via-yellow-500 to-orange-500 rounded-xl mb-3 flex items-center justify-center">
                                    <i data-lucide="activity" class="text-white w-6 h-6"></i>
                                </div>
                                <p class="text-xs text-green-700 mb-1">Real-time</p>
                                <p class="font-bold text-green-900">Inventory</p>
                            </div>
                            <div class="bg-white rounded-2xl p-6 shadow-lg border-2 border-transparent" style="border-image: linear-gradient(135deg, #166534, #eab308) 1">
                                <div class="w-12 h-12 bg-gradient-to-br from-green-700 via-green-600 to-yellow-500 rounded-xl mb-3 flex items-center justify-center">
                                    <i data-lucide="shield" class="text-white w-6 h-6"></i>
                                </div>
                                <p class="text-xs text-green-700 mb-1">Secure</p>
                                <p class="font-bold text-green-900">Access</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats -->
            <div class="mt-16 bg-gradient-to-r from-green-800 via-green-700 to-green-600 rounded-2xl shadow-xl p-8 border-4 border-transparent" style="border-image: linear-gradient(to right, #eab308, #f97316, #ea580c) 1">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <div class="text-center">
                        <p class="text-4xl font-bold bg-gradient-to-r from-yellow-300 via-yellow-400 to-orange-400 text-gradient mb-2">15+</p>
                        <p class="text-sm text-green-100">Years Serving USM</p>
                    </div>
                    <div class="text-center">
                        <p class="text-4xl font-bold bg-gradient-to-r from-yellow-300 via-yellow-400 to-orange-400 text-gradient mb-2">98%</p>
                        <p class="text-sm text-green-100">Accuracy Rate</p>
                    </div>
                    <div class="text-center">
                        <p class="text-4xl font-bold bg-gradient-to-r from-yellow-300 via-yellow-400 to-orange-400 text-gradient mb-2">5000+</p>
                        <p class="text-sm text-green-100">Students & Staff Served</p>
                    </div>
                    <div class="text-center">
                        <p class="text-4xl font-bold bg-gradient-to-r from-yellow-300 via-yellow-400 to-orange-400 text-gradient mb-2">24/7</p>
                        <p class="text-sm text-green-100">System Availability</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="relative">
                    <div class="bg-gradient-to-br from-orange-50 to-green-50 rounded-3xl p-8 h-96 flex items-center justify-center relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-orange-100 rounded-full -translate-y-1/2 translate-x-1/2 opacity-40"></div>
                        <div class="absolute bottom-0 left-0 w-24 h-24 bg-orange-200 rounded-full translate-y-1/2 -translate-x-1/2 opacity-30"></div>
                        <div class="text-center z-10">
                            <div class="inline-flex items-center justify-center w-32 h-32 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-3xl mb-4 shadow-xl">
                                <i data-lucide="stethoscope" class="text-white w-16 h-16"></i>
                            </div>
                            <p class="text-gray-700 font-medium">Your Health, Our Priority</p>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="mb-6">
                        <div class="flex items-center gap-2 mb-4">
                            <div class="h-1 w-12 bg-gradient-to-r from-yellow-500 to-orange-500 rounded"></div>
                            <span class="text-sm font-medium text-green-800 uppercase tracking-wide">About USM Pharmacy</span>
                        </div>
                        <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Dedicated to student and staff wellness</h2>
                        <p class="text-gray-600 leading-relaxed mb-6">
                            The University of Southern Mindanao Pharmacy provides comprehensive pharmaceutical services to the USM community. Our team of licensed pharmacists ensures safe, effective medication management.
                        </p>
                        <p class="text-gray-600 leading-relaxed mb-6">
                            With our modern pharmacy management system, we streamline prescription processing, maintain optimal inventory levels, and deliver exceptional patient care.
                        </p>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex items-start gap-3">
                                <div class="bg-orange-50 p-2 rounded-lg">
                                    <i data-lucide="check-circle" class="text-green-700 w-5 h-5"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">Licensed Pharmacists</p>
                                    <p class="text-sm text-gray-600">Professional staff</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="bg-orange-50 p-2 rounded-lg">
                                    <i data-lucide="check-circle" class="text-green-700 w-5 h-5"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">Quality Medicines</p>
                                    <p class="text-sm text-gray-600">FDA approved</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 bg-gradient-to-br from-slate-50 to-green-50/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <div class="flex items-center justify-center gap-2 mb-4">
                    <div class="h-1 w-12 bg-gradient-to-r from-yellow-500 to-orange-500 rounded"></div>
                    <span class="text-sm font-medium text-green-800 uppercase tracking-wide">Our Services</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900">System Features</h2>
                <p class="text-gray-600 mt-4 max-w-2xl mx-auto">Comprehensive pharmacy management tools designed for efficiency and patient safety</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Prescription Management -->
                <div class="bg-white rounded-2xl p-6 border border-gray-200 hover:border-orange-300 transition-all hover:shadow-xl group">
                    <div class="bg-gradient-to-br from-amber-100 to-amber-200 w-16 h-16 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <i data-lucide="activity" class="text-green-800 w-8 h-8"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 text-lg mb-2">Prescription Management</h3>
                    <p class="text-sm text-gray-600">Route and process prescriptions seamlessly from nursing stations to pharmacy</p>
                </div>

                <!-- Inventory Control -->
                <div class="bg-white rounded-2xl p-6 border border-gray-200 hover:border-orange-300 transition-all hover:shadow-xl group">
                    <div class="bg-gradient-to-br from-blue-100 to-blue-200 w-16 h-16 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <i data-lucide="shield" class="text-blue-700 w-8 h-8"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 text-lg mb-2">Inventory Control</h3>
                    <p class="text-sm text-gray-600">Real-time stock monitoring with automated reorder alerts and reporting</p>
                </div>

                <!-- Patient Portal -->
                <div class="bg-white rounded-2xl p-6 border border-gray-200 hover:border-orange-300 transition-all hover:shadow-xl group">
                    <div class="bg-gradient-to-br from-green-100 to-green-200 w-16 h-16 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <i data-lucide="users" class="text-green-700 w-8 h-8"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 text-lg mb-2">Patient Portal</h3>
                    <p class="text-sm text-gray-600">Access medical history, prescriptions, and AI health assistant for students</p>
                </div>

                <!-- POS System -->
                <div class="bg-white rounded-2xl p-6 border border-gray-200 hover:border-orange-300 transition-all hover:shadow-xl group">
                    <div class="bg-gradient-to-br from-purple-100 to-purple-200 w-16 h-16 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <i data-lucide="heart" class="text-purple-700 w-8 h-8"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 text-lg mb-2">POS System</h3>
                    <p class="text-sm text-gray-600">Integrated point-of-sale for efficient transaction processing and billing</p>
                </div>

                <!-- Role-Based Access -->
                <div class="bg-white rounded-2xl p-6 border border-gray-200 hover:border-orange-300 transition-all hover:shadow-xl group">
                    <div class="bg-gradient-to-br from-pink-100 to-pink-200 w-16 h-16 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <i data-lucide="stethoscope" class="text-pink-700 w-8 h-8"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 text-lg mb-2">Role-Based Access</h3>
                    <p class="text-sm text-gray-600">Secure access control for nurses, pharmacists, stock keepers, and patients</p>
                </div>

                <!-- Reports & Analytics -->
                <div class="bg-white rounded-2xl p-6 border border-gray-200 hover:border-orange-300 transition-all hover:shadow-xl group">
                    <div class="bg-gradient-to-br from-orange-100 to-orange-200 w-16 h-16 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <i data-lucide="brain" class="text-orange-700 w-8 h-8"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 text-lg mb-2">Reports & Analytics</h3>
                    <p class="text-sm text-gray-600">Generate comprehensive reports for decision support and compliance</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact CTA Section -->
    <section id="contact" class="py-20 bg-gradient-to-br from-green-800 via-green-700 to-green-600 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-gradient-to-br from-yellow-400/30 to-orange-500/20 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-gradient-to-tr from-orange-400/20 to-yellow-300/10 rounded-full translate-y-1/2 -translate-x-1/2 blur-3xl"></div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white relative z-10">
            <h2 class="text-4xl font-bold mb-4 bg-gradient-to-r from-yellow-300 via-yellow-400 to-orange-400 text-gradient">
                Ready to Access USM Pharmacy System?
            </h2>
            <p class="text-lg mb-8 text-green-100">Login to manage prescriptions, inventory, and patient care with our modern platform</p>
            <button @click="showLoginModal = true" class="bg-gradient-to-r from-green-600 via-yellow-500 to-orange-500 text-white px-8 py-4 rounded-full font-bold text-lg hover:from-green-700 hover:via-yellow-600 hover:to-orange-600 transition-all shadow-xl hover:shadow-2xl hover:scale-105">
                Login to System →
            </button>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <img src="{{ asset('images/usm_logo.png') }}" alt="USM Logo" class="h-10 w-auto">
                        <span class="font-bold text-lg bg-gradient-to-r from-yellow-300 via-yellow-400 to-orange-400 text-gradient">USM Pharmacy</span>
                    </div>
                    <p class="text-gray-400 text-sm">University of Southern Mindanao's integrated pharmacy management system. Serving our community since 2009.</p>
                </div>

                <div>
                    <h4 class="font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="#about" class="hover:text-yellow-400 transition-colors">About Us</a></li>
                        <li><a href="#services" class="hover:text-yellow-400 transition-colors">Services</a></li>
                        <li><a href="#contact" class="hover:text-yellow-400 transition-colors">Contact</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-semibold mb-4">Services</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li>Prescription Services</li>
                        <li>Inventory Management</li>
                        <li>Patient Portal</li>
                        <li>Health Consultation</li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-semibold mb-4">Contact Us</h4>
                    <div class="space-y-2 text-sm text-gray-400">
                        <div class="flex items-center gap-2">
                            <i data-lucide="phone" class="w-4 h-4"></i>
                            <span>(083) 227-8192</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i data-lucide="mail" class="w-4 h-4"></i>
                            <span>pharmacy@usm.edu.ph</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i data-lucide="clock" class="w-4 h-4"></i>
                            <span>Mon-Fri: 8AM-5PM</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-8 text-center text-sm text-gray-400">
                <p>&copy; 2026 University of Southern Mindanao Pharmacy. All rights reserved. | Privacy Policy | Terms of Service</p>
            </div>
        </div>
    </footer>

    <!-- Login Modal -->
    <div x-show="showLoginModal" 
         class="fixed inset-0 bg-black/50 flex items-center justify-center p-4 z-50 overflow-y-auto"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         @click.away="showLoginModal = false"
         style="display: none;">
        
        <div class="bg-white rounded-xl shadow-2xl max-w-md w-full my-8 relative">
            <div class="bg-gradient-to-r from-green-800 via-green-700 to-green-600 text-white p-6 flex justify-between items-center border-b-4 border-yellow-500 rounded-t-xl">
                <div>
                    <h2 class="text-2xl font-bold mb-1 bg-gradient-to-r from-yellow-300 via-yellow-400 to-orange-400 text-gradient">System Login</h2>
                    <p class="text-green-100 text-sm">USM Pharmacy - Authorized Access</p>
                </div>
                <button @click="showLoginModal = false" class="text-white hover:bg-white/20 p-2 rounded-lg transition-colors">
                    <i data-lucide="x" class="w-6 h-6"></i>
                </button>
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
                            <input type="email" name="email" placeholder="Enter your email" class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" required>
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

                    <button type="submit" class="w-full bg-gradient-to-r from-green-600 via-yellow-500 to-orange-500 text-white py-3 rounded-full font-bold hover:from-green-700 hover:via-yellow-600 hover:to-orange-600 transition-all focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 shadow-lg">
                        Sign In to System
                    </button>
                </form>

                <div class="mt-6 pt-6 border-t border-gray-200">
                    <p class="text-xs text-gray-500 text-center mb-3">Demo Access Credentials:</p>
                    <div class="space-y-2 text-xs">
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
            </div>

            <div class="bg-gray-50 px-8 py-4 border-t border-gray-200 rounded-b-xl">
                <p class="text-xs text-center text-gray-600 flex items-center justify-center gap-1">
                    <i data-lucide="lock" class="w-3 h-3"></i>
                    Secure connection. Unauthorized access prohibited.
                </p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            lucide.createIcons();
        });
    </script>
</body>
</html>
