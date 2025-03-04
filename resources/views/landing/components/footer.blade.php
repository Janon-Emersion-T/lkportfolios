
<footer class="bg-sky-950 text-white text-center py-10">
    <!-- Logo and Tagline -->
    <div class="container mx-auto flex flex-col items-center px-6">
        <a href="{{route('welcome')}}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-20 w-auto lg:h-24">
        </a>
        <p class="mt-2 max-w-md text-lg font-semibold text-gray-300">
            Empowering professionals to achieve success.
        </p>
    </div>

    <!-- Social Media Icons -->
    <div class="mt-6 flex justify-center space-x-4 ">
        <a href="#" class="social-icon bg-[#1877F2] hover:bg-[#165DC4]"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="social-icon bg-black hover:bg-gray-800"><i class="fab fa-x-twitter"></i></a>
        <a href="#" class="social-icon bg-gradient-to-r from-[#F58529] via-[#DD2A7B] to-[#8134AF] hover:opacity-80"><i class="fab fa-instagram"></i></a>
        <a href="#" class="social-icon bg-[#0A66C2] hover:bg-[#004182]"><i class="fab fa-linkedin-in"></i></a>
        <a href="https://wa.me/94761234321" target="_blank" class="social-icon bg-[#25D366] hover:bg-[#1DA851]"><i class="fab fa-whatsapp"></i></a>
    </div>

    <!-- Newsletter sign-up form -->
    {{-- <div>
            <form action="">
                <div class="gird-cols-1 grid items-center justify-center gap-4 md:grid-cols-3">
                    <div class="md:mb-6 md:ms-auto">
                        <p>
                            <strong>Sign up for our newsletter</strong>
                        </p>
                    </div>

                    <!-- Newsletter sign-up input field -->
                    <div class="relative md:mb-6" data-twe-input-wrapper-init>
                        <input type="email" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0" id="exampleFormControlInputEmail" placeholder="Email address" />
                        <label for="exampleFormControlInputEmail" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">Email address
                        </label>
                    </div>

                    <!-- Newsletter sign-up submit button -->
                    <div class="mb-6 md:me-auto">
                        <button type="submit" class="inline-block rounded px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-surface shadow-dark-3 shadow-black/30 transition duration-150 ease-in-out hover:shadow-dark-1 focus:shadow-dark-1 focus:outline-none focus:ring-0 active:shadow-1 dark:bg-neutral-700 dark:text-white" data-twe-ripple-init data-twe-ripple-color="light">
                            Subscribe
                        </button>
                    </div>
                </div>
            </form>
        </div> --}}

    <!-- Links Section -->
    <div class="container mx-auto grid grid-cols-1 gap-8 px-6 pt-10 md:grid-cols-2 lg:grid-cols-4 text-left">
        <!-- Company Details -->
        <div>
            <h5 class="mb-3 text-lg font-bold uppercase">LKPortfolios</h5>
            <p class="text-gray-400">LKPortfolios is a product of <span class="font-semibold">LKProfessionals (Pvt) Ltd</span>.</p>
            <ul class="mt-3 space-y-2 text-gray-300">
                <li><strong>Address:</strong> 6/7, Vidhan's Lane, Eachchamoddai, Jaffna - 40000, Sri Lanka</li>
                <li><strong>Email:</strong> <a href="mailto:info@lkprofessionals.com" class="hover:underline">info@lkprofessionals.com</a></li>
                <li><strong>Phone:</strong> <a href="tel:+94761234321" class="hover:underline">+94 76 123 4321</a></li>
                <li><strong>Website:</strong> <a href="https://www.lkprofessionals.com" target="_blank" class="hover:underline">www.lkprofessionals.com</a></li>
            </ul>
        </div>

        <!-- Quick Links -->
        <div>
            <h5 class="mb-3 text-lg font-bold uppercase">Quick Links</h5>
            <ul class="space-y-2 text-gray-300">
                <li><a href="{{route('welcome')}}" class="hover:underline">Home</a></li>
                <li><a href="{{route('about')}}" class="hover:underline">About Us</a></li>
                <li><a href="{{route('candidates')}}" class="hover:underline">Services For Candidates</a></li>
                <li><a href="{{route('companies')}}" class="hover:underline">Services for Companies</a></li>
                <li><a href="{{route('blogs')}}" class="hover:underline">Blogs</a></li>
                <li><a href="{{route('contact')}}" class="hover:underline">Contact Us</a></li>
            </ul>
        </div>

        <!-- Our Services -->
        <div>
            <h5 class="mb-3 text-lg font-bold uppercase">Our Services</h5>
            <ul class="space-y-2 text-gray-300">
                <li><a href="{{route('resume_creater')}}" class="hover:underline">Resume Creator</a></li>
                <li><a href="{{route('portfolio_generator')}}" class="hover:underline">Portfolio Generator</a></li>
                <li><a href="{{route('cover_letter_generator')}}" class="hover:underline">Cover Letter Generator</a></li>
                <li><a href="{{route('job_search')}}" class="hover:underline">Job Search</a></li>
            </ul>
        </div>

        <!-- Support -->
        <div>
            <h5 class="mb-3 text-lg font-bold uppercase">Support</h5>
            <ul class="space-y-2 text-gray-300">
                <li><a href="{{route('terms_of_service')}}" class="hover:underline">Terms of Service</a></li>
                <li><a href="{{route('privacy_policy')}}" class="hover:underline">Privacy Policy</a></li>
                <li><a href="{{route('cookie_policy')}}" class="hover:underline">Cookie Policy</a></li>
                <li><a href="{{route('refund_and_cancellation_policy')}}" class="hover:underline">Refund and Cancellation Policy</a></li>
                <li><a href="{{route('disclaimer')}}" class="hover:underline">Disclaimer</a></li>
            </ul>
        </div>
    </div>

    <!-- Copyright Section -->
    <div class="mt-10 w-full bg-gray-900 py-4 text-lg text-center text-gray-400">
        &copy; <span id="year"></span> <a href="https://lkportfolios.com/" class="font-semibold">LKPortfolios</a>. All rights reserved.<br>
        Powered by <a href="https://lkprofessionals.com/" terget="_blank" class="font-semibold">LKProfessionals (Pvt) Ltd</a>.
    </div>
</footer>

<!-- JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('year').textContent = new Date().getFullYear();
    });

</script>

<style>
    .social-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        color: white;
        font-size: 1.25rem;
        transition: background 0.3s ease-in-out;
    }

</style>
