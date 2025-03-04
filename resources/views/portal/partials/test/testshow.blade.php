{{-- test Details View --}}
@php
    $months = [
        '1' => 'January',
        '2' => 'February',
        '3' => 'March',
        '4' => 'April',
        '5' => 'May',
        '6' => 'June',
        '7' => 'July',
        '8' => 'August',
        '9' => 'September',
        '10' => 'October',
        '11' => 'November',
        '12' => 'December'
    ];
@endphp

@extends('portal.components.layout')

@section('content')
<main class="min-h-screen bg-gray-900 lg:pl-72 pt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-xl rounded-lg overflow-hidden transition-all duration-300 hover:shadow-2xl">
            <!-- Header -->
            <div class="border-b border-gray-700 p-6 bg-gray-800/50">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-4 sm:space-y-0">
                    <h1 class="text-2xl font-bold text-white flex items-center">
                        <span class="mr-2">Test Details</span>
                        @if($test->add_to_cv)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Shown on CV
                            </span>
                        @endif
                    </h1>
                    <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-4 w-full sm:w-auto">
                        <a href="{{ route('test.index') }}" 
                           class="inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all duration-300 w-full sm:w-auto">
                            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Back to List
                        </a>
                        <a href="{{ route('test.edit', $test->id) }}" 
                           class="inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 w-full sm:w-auto">
                            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Edit Details
                        </a>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Primary Information -->
                    <section class="space-y-6 bg-gray-900/20 p-6 rounded-lg">
                        <div class="space-y-2">
                            <h3 class="text-sm font-medium text-gray-400 flex items-center">
                                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                Test Name
                            </h3>
                            <p class="text-lg font-medium text-white">{{ $test->test }}</p>
                        </div>
                        
                        <div class="space-y-2">
                            <h3 class="text-sm font-medium text-gray-400 flex items-center">
                                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                </svg>
                                Results
                            </h3>
                            <p class="text-lg font-medium text-white">{{ $test->score }}</p>
                        </div>
                        
                        <div class="space-y-2">
                            <h3 class="text-sm font-medium text-gray-400 flex items-center">
                                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                                </svg>
                                Test Link
                            </h3>
                            <p class="text-lg font-medium text-white">
                                @if($test->credential_url)
                                    <a href="{{ $test->credential_url }}" 
                                       target="_blank"
                                       rel="noopener noreferrer"
                                       class="text-blue-400 hover:text-blue-300 transition-colors duration-300 break-all">
                                        {{ $test->credential_url }}
                                    </a>
                                @else
                                    <span class="text-gray-500 italic">No link provided</span>
                                @endif
                            </p>
                        </div>
                        
                        <div class="space-y-2">
                            <h3 class="text-sm font-medium text-gray-400 flex items-center">
                                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                </svg>
                                Grade
                            </h3>
                            <p class="text-lg font-medium text-white">{{ $test->grade ?: 'Not graded' }}</p>
                        </div>
                    </section>

                    <!-- Timeline Information -->
                    <section class="space-y-6 bg-gray-900/20 p-6 rounded-lg">
                        <div class="space-y-2">
                            <h3 class="text-sm font-medium text-gray-400 flex items-center">
                                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                Date Taken
                            </h3>
                            <p class="text-lg font-medium text-white">
                                {{ $months[$test->test_month] ?? 'Unknown Month' }} {{ $test->test_year ?: 'Unknown Year' }}
                            </p>
                        </div>
                    </section>

                    <!-- Additional Information -->
                    <section class="md:col-span-2 space-y-6 bg-gray-900/20 p-6 rounded-lg">
                        <div class="space-y-2">
                            <h3 class="text-sm font-medium text-gray-400 flex items-center">
                                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                                </svg>
                                Description
                            </h3>
                            <p class="text-lg font-medium text-white whitespace-pre-line">
                                {{ $test->description ?: 'No description provided' }}
                            </p>
                        </div>
                    </section>

                    <!-- Metadata -->
                    <section class="md:col-span-2 border-t border-gray-700 pt-6 mt-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                            <div class="flex items-center space-x-2">
                                <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                                <span class="text-gray-400">Show on CV:</span>
                                <span class="text-white">{{ $test->add_to_cv ? 'Yes' : 'No' }}</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="text-gray-400">Added:</span>
                                <span class="text-white">{{ $test->date_created->format('M d, Y') }}</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                </svg>
                                <span class="text-gray-400">Last Updated:</span>
                                <span class="text-white">{{ $test->date_updated->format('M d, Y') }}</span>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Validate external links
    const testLink = document.querySelector('a[href="{{ $test->credential_url }}"]');
    if (testLink) {
        testLink.addEventListener('click', function(e) {
            if (!