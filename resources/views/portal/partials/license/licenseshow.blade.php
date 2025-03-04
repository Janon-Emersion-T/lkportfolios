{{-- license Details View --}}
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
@endphp{{-- license Details View --}}
@extends('portal.components.layout')

@section('content')
<main class="min-h-screen bg-gray-900 lg:pl-72 pt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-xl rounded-lg overflow-hidden">
            <!-- Header -->
            <div class="border-b border-gray-700 p-6">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-bold text-white">license Details</h1>
                    <div class="flex space-x-4">
                        <a href="{{ route('license.index') }}" 
                           class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition">
                            Back to List
                        </a>
                        <a href="{{ route('license.edit', $license->id) }}" 
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
                            <h3 class="text-sm font-medium text-gray-400">Name</h3>
                            <p class="text-lg font-medium text-white">{{ $license->name }}</p>
                        </div>
                        
                        <div class="space-y-1">
                            <h3 class="text-sm font-medium text-gray-400">Issuing Organization</h3>
                            <p class="text-lg font-medium text-white">{{ $license->issuing_organization }}</p>
                        </div>
                        
                        <div class="space-y-1">
                            <h3 class="text-sm font-medium text-gray-400">License Number</h3>
                            <p class="text-lg font-medium text-white">{{ $license->credential_id }}</p>
                        </div>
                        
                        <div class="space-y-1">
                            <h3 class="text-sm font-medium text-gray-400">Credential URL</h3>
                            <p class="text-lg font-medium text-white">{{ $license->credential_url }}</p>
                        </div>
                    </section>

                    <!-- Timeline Information -->
                    <section class="space-y-6">
                         <div class="space-y-1">
                                <h3 class="text-sm font-medium text-gray-400">Issue Date</h3>
                                <p class="text-lg font-medium text-white">
                                    {{ $months[$license->issue_month] ?? '' }} {{ $license->issue_year }}
                                </p>
                            </div>
                            
                            <div class="space-y-1">
                                <h3 class="text-sm font-medium text-gray-400">Expiration Date</h3>
                                <p class="text-lg font-medium text-white">
                                    {{ $months[$license->expiration_month] ?? '' }} {{ $license->expiration_year }}
                                </p>
                            </div>
                    </section>

                    <!-- Additional Information -->
                    <section class="md:col-span-2 space-y-6">                        
                        <div class="space-y-1">
                            <h3 class="text-sm font-medium text-gray-400">Description</h3>
                            <p class="text-lg font-medium text-white">{{ $license->description ?: 'No description provided' }}</p>
                        </div>
                    </section>

                    <!-- Metadata -->
                    <section class="md:col-span-2 border-t border-gray-700 pt-6 mt-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                            <div>
                                <span class="text-gray-400">Show on CV:</span>
                                <span class="text-white ml-2">{{ $license->add_to_cv ? 'Yes' : 'No' }}</span>
                            </div>
                            <div>
                                <span class="text-gray-400">Added:</span>
                                <span class="text-white ml-2">{{ $license->created_at->format('M d, Y') }}</span>
                            </div>
                            <div>
                                <span class="text-gray-400">Last Updated:</span>
                                <span class="text-white ml-2">{{ $license->updated_at->format('M d, Y') }}</span>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection