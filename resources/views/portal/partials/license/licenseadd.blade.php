@extends('portal.components.layout')

@section('content')
<div class="min-h-screen flex bg-gray-50 dark:bg-gray-900">
    <!-- Main Content -->
    <div class="w-full pt-24 xl:pl-72 lg:pl-72 sm:pl-4">
        <div class="px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Add license</h1>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Enter the details of your new license below.</p>
        </div>

        <div class="mt-8 px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
                <form action="{{ route('license.store') }}" method="POST">
                    @csrf

                    <!-- Basic Information Section -->
                    <div class="mb-6">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">License Information</h2>
                        <hr class="border-gray-200 dark:border-gray-700 mb-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- name -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name of the license</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" required class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                @error('name')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Degree -->
                            <div>
                                <label for="issuing_organization" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Issuing Organization</label>
                                <input type="text" name="issuing_organization" id="issuing_organization" value="{{ old('issuing_organization') }}" required class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                @error('issuing_organization')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- credential_id -->
                            <div>
                                <label for="credential_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">License Number</label>
                                <input type="text" name="credential_id" id="credential_id" value="{{ old('credential_id') }}" required class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                @error('credential_id')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- credential_url -->
                            <div>
                                <label for="credential_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Credential URL</label>
                                <input type="text" name="credential_url" id="credential_url" value="{{ old('credential_url') }}" required class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                @error('credential_url')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Timeline Section -->
                    <div class="mb-6">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Timeline</h2>
                        <hr class="border-gray-200 dark:border-gray-700 mb-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Start Date -->
                            <div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="issue_month" class="block text-sm text-gray-600 dark:text-gray-400">Month Issued</label>
                                        <select name="issue_month" id="issue_month" required class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                            @foreach(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'] as $index => $month)
                                            <option value="{{ $index + 1 }}" {{ old('issue_month') == ($index + 1) ? 'selected' : '' }}>{{ $month }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="issue_year" class="block text-sm text-gray-600 dark:text-gray-400">Year Issued</label>
                                        <select name="issue_year" id="issue_year" required class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                            <option value="" disabled selected>Select a year</option> <!-- Default prompt -->
                                            @for ($year = date('Y'); $year >= 1970; $year--)
                                            <option value="{{ $year }}" {{ old('issue_year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                            @endfor
                                        </select>
                                    </div>


                                </div>
                            </div>

                            <!-- End Date -->
                            <div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="expiration_month" class="block text-sm text-gray-600 dark:text-gray-400">Month expired or expiring</label>
                                        <select name="expiration_month" id="expiration_month" required class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                            @foreach(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'] as $index => $month)
                                            <option value="{{ $index + 1 }}" {{ old('expiration_month') == ($index + 1) ? 'selected' : '' }}>{{ $month }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="expiration_year" class="block text-sm text-gray-600 dark:text-gray-400">Year expired or expiring</label>
                                        <select name="expiration_year" id="expiration_year" required class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                            @for ($year = 1970; $year <= date('Y') + 5; $year++) <option value="{{ $year }}" {{ old('expiration_year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                                @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Details Section -->
                    <div class="mb-6">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Additional Details</h2>
                        <hr class="border-gray-200 dark:border-gray-700 mb-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Status and Grade -->
                            <div class="space-y-4">
                                <div class="flex items-center space-x-2">
                                    <input type="checkbox" name="add_to_cv" id="add_to_cv" value="1" {{ old('add_to_cv') ? 'checked' : '' }} class="h-5 w-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                    <label for="add_to_cv" class="text-sm font-medium text-gray-700 dark:text-gray-300">Add to CV</label>
                                </div>
                            </div>

                            <!-- Description -->
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                                <textarea name="description" id="description" rows="4" class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-6 flex justify-end space-x-4">
                        <a href="{{ route('license.index') }}" class="px-6 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-200 dark:bg-gray-700 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600">
                            Cancel
                        </a>
                        <button type="submit" class="px-6 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                            Add license
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const isCurrentCheckbox = document.getElementById('is_current');
        const gradeInput = document.getElementById('grade');

        function updateGradeState() {
            gradeInput.disabled = isCurrentCheckbox.checked;
            if (isCurrentCheckbox.checked) {
                gradeInput.value = '';
            }
        }

        isCurrentCheckbox.addEventListener('change', updateGradeState);
        updateGradeState(); // Initial state
    });

</script>
@endsection
