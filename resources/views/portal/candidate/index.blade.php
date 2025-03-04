@extends('portal.components.layout')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 transition-colors duration-500">
    <div class="w-full pt-16 xl:pl-72 lg:pl-72 sm:pl-3 px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8 mt-8">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white">
                <span class="text-blue-600 dark:text-blue-400">Dashboard</span>
            </h1>
            <div class="hidden sm:flex items-center space-x-4">
                <button class="bg-white dark:bg-gray-800 p-3 rounded-lg shadow-sm hover:shadow-lg hover:translate-y-1 transform transition-all duration-300 relative">
                    <i class="fas fa-bell text-gray-500 dark:text-gray-400 text-lg"></i>
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
                </button>
                <button class="bg-white dark:bg-gray-800 p-3 rounded-lg shadow-sm hover:shadow-lg hover:translate-y-1 transform transition-all duration-300" onclick="toggleDarkMode()">
                    <i class="fas fa-moon text-gray-500 dark:text-gray-400 text-lg dark:hidden"></i>
                    <i class="fas fa-sun text-amber-400 hidden dark:block text-lg"></i>
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-5">
            @php
            $cards = [
            ['Education', 'EducationCount', 'blue', 'fa-graduation-cap', 'Complete your educational background', true],
            ['Skills', 'SkillCount', 'emerald', 'fa-tools', 'Add skills to enhance your profile', true],
            ['Experience', 'ExperienceCount', 'purple', 'fa-briefcase', 'Share your work history', true],
            ['Careerbreak', 'CareerbreakCount', 'amber', 'fa-clock', 'Document career transitions', true],
            ['Honors', 'HonorsCount', 'red', 'fa-award', 'Showcase your achievements', true],
            ['License', 'LicenseCount', 'cyan', 'fa-certificate', 'Add professional certifications', true],
            ['Organizations', 'OrganizationCount', 'orange', 'fa-building', 'List affiliated organizations', true],
            ['Patents', 'PatentCount', 'pink', 'fa-lightbulb', 'Document your innovations', true],
            ['Publications', 'PublicationCount', 'teal', 'fa-book', 'Share your published work', true],
            ['Recommendations', 'RecommendationCount', 'indigo', 'fa-thumbs-up', 'Add professional endorsements', true],
            ['Social', 'SocialCount', 'slate', 'fa-users', 'Connect your social profiles', true],
            ['Test', 'TestCount', 'lime', 'fa-vial', 'Add assessment results', true],
            ['Volunteer Work', 'VolunteerCount', 'amber', 'fa-hand-holding-heart', 'Share your community impact', true]
            ];
            @endphp

            @foreach ($cards as [$title, $var, $color, $icon, $hint, $clickable])
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group transform hover:scale-105 hover:-translate-y-1 border-l-4 border-{{ $color }}-500">
                <div class="p-5 border border-gray-100 dark:border-gray-700 h-full flex flex-col relative">
                    <div class="flex items-center mb-3">
                        <div class="p-4 rounded-lg bg-{{ $color }}-100 dark:bg-{{ $color }}-900 bg-opacity-75 dark:bg-opacity-25 group-hover:bg-{{ $color }}-200 dark:group-hover:bg-{{ $color }}-800 transition-colors duration-300 transform group-hover:scale-110 group-hover:rotate-3">
                            <i class="fas {{ $icon }} text-{{ $color }}-600 dark:text-{{ $color }}-400 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">
                                {{ $title }}
                            </p>
                            <p class="text-2xl font-semibold text-gray-900 dark:text-white group-hover:text-{{ $color }}-600 dark:group-hover:text-{{ $color }}-400 transition-colors duration-300">
                                {{ ${$var} }}
                            </p>
                        </div>
                    </div>
                    <div class="mt-auto opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                        <p class="text-xs text-gray-500 dark:text-gray-400">{{ $hint }}</p>
                        @if (${$var} == 0)
                        <span class="inline-block mt-2 text-xs bg-{{ $color }}-100 dark:bg-{{ $color }}-900 text-{{ $color }}-800 dark:text-{{ $color }}-200 px-2 py-1 rounded-full animate-pulse">Action needed</span>
                        @endif
                    </div>
                    @if ($clickable)
                    <a href="{{-- {{ route(strtolower($title).'.index') }} --}}" class="absolute inset-0 cursor-pointer" aria-label="View {{ $title }}"></a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-10 bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 p-6 border border-gray-100 dark:border-gray-700 transform hover:scale-101">
            <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Profile Completion</h2>
            @php
            $completedSections = 0;
            $totalSections = count($cards);

            foreach ($cards as [$title, $var, $color, $icon, $hint]) {
            if (${$var} > 0) {
            $completedSections++;
            }
            }

            $completionPercentage = min(100, round(($completedSections / $totalSections) * 100));

            // Determine color based on completion
            $progressColor = 'red';
            if ($completionPercentage > 25) $progressColor = 'amber';
            if ($completionPercentage > 50) $progressColor = 'yellow';
            if ($completionPercentage > 75) $progressColor = 'green';
            if ($completionPercentage == 100) $progressColor = 'emerald';
            @endphp

            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3 overflow-hidden">
                <div class="bg-{{ $progressColor }}-500 h-3 rounded-full transition-all duration-1000 ease-out" style="width: {{ $completionPercentage }}%"></div>
            </div>
            <div class="flex justify-between mt-2">
                <span class="text-sm text-gray-500 dark:text-gray-400">Profile Strength</span>
                <span class="text-sm font-medium text-{{ $progressColor }}-600 dark:text-{{ $progressColor }}-400">{{ $completionPercentage }}%</span>
            </div>

            <div class="mt-4">
                <p class="text-sm text-gray-600 dark:text-gray-300">
                    @if ($completionPercentage < 25) Let's get started building your profile! @elseif ($completionPercentage < 50) Good start! Continue adding details to stand out. @elseif ($completionPercentage < 75) You're making great progress! @elseif ($completionPercentage < 100) Almost there! Just a few more sections to complete. @else Excellent! Your profile is fully completed. @endif </p>
            </div>

            <div class="mt-3 text-center">
                <button class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md shadow-sm hover:shadow-md transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-magic mr-2"></i> Enhance Profile
                </button>
            </div>
        </div>

        <div class="mt-8 mb-10 text-center text-gray-500 dark:text-gray-400 text-xs">
            <p>Last updated: {{ now()->format('F d, Y') }}</p>
        </div>
    </div>
</div>

<script>
    // Check for saved theme preference or use system preference
    if (localStorage.getItem('theme') === 'dark' ||
        (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }

    // Listen for changes in system dark mode preference if no manual preference is set
    if (!localStorage.getItem('theme')) {
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', event => {
            if (event.matches) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        });
    }

    // Toggle theme function for a theme switcher
    function toggleDarkMode() {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        }
    }

    // Add entrance animations for cards
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.grid > div');
        cards.forEach((card, index) => {
            setTimeout(() => {
                card.classList.add('animate-fadeIn');
            }, 100 * index);
        });
    });

</script>

<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fadeIn {
        animation: fadeIn 0.5s ease-out forwards;
    }

    .animate-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }

    @keyframes pulse {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0.7;
        }
    }

    .scale-101 {
        transform: scale(1.01);
    }

    .scale-102 {
        transform: scale(1.02);
    }

    .scale-105 {
        transform: scale(1.05);
    }

</style>
@endsection
