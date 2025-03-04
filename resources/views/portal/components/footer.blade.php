<footer class="rounded-lg shadow md:flex md:items-center md:justify-between bg-gray-800 p-4  xl:px-72 lg:px-72 font-bold">
    <div class="flex flex-col md:flex-row md:items-center w-full justify-between">
        <!-- Left Section -->
        <div class="text-center md:text-left">
            <p class="text-sm text-gray-100">
                &copy; <span id="year"></span> 
                <a href="{{route('welcome')}}" class="hover:underline" target="_blank">lkportfolios.com</a>. All rights reserved.
            </p>
        </div>

        <!-- Center Section -->
        <div class="text-center">
            <a href="{{route('terms_of_service')}}" class="text-sm text-gray-100 hover:underline">
                Our Policies
            </a>
        </div>

        <!-- Right Section -->
        <div class="text-center md:text-right">
            <p class="text-sm text-gray-100">
                Powered by <a href="https://lkprofessionals.com" target="_blank" class="hover:underline">LKProfessionals (Pvt) Ltd</a>
            </p>
        </div>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('year').textContent = new Date().getFullYear();
    });
</script>
