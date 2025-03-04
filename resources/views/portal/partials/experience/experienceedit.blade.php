@extends('portal.components.layout')

@section('content')
<div class="min-h-screen flex bg-gray-50 dark:bg-gray-900">
    <!-- Main Content -->
    <div class="w-full pt-24 xl:pl-72 lg:pl-72 sm:pl-4">
        <div class="px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Edit experience</h1>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Update the details of your experience below.</p>
        </div>

        <div class="mt-8 px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
                <form action="{{ route('experience.update', $experience->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Basic Information Section -->
                    <div class="space-y-6">
                        <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Basic Information</h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">title</label>
                                    <input type="text" name="title" id="title" value="{{ old('title', $experience->title) }}" required class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <div>
                                    <label for="employment_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Employment Type</label>
                                    <select name="employment_type" id="employment_type" required class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                        <option value="Full-time" {{ old('employment_type') == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                                        <option value="Part-time" {{ old('employment_type') == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                                        <option value="Temporary" {{ old('employment_type') == 'Temporary' ? 'selected' : '' }}>Temporary</option>
                                        <option value="Contract" {{ old('employment_type') == 'Contract' ? 'selected' : '' }}>Contract</option>
                                        <option value="Freelance" {{ old('employment_type') == 'Freelance' ? 'selected' : '' }}>Freelance</option>
                                        <option value="Internship" {{ old('employment_type') == 'Internship' ? 'selected' : '' }}>Internship</option>
                                        <option value="Zero-hour contract" {{ old('employment_type') == 'Zero-hour contract' ? 'selected' : '' }}>Zero-hour contract</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Academic Details Section -->
                        <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Company Details</h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <label for="company" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Company Name</label>
                                    <input type="text" name="company" id="company" value="{{ old('company', $experience->company) }}" required class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div>
                                    <label for="location_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Location Type</label>
                                    <select name="location_type" id="location_type" required class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                        <option value="Office" {{ old('location_type') == 'Office' ? 'selected' : '' }}>Office</option>
                                        <option value="Remote" {{ old('location_type') == 'Remote' ? 'selected' : '' }}>Remote</option>
                                        <option value="Hybrid" {{ old('location_type') == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="location" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Location</label>
                                    <input type="text" name="location" id="location" value="{{ old('location', $experience->location) }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                </div>
                            </div>
                        </div>

                        <!-- Duration Section -->
                        <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Duration</h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <!-- Start Date -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Start Date</label>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label for="start_month" class="block text-sm text-gray-600 dark:text-gray-400">Month</label>
                                            <select name="start_month" id="start_month" required class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                                @foreach(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'] as $index => $month)
                                                <option value="{{ $index + 1 }}" {{ old('start_month', $experience->start_month) == ($index + 1) ? 'selected' : '' }}>{{ $month }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div>
                                            <label for="start_year" class="block text-sm text-gray-600 dark:text-gray-400">Year</label>
                                            <select name="start_year" id="start_year" required class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                                @for ($year = 1970; $year <= date('Y') + 5; $year++) <option value="{{ $year }}" {{ old('start_year', $experience->start_year) == $year ? 'selected' : '' }}>{{ $year }}</option>
                                                    @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- End Date -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">End Date</label>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label for="end_month" class="block text-sm text-gray-600 dark:text-gray-400">Month</label>
                                            <select name="end_month" id="end_month" class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                                @foreach(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'] as $index => $month)
                                                <option value="{{ $index + 1 }}" {{ old('end_month', $experience->end_month) == ($index + 1) ? 'selected' : '' }}>{{ $month }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div>
                                            <label for="end_year" class="block text-sm text-gray-600 dark:text-gray-400">Year</label>
                                            <select name="end_year" id="end_year" class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                                @for ($year = 1970; $year <= date('Y') + 5; $year++) <option value="{{ $year }}" {{ old('end_year', $experience->end_year) == $year ? 'selected' : '' }}>{{ $year }}</option>
                                                    @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 flex items-center">
                                <input type="checkbox" id="is_current" name="is_current" class="h-5 w-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500" value="1" {{ old('is_current', $experience->is_current) ? 'checked' : '' }}>
                                <label for="is_current" class="ml-2 text-sm font-medium text-gray-700 dark:text-gray-300">Currently studying</label>
                            </div>
                        </div>

                        <!-- Additional Information Section -->
                        <div class="space-y-4">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Additional Information</h2>
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                                <textarea name="description" id="description" rows="3" class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">{{ old('description', $experience->description) }}</textarea>
                            </div>

                            <div class="flex items-center">
                                <input type="checkbox" id="add_to_cv" name="add_to_cv" class="h-5 w-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500" value="1" {{ old('add_to_cv', $experience->add_to_cv) ? 'checked' : '' }}>
                                <label for="add_to_cv" class="ml-2 text-sm font-medium text-gray-700 dark:text-gray-300">Add to CV</label>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="mt-6 flex justify-end space-x-4">
                        <a href="{{ route('experience.index') }}" class="px-6 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-200 dark:bg-gray-700 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600">Cancel</a>
                        <button type="submit" class="px-6 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">Update experience</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
