@extends('portal.components.layout')

@section('content')
<div class="min-h-screen flex bg-gray-50 dark:bg-gray-900">
    <!-- Main Content -->
    <div class="w-full pt-24 xl:pl-72 lg:pl-72 sm:pl-4">
        <div class="px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Add Education</h1>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Enter the details of your new Education below.</p>
        </div>

        <div class="mt-8 px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
                <form action="{{ route('education.store') }}" method="POST">
                    @csrf

                    <!-- Basic Information Section -->
                    <div class="mb-6">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Basic Information</h2>
                        <hr class="border-gray-200 dark:border-gray-700 mb-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Institution -->
                            <div>
                                <label for="school" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Institution</label>
                                <input type="text" name="school" id="school" value="{{ old('school') }}" required class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                @error('school')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Degree -->
                            <div>
                                <label for="degree" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Degree</label>
                                <input type="text" name="degree" id="degree" value="{{ old('degree') }}" required class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                @error('degree')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Field of Study -->
                            <div>
                                <label for="field_of_study" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Field of Study</label>
                                <select name="field_of_study" id="field_of_study" required class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                    <option value="Natural Sciences" {{ old('field_of_study') == 'Natural Sciences' ? 'selected' : '' }}>Natural Sciences</option>
                                    <option value="Social Sciences" {{ old('field_of_study') == 'Social Sciences' ? 'selected' : '' }}>Social Sciences</option>
                                    <option value="Formal Sciences" {{ old('field_of_study') == 'Formal Sciences' ? 'selected' : '' }}>Formal Sciences</option>
                                    <option value="Humanities" {{ old('field_of_study') == 'Humanities' ? 'selected' : '' }}>Humanities</option>
                                    <option value="Arts" {{ old('field_of_study') == 'Arts' ? 'selected' : '' }}>Arts</option>
                                    <option value="Engineering & Technology" {{ old('field_of_study') == 'Engineering & Technology' ? 'selected' : '' }}>Engineering & Technology</option>
                                    <option value="Health Sciences" {{ old('field_of_study') == 'Health Sciences' ? 'selected' : '' }}>Health Sciences</option>
                                    <option value="Business & Management" {{ old('field_of_study') == 'Business & Management' ? 'selected' : '' }}>Business & Management</option>
                                    <option value="Law" {{ old('field_of_study') == 'Law' ? 'selected' : '' }}>Law</option>
                                    <option value="Education" {{ old('field_of_study') == 'Education' ? 'selected' : '' }}>Education</option>
                                    <option value="Agriculture & Food Sciences" {{ old('field_of_study') == 'Agriculture & Food Sciences' ? 'selected' : '' }}>Agriculture & Food Sciences</option>
                                    <option value="Interdisciplinary Studies" {{ old('field_of_study') == 'Interdisciplinary Studies' ? 'selected' : '' }}>Interdisciplinary Studies</option>
                                    <option value="Other" {{ old('field_of_study') == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>

                                @error('field_of_study')
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
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Start Date</label>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="start_month" class="block text-sm text-gray-600 dark:text-gray-400">Month</label>
                                        <select name="start_month" id="start_month" required class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                            @foreach(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'] as $index => $month)
                                            <option value="{{ $index + 1 }}" {{ old('start_month') == ($index + 1) ? 'selected' : '' }}>{{ $month }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="start_year" class="block text-sm text-gray-600 dark:text-gray-400">Year</label>
                                        <select name="start_year" id="start_year" required class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                            <option value="" disabled selected>Select a year</option> <!-- Default prompt -->
                                            @for ($year = date('Y'); $year >= 1970; $year--)
                                            <option value="{{ $year }}" {{ old('start_year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                            @endfor
                                        </select>
                                    </div>


                                </div>
                            </div>

                            <!-- End Date -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Expected End Date</label>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="end_month" class="block text-sm text-gray-600 dark:text-gray-400">Month</label>
                                        <select name="end_month" id="end_month" required class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                            @foreach(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'] as $index => $month)
                                            <option value="{{ $index + 1 }}" {{ old('end_month') == ($index + 1) ? 'selected' : '' }}>{{ $month }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="end_year" class="block text-sm text-gray-600 dark:text-gray-400">Year</label>
                                        <select name="end_year" id="end_year" required class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                            @for ($year = 1970; $year <= date('Y') + 5; $year++) <option value="{{ $year }}" {{ old('end_year') == $year ? 'selected' : '' }}>{{ $year }}</option>
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
                                    <input type="checkbox" name="is_current" id="is_current" value="1" {{ old('is_current') ? 'checked' : '' }} class="h-5 w-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                    <label for="is_current" class="text-sm font-medium text-gray-700 dark:text-gray-300">Currently Enrolled</label>
                                </div>
                                <div>
                                    <label for="grade" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Grade</label>
                                    <input type="text" name="grade" id="grade" value="{{ old('grade') }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                </div>
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

                        <!-- Activities -->
                        <div class="mt-4">
                            <label for="activities" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Activities</label>
                            <textarea name="activities" id="activities" rows="3" class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">{{ old('activities') }}</textarea>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-6 flex justify-end space-x-4">
                        <a href="{{ route('education.index') }}" class="px-6 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-200 dark:bg-gray-700 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600">
                            Cancel
                        </a>
                        <button type="submit" class="px-6 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                            Add Education
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
