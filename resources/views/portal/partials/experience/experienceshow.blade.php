{{-- Experience Details View --}}
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
<main class="min-h-screen bg-gradient-to-br from-gray-900 to-gray-800 lg:pl-72 pt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-2xl rounded-lg overflow-hidden border border-gray-700">
            <!-- Header -->
            <div class="border-b border-gray-700 p-6 bg-gray-800/50">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-4 sm:space-y-0">
                    <h1 class="text-3xl font-bold text-white tracking-tight">Experience Details</h1>
                    <div class="flex space-x-4">
                        <a href="{{ route('experience.index') }}" 
                           class="inline-flex items-center px-4 py-2 border border-gray-600 rounded-lg shadow-sm text-sm font-medium text-white bg-gray-700 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Back to List
                        </a>
                        <a href="{{ route('experience.edit', $experience->id) }}" 
                           class="inline-flex items-center px-4 py-2 border border-blue-500 rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Edit Details
                        </a>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                    <!-- Primary Information -->
                    <section class="space-y-8">
                        <div class="space-y-2">
                            <h3 class="text-sm font-medium text-gray-400 uppercase tracking-wider">Position</h3>
                            <p class="text-xl font-semibold text-white">{{ $experience->title }}</p>
                        </div>
                        <div class="space-y-2">
                            <h3 class="text-sm font-medium text-gray-400 uppercase tracking-wider">Company</h3>
                            <p class="text-xl font-semibold text-white">{{ $experience->company }}</p>
                        </div>
                        <div class="space-y-2">
                            <h3 class="text-sm font-medium text-gray-400 uppercase tracking-wider">Employment Type</h3>
                            <p class="text-lg font-medium text-white">{{ $experience->employment_type }}</p>
                        </div>
                        <div class="space-y-2">
                            <h3 class="text-sm font-medium text-gray-400 uppercase tracking-wider">Location Type</h3>
                            <p class="text-lg font-medium text-white">{{ $experience->location_type }}</p>
                        </div>
                    </section>

                    <!-- Timeline Information -->
                    <section class="space-y-8">
                        <div class="space-y-2">
                            <h3 class="text-sm font-medium text-gray-400 uppercase tracking-wider">Start Date</h3>
                            <p class="text-lg font-medium text-white">
                                {{ $months[$experience->start_month] ?? '' }} {{ $experience->start_year }}
                            </p>
                        </div>
                        <div class="space-y-2">
                            <h3 class="text-sm font-medium text-gray-400 uppercase tracking-wider">End Date</h3>
                            <p class="text-lg font-medium text-white">
                                @if($experience->is_current)
                                    Present
                                @else
                                    {{ $months[$experience->end_month] ?? '' }} {{ $experience->end_year }}
                                @endif
                            </p>
                        </div>
                        <div class="space-y-2">
                            <h3 class="text-sm font-medium text-gray-400 uppercase tracking-wider">Status</h3>
                            <p class="inline-flex items-center">
                                @if($experience->is_current)
                                    <span class="flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-500/10 text-green-400">
                                        <span class="w-2 h-2 rounded-full bg-green-400 mr-2"></span>
                                        Currently Working Here
                                    </span>
                                @else
                                    <span class="flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-500/10 text-gray-400">
                                        <span class="w-2 h-2 rounded-full bg-gray-400 mr-2"></span>
                                        Completed
                                    </span>
                                @endif
                            </p>
                        </div>
                    </section>

                    <!-- Additional Information -->
                    <section class="md:col-span-2 space-y-8">
                        <div class="space-y-2">
                            <h3 class="text-sm font-medium text-gray-400 uppercase tracking-wider">Location</h3>
                            <p class="text-lg font-medium text-white">{{ $experience->location ?: 'No location specified' }}</p>
                        </div>
                        <div class="space-y-2">
                            <h3 class="text-sm font-medium text-gray-400 uppercase tracking-wider">Description</h3>
                            <div class="prose prose-lg prose-invert max-w-none">
                                <p class="text-gray-300">{{ $experience->description ?: 'No description provided' }}</p>
                            </div>
                        </div>
                    </section>

                    <!-- Metadata -->
                    <section class="md:col-span-2 border-t border-gray-700 pt-8 mt-8">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="flex items-center space-x-2">
                                <span class="text-gray-400 text-sm">Show on CV:</span>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $experience->add_to_cv ? 'bg-blue-500/10 text-blue-400' : 'bg-gray-500/10 text-gray-400' }}">
                                    {{ $experience->add_to_cv ? 'Yes' : 'No' }}
                                </span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="text-gray-400 text-sm">Added:</span>
                                <time class="text-sm text-white">{{ $experience->created_at->format('M d, Y') }}</time>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="text-gray-400 text-sm">Last Updated:</span>
                                <time class="text-sm text-white">{{ $experience->updated_at->format('M d, Y') }}</time>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection