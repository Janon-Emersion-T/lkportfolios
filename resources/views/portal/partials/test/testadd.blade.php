@extends('portal.components.layout')

@section('content')
<div class="min-h-screen flex bg-gray-50 dark:bg-gray-900">
    <div class="w-full pt-24 xl:pl-72 lg:pl-72 sm:pl-4">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Add Test</h1>
                    <p class="mt-2 text-sm leading-6 text-gray-600 dark:text-gray-400">Enter the details of your new test below.</p>
                </div>
            </div>
        </div>

        <div class="mt-8 px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                <form id="testForm" action="{{ route('test.store') }}" method="POST" class="space-y-8 p-6">
                    @csrf

                    <!-- Basic Information Section -->
                    <div class="space-y-6">
                        <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Basic Information</h2>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="test" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Test Name</label>
                                <input type="text" 
                                       name="test" 
                                       id="test" 
                                       value="{{ old('test') }}" 
                                       class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                       required
                                       minlength="2"
                                       data-error="Please enter a valid test name (minimum 2 characters)">
                                <p class="hidden text-sm text-red-500 mt-1 error-message"></p>
                            </div>

                            <div class="space-y-2">
                                <label for="score" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Score</label>
                                <input type="text" 
                                       name="score" 
                                       id="score" 
                                       value="{{ old('score') }}" 
                                       class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                       required
                                       pattern="^[0-9]+(\.[0-9]{1,2})?$"
                                       data-error="Please enter a valid score (e.g., 85 or 85.5)">
                                <p class="hidden text-sm text-red-500 mt-1 error-message"></p>
                            </div>

                            <div class="space-y-2">
                                <label for="credential_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Credential Link</label>
                                <input type="url" 
                                       name="credential_url" 
                                       id="credential_url" 
                                       value="{{ old('credential_url') }}" 
                                       class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                       data-error="Please enter a valid URL">
                                <p class="hidden text-sm text-red-500 mt-1 error-message"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Timeline Section -->
                    <div class="space-y-6">
                        <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Timeline</h2>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Exam taken on</label>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <select name="test_month" 
                                                id="test_month" 
                                                required 
                                                class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                            <option value="">Select Month</option>
                                            @foreach(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'] as $index => $month)
                                                <option value="{{ $index + 1 }}" {{ old('test_month') == ($index + 1) ? 'selected' : '' }}>{{ $month }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <select name="test_year" 
                                                id="test_year" 
                                                required 
                                                class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                            <option value="">Select Year</option>
                                            @for ($year = 1970; $year <= date('Y') + 5; $year++)
                                                <option value="{{ $year }}" {{ old('test_year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Details Section -->
                    <div class="space-y-6">
                        <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Additional Details</h2>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <div class="flex items-center space-x-3">
                                    <input type="checkbox" 
                                           name="is_current" 
                                           id="is_current" 
                                           value="1" 
                                           {{ old('is_current') ? 'checked' : '' }} 
                                           class="h-5 w-5 rounded border-gray-300 text-blue-600 focus:ring-blue-500 transition-colors">
                                    <label for="is_current" class="text-sm font-medium text-gray-700 dark:text-gray-300">Currently Enrolled</label>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <input type="checkbox" 
                                           name="add_to_cv" 
                                           id="add_to_cv" 
                                           value="1" 
                                           {{ old('add_to_cv') ? 'checked' : '' }} 
                                           class="h-5 w-5 rounded border-gray-300 text-blue-600 focus:ring-blue-500 transition-colors">
                                    <label for="add_to_cv" class="text-sm font-medium text-gray-700 dark:text-gray-300">Add to CV</label>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                                <textarea name="description" 
                                          id="description" 
                                          rows="4" 
                                          class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors resize-none"
                                          maxlength="500">{{ old('description') }}</textarea>
                                <p class="text-sm text-gray-500 dark:text-gray-400" id="descriptionCounter">0/500 characters</p>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('test.index') }}" 
                           class="px-6 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors focus:outline-none focus:ring-2 focus:ring-gray-500">
                            Cancel
                        </a>
                        <button type="submit" 
                                class="px-6 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                            Add Test
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('testForm');
    const description = document.getElementById('description');
    const descriptionCounter = document.getElementById('descriptionCounter');
    const inputs = form.querySelectorAll('input[required], select[required]');

    // Form validation
    form.addEventListener('submit', function(e) {
        let isValid = true;
        
        inputs.forEach(input => {
            if (!input.checkValidity()) {
                isValid = false;
                showError(input, input.dataset.error || 'This field is required');
            } else {
                hideError(input);
            }
        });

        if (!isValid) {
            e.preventDefault();
        }
    });

    // Real-time validation
    inputs.forEach(input => {
        input.addEventListener('input', function() {
            if (this.checkValidity()) {
                hideError(this);
            }
        });

        input.addEventListener('blur', function() {
            if (!this.checkValidity()) {
                showError(this, this.dataset.error || 'This field is required');
            } else {
                hideError(this);
            }
        });
    });

    // Description character counter
    description.addEventListener('input', function() {
        const remaining = this.value.length;
        descriptionCounter.textContent = `${remaining}/500 characters`;
    });

    // Initialize character counter
    description.dispatchEvent(new Event('input'));

    // Helper functions
    function showError(input, message) {
        const errorElement = input.nextElementSibling;
        if (errorElement && errorElement.classList.contains('error-message')) {
            errorElement.textContent = message;
            errorElement.classList.remove('hidden');
        }
        input.classList.add('border-red-500');
    }

    function hideError(input) {
        const errorElement = input.nextElementSibling;
        if (errorElement && errorElement.classList.contains('error-message')) {
            errorElement.classList.add('hidden');
        }
        input.classList.remove('border-red-500');
    }

    // Handle score input validation
    const scoreInput = document.getElementById('score');
    scoreInput.addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9.]/g, '');
        const parts = this.value.split('.');
        if (parts.length > 2) {
            this.value = parts[0] + '.' + parts.slice(1).join('');
        }
        if (parts[1] && parts[1].length > 2) {
            this.value = parts[0] + '.' + parts[1].slice(0, 2);
        }
    });
});
</script>
@endsection