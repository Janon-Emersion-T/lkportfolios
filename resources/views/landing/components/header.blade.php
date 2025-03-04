<header class="bg-gray-900 shadow-md fixed w-full top-0 z-50 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-24">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{route('welcome')}}">
                    <img src="{{ asset('images/logo.png') }}" alt="LKPortfolios Logo" class="h-20 w-auto">
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center space-x-8">
                <a href="{{route('welcome')}}" class="text-gray-300 hover:text-white transition-colors duration-200 text-sm font-medium">Home</a>
                <a href="{{route('about')}}" class="text-gray-300 hover:text-white transition-colors duration-200 text-sm font-medium">About Us</a>

                <!-- Services Dropdown -->
                <div class="relative group">
                    <button class="text-gray-300 hover:text-white transition-colors duration-200 text-sm font-medium inline-flex items-center group">
                        Services
                        <svg class="ml-1 w-4 h-4 transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="absolute left-0 mt-2 w-48 rounded-md shadow-lg bg-gray-800 ring-1 ring-black ring-opacity-5 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top-right">
                        <div class="py-1">
                            <a href="{{route('candidates')}}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 transition-colors duration-200">For Candidates</a>
                            <a href="{{route('companies')}}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 transition-colors duration-200">For Companies</a>
                        </div>
                    </div>
                </div>

                <a href="{{route('blogs')}}" class="text-gray-300 hover:text-white transition-colors duration-200 text-sm font-medium">Blogs</a>
                <a href="{{route('contact')}}" class="text-gray-300 hover:text-white transition-colors duration-200 text-sm font-medium">Contact Us</a>
            </nav>

            <!-- Auth Buttons -->
            <div class="hidden md:flex items-center space-x-4">
                @auth
                <a href="{{ url('/home') }}" class="bg-green-600 text-white px-6 py-2 rounded-lg text-sm font-semibold shadow-md 
        hover:bg-green-700 hover:shadow-lg transition-all duration-300 ease-in-out transform hover:scale-105">
                    Dashboard
                </a>
                @else
                <a href="{{ route('login') }}" class="text-gray-300 px-5 py-2 text-sm font-medium rounded-md border border-gray-500
        hover:border-white hover:text-white hover:bg-gray-700 hover:shadow-lg transition-all duration-300 ease-in-out transform hover:scale-105">
                    Log in
                </a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="bg-gradient-to-r from-purple-500 to-indigo-600 text-white px-6 py-2 rounded-lg text-sm font-semibold shadow-md 
        hover:from-purple-600 hover:to-indigo-700 hover:shadow-lg transition-all duration-300 ease-in-out transform hover:scale-105">
                    Register
                </a>
                @endif
                @endauth
            </div>




            <!-- Mobile menu button -->
            <button type="button" id="mobile-menu-button" class="md:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-300 hover:text-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500 transition-colors duration-200">
                <span class="sr-only">Open main menu</span>
                <svg id="menu-icon" class="h-6 w-6 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-gray-900 border-t border-gray-800 transition-all duration-300">
        <div class="px-4 pt-2 pb-3 space-y-1">
            <a href="{{route('welcome')}}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-800 transition-colors duration-200">Home</a>
            <a href="{{route('about')}}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-800 transition-colors duration-200">About Us</a>

            <!-- Mobile Services Section -->
            <div class="space-y-1">
                <button id="mobile-services-button" class="flex justify-between items-center w-full px-3 py-2 text-base font-medium text-gray-300 hover:text-white hover:bg-gray-800 transition-colors duration-200">
                    Services
                    <svg class="w-4 h-4 transition-transform duration-200" id="services-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="mobile-services-menu" class="hidden pl-4">
                    <a href="{{route('candidates')}}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-800 transition-colors duration-200">For Candidates</a>
                    <a href="{{route('companies')}}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-800 transition-colors duration-200">For Companies</a>
                </div>
            </div>

            <a href="{{route('blogs')}}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-800 transition-colors duration-200">blogs</a>

            <a href="{{route('contact')}}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-800 transition-colors duration-200">Contact Us</a>

            <!-- Mobile Auth Links -->
            @auth
            <a href="{{ url('/home') }}" class="block px-4 py-2 rounded-lg text-base font-semibold text-white bg-green-600 
    hover:bg-green-700 hover:shadow-lg transition-all duration-300 ease-in-out transform hover:scale-105">
                Dashboard
            </a>
            @else
            <a href="{{ route('login') }}" class="block px-4 py-2 rounded-lg text-base font-medium text-gray-300 border border-gray-500
    hover:border-white hover:text-white hover:bg-gray-700 hover:shadow-lg transition-all duration-300 ease-in-out transform hover:scale-105">
                Log in
            </a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="block px-4 py-2 rounded-lg text-base font-semibold text-white bg-gradient-to-r from-purple-500 to-indigo-600
    hover:from-purple-600 hover:to-indigo-700 hover:shadow-lg transition-all duration-300 ease-in-out transform hover:scale-105">
                Register
            </a>
            @endif
            @endauth

        </div>
    </div>
</header>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const mobileMenuButton = document.getElementById("mobile-menu-button");
        const mobileMenu = document.getElementById("mobile-menu");
        const menuIcon = document.getElementById("menu-icon");

        const mobileServicesButton = document.getElementById("mobile-services-button");
        const mobileServicesMenu = document.getElementById("mobile-services-menu");
        const servicesChevron = document.getElementById("services-chevron");

        // Toggle Mobile Menu
        mobileMenuButton.addEventListener("click", () => {
            mobileMenu.classList.toggle("hidden");
            menuIcon.classList.toggle("rotate-90");
        });

        // Toggle Mobile Services Dropdown
        mobileServicesButton.addEventListener("click", () => {
            mobileServicesMenu.classList.toggle("hidden");
            servicesChevron.classList.toggle("rotate-180");
        });

        // Close mobile menu when clicking outside
        document.addEventListener("click", (event) => {
            if (!mobileMenu.contains(event.target) && !mobileMenuButton.contains(event.target)) {
                mobileMenu.classList.add("hidden");
                menuIcon.classList.remove("rotate-90");
            }
        });
    });

</script>
