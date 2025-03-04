{{-- project Details View --}}
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
@endphp{{-- project Details View --}}
@extends('portal.components.layout')

@section('content')
<main class="min-h-screen bg-gray-900 lg:pl-72 pt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-xl rounded-lg overflow-hidden">
            <!-- Header -->
            <div class="border-b border-gray-700 p-6">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-bold text-white">project Details</h1>
                    <div class="flex space-x-4">
                        <a href="{{ route('project.index') }}" 
                           class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition">
                            Back to List
                        </a>
                        <a href="{{ route('project.edit', $project->id) }}" 
                           class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
                            Edit Details
                        </a>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Primary Information -->
                    <section class="space-y-6">
                        <div class="space-y-1">
                            <h3 class="text-sm font-medium text-gray-400">Title</h3>
                            <p class="text-lg font-medium text-white">{{ $project->title }}</p>
                        </div>
                    </section>

                    <!-- Timeline Information -->
                    <section class="space-y-6">
                         <div class="space-y-1">
                                <h3 class="text-sm font-medium text-gray-400">Start Date</h3>
                                <p class="text-lg font-medium text-white">
                                    {{ $months[$project->start_month] ?? '' }} {{ $project->start_year }}
                                </p>
                            </div>
                            
                            <div class="space-y-1">
                                <h3 class="text-sm font-medium text-gray-400">End Date</h3>
                                <p class="text-lg font-medium text-white">
                                    {{ $months[$project->end_month] ?? '' }} {{ $project->end_year }}
                                </p>
                            </div>
                        
                        <div class="space-y-1">
                            <h3 class="text-sm font-medium text-gray-400">Status</h3>
                            <p class="text-lg font-medium text-white">
                                <span class="{{ $project->is_current ? 'text-green-400' : 'text-gray-400' }}">
                                    {{ $project->is_current ? 'Currently working on it' : 'Completed' }}
                                </span>
                            </p>
                        </div>
                    </section>

                    <!-- Additional Information -->
                    <section class="md:col-span-2 space-y-6">
                        
                        <div class="space-y-1">
                            <h3 class="text-sm font-medium text-gray-400">Description</h3>
                            <p class="text-lg font-medium text-white">{{ $project->description ?: 'No description provided' }}</p>
                        </div>
                    </section>

                    <!-- Metadata -->
                    <section class="md:col-span-2 border-t border-gray-700 pt-6 mt-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                            <div>
                                <span class="text-gray-400">Show on CV:</span>
                                <span class="text-white ml-2">{{ $project->add_to_cv ? 'Yes' : 'No' }}</span>
                            </div>
                            <div>
                                <span class="text-gray-400">Added:</span>
                                <span class="text-white ml-2">{{ $project->created_at->format('M d, Y') }}</span>
                            </div>
                            <div>
                                <span class="text-gray-400">Last Updated:</span>
                                <span class="text-white ml-2">{{ $project->updated_at->format('M d, Y') }}</span>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection