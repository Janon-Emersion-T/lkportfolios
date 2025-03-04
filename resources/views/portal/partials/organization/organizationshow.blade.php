{{-- Organization Details View --}}
@php
$months = [
    '1' => 'January', '2' => 'February', '3' => 'March', '4' => 'April', 
    '5' => 'May', '6' => 'June', '7' => 'July', '8' => 'August', 
    '9' => 'September', '10' => 'October', '11' => 'November', '12' => 'December'
];
@endphp

@extends('portal.components.layout')

@section('content')
<main class="min-h-screen bg-gray-900 lg:pl-72 pt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-xl rounded-lg overflow-hidden">
            <!-- Header -->
            <div class="border-b border-gray-700 p-6">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-bold text-white">Organization Details</h1>
                    <div class="flex space-x-4">
                        <a href="{{ route('organization.index') }}" 
                           class="inline-flex items-center px-4 py-2 border border-transparent rounded-md 
                                  shadow-sm text-sm font-medium text-white bg-gray-600 hover:bg-gray-700 
                                  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition">
                            Back to List
                        </a>
                        <a href="{{ route('organization.edit', $organization->id) }}" 
                           class="inline-flex items-center px-4 py-2 border border-transparent rounded-md 
                                  shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 
                                  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
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
                            <h3 class="text-sm font-medium text-gray-400">Organization</h3>
                            <p class="text-lg font-medium text-white">{{ $organization->organization }}</p>
                        </div>

                        <div class="space-y-1">
                            <h3 class="text-sm font-medium text-gray-400">Position Held</h3>
                            <p class="text-lg font-medium text-white">{{ $organization->position_held }}</p>
                        </div>
                    </section>

                    <!-- Timeline Information -->
                    <section class="space-y-6">
                        <div class="space-y-1">
                            <h3 class="text-sm font-medium text-gray-400">Start Date</h3>
                            <p class="text-lg font-medium text-white">
                                {{ $months[$organization->start_month] ?? '' }} {{ $organization->start_year }}
                            </p>
                        </div>

                        <div class="space-y-1">
                            <h3 class="text-sm font-medium text-gray-400">End Date</h3>
                            <p class="text-lg font-medium text-white">
                                @if ($organization->membership_ongoing)
                                    <span class="text-green-400">Currently Active</span>
                                @else
                                    {{ $months[$organization->end_month] ?? '' }} {{ $organization->end_year }}
                                @endif
                            </p>
                        </div>
                    </section>

                    <!-- Additional Information -->
                    <section class="md:col-span-2 space-y-6">
                        <div class="space-y-1">
                            <h3 class="text-sm font-medium text-gray-400">Description</h3>
                            <p class="text-lg font-medium text-white">{{ $organization->description ?: 'No description provided' }}</p>
                        </div>

                        <!-- Media -->
                        @if (!empty($organization->media))
                        <div class="space-y-1">
                            <h3 class="text-sm font-medium text-gray-400">Media</h3>
                            <div class="flex space-x-4">
                                @foreach ($organization->media as $media)
                                    <a href="{{ asset('storage/' . $media) }}" target="_blank" class="text-blue-400 hover:underline">
                                        View File
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </section>

                    <!-- Verification Status -->
                    <section class="md:col-span-2 space-y-6">
                        <div class="space-y-1">
                            <h3 class="text-sm font-medium text-gray-400">Verification Status</h3>
                            <p class="text-lg font-medium text-white">
                                @if ($organization->is_verified)
                                    <span class="text-green-400">Verified on {{ $organization->verified_date->format('M d, Y') }}</span>
                                    <br>
                                    Verified by: <span class="text-white">{{ optional($organization->verifier)->name ?? 'Unknown' }}</span>
                                @else
                                    <span class="text-red-400">Not Verified</span>
                                @endif
                            </p>
                        </div>
                    </section>

                    <!-- Metadata -->
                    <section class="md:col-span-2 border-t border-gray-700 pt-6 mt-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                            <div>
                                <span class="text-gray-400">Show on CV:</span>
                                <span class="text-white ml-2">{{ $organization->add_to_cv ? 'Yes' : 'No' }}</span>
                            </div>
                            <div>
                                <span class="text-gray-400">Added:</span>
                                <span class="text-white ml-2">{{ $organization->date_created->format('M d, Y') }}</span>
                            </div>
                            <div>
                                <span class="text-gray-400">Last Updated:</span>
                                <span class="text-white ml-2">{{ $organization->date_updated->format('M d, Y') }}</span>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
