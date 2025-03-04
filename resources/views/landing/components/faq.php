<!-- FAQ Section -->
<section class="bg-white py-24 px-6 sm:px-8 lg:px-12">
  <div class="max-w-6xl mx-auto">
    <h2 class="text-3xl font-bold text-zinc-900 text-center mb-12 lg:mb-16">
      Frequently Asked Questions
    </h2>

    <div class="grid gap-8 md:grid-cols-2 md:gap-12">
      <!-- FAQ Column 1 -->
      <div class="space-y-6">
        <!-- FAQ Item -->
        <div class="group border border-zinc-300 rounded-lg shadow-sm transition hover:shadow-md">
          <button class="w-full flex justify-between items-center p-5 gap-4 focus:outline-none"
                  aria-expanded="false"
                  aria-controls="faq-1">
            <span class="text-left text-lg font-semibold text-zinc-900">
              What is LKPortfolios?
            </span>
            <span class="shrink-0">
              <svg class="w-6 h-6 text-zinc-500 transition-transform transform"
                   fill="none"
                   viewBox="0 0 24 24"
                   stroke="currentColor">
                <path stroke-linecap="round" 
                      stroke-linejoin="round" 
                      stroke-width="2" 
                      d="M19 9l-7 7-7-7"/>
              </svg>
            </span>
          </button>
          <div id="faq-1" class="hidden px-5 pb-5 text-zinc-600">
            LKPortfolios is a platform designed for professionals, businesses, and freelancers to create and manage their online portfolios effectively.
          </div>
        </div>

        <!-- FAQ Item -->
        <div class="group border border-zinc-300 rounded-lg shadow-sm transition hover:shadow-md">
          <button class="w-full flex justify-between items-center p-5 gap-4 focus:outline-none"
                  aria-expanded="false"
                  aria-controls="faq-2">
            <span class="text-left text-lg font-semibold text-zinc-900">
              Is LKPortfolios free to use?
            </span>
            <span class="shrink-0">
              <svg class="w-6 h-6 text-zinc-500 transition-transform transform"
                   fill="none"
                   viewBox="0 0 24 24"
                   stroke="currentColor">
                <path stroke-linecap="round" 
                      stroke-linejoin="round" 
                      stroke-width="2" 
                      d="M19 9l-7 7-7-7"/>
              </svg>
            </span>
          </button>
          <div id="faq-2" class="hidden px-5 pb-5 text-zinc-600">
            We offer both free and premium plans. The free plan includes basic portfolio features, while premium plans provide additional customization and storage.
          </div>
        </div>
      </div>

      <!-- FAQ Column 2 -->
      <div class="space-y-6">
        <!-- FAQ Item -->
        <div class="group border border-zinc-300 rounded-lg shadow-sm transition hover:shadow-md">
          <button class="w-full flex justify-between items-center p-5 gap-4 focus:outline-none"
                  aria-expanded="false"
                  aria-controls="faq-3">
            <span class="text-left text-lg font-semibold text-zinc-900">
              How do I create an account?
            </span>
            <span class="shrink-0">
              <svg class="w-6 h-6 text-zinc-500 transition-transform transform"
                   fill="none"
                   viewBox="0 0 24 24"
                   stroke="currentColor">
                <path stroke-linecap="round" 
                      stroke-linejoin="round" 
                      stroke-width="2" 
                      d="M19 9l-7 7-7-7"/>
              </svg>
            </span>
          </button>
          <div id="faq-3" class="hidden px-5 pb-5 text-zinc-600">
            Click on **Sign Up**, fill in your details, verify your email, and start building your portfolio immediately.
          </div>
        </div>

        <!-- FAQ Item -->
        <div class="group border border-zinc-300 rounded-lg shadow-sm transition hover:shadow-md">
          <button class="w-full flex justify-between items-center p-5 gap-4 focus:outline-none"
                  aria-expanded="false"
                  aria-controls="faq-4">
            <span class="text-left text-lg font-semibold text-zinc-900">
              Can I customize my portfolio layout?
            </span>
            <span class="shrink-0">
              <svg class="w-6 h-6 text-zinc-500 transition-transform transform"
                   fill="none"
                   viewBox="0 0 24 24"
                   stroke="currentColor">
                <path stroke-linecap="round" 
                      stroke-linejoin="round" 
                      stroke-width="2" 
                      d="M19 9l-7 7-7-7"/>
              </svg>
            </span>
          </button>
          <div id="faq-4" class="hidden px-5 pb-5 text-zinc-600">
            Yes! We offer multiple templates and customization tools to help you create a unique and professional portfolio.
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const faqButtons = document.querySelectorAll('[aria-controls^="faq-"]');

  faqButtons.forEach(button => {
    button.addEventListener('click', toggleFAQ);
    button.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') toggleFAQ(e);
    });
  });

  function toggleFAQ(e) {
    e.preventDefault();
    const button = e.currentTarget;
    const targetId = button.getAttribute('aria-controls');
    const answer = document.getElementById(targetId);
    const isExpanded = button.getAttribute('aria-expanded') === 'true';

    // Close all other FAQs before opening the clicked one
    faqButtons.forEach(btn => {
      const answerToClose = document.getElementById(btn.getAttribute('aria-controls'));
      btn.setAttribute('aria-expanded', 'false');
      answerToClose.classList.add('hidden');
      btn.querySelector('svg').classList.remove('rotate-180');
    });

    // Toggle selected FAQ
    button.setAttribute('aria-expanded', !isExpanded);
    answer.classList.toggle('hidden');
    button.querySelector('svg').classList.toggle('rotate-180');
  }
});
</script>
