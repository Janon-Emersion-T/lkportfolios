@extends('portal.components.layout')

@section('content')
<div class="min-h-screen flex bg-gray-50 dark:bg-gray-900">
    <!-- Main Content -->
    <div class="w-full pt-24 xl:pl-72 lg:pl-72 sm:pl-4">
        <div class="px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Edit test</h1>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Update the details of your test below.</p>
        </div>

        <div class="mt-8 px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
                <form action="{{ route('test.update', $test->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Basic Information Section -->
                    <div class="space-y-6">
                        <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Basic Information</h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <label for="test" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Test Name</label>
                                    <input type="text" name="test" id="test" value="{{ old('test', $test->test) }}" required class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <div>
                                    <label for="score" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Results</label>
                                    <input type="text" name="score" id="score" value="{{ old('score', $test->score) }}" required class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <div>
                                    <label for="credential_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Test link</label>
                                    <input type="text" name="credential_url" id="credential_url" value="{{ old('credential_url', $test->credential_url) }}" required class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                </div>
                            </div>
                        </div>


                        <!-- Time Frame -->
                        <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Time Frame</h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <!-- Start Date -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Start Date</label>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label for="test_month" class="block text-sm text-gray-600 dark:text-gray-400">test_month</label>
                                            <select name="test_month" id="test_month" required class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                                @foreach(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'] as $index => $month)
                                                <option value="{{ $index + 1 }}" {{ old('test_month', $test->test_month) == ($index + 1) ? 'selected' : '' }}>{{ $month }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div>
                                            <label for="test_year" class="block text-sm text-gray-600 dark:text-gray-400">test_year</label>
                                            <select name="test_year" id="test_year" required class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                                @for ($year = 1970; $year <= date('Y') + 5; $year++)
                                                <option value="{{ $year }}" {{ old('test_year', $test->test_year) == $year ? 'selected' : '' }}>{{ $year }}</option>
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
                                                <option value="{{ $index + 1 }}" {{ old('end_month', $test->end_month) == ($index + 1) ? 'selected' : '' }}>{{ $month }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div>
                                            <label for="end_year" class="block text-sm text-gray-600 dark:text-gray-400">Year</label>
                                            <select name="end_year" id="end_year" class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                                @for ($year = 1970; $year <= date('Y') + 5; $year++)
                                                <option value="{{ $year }}" {{ old('end_year', $test->end_year) == $year ? 'selected' : '' }}>{{ $year }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 flex items-center">
                                <input type="checkbox" id="is_current" name="is_current" class="h-5 w-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500" value="1" {{ old('is_current', $test->is_current) ? 'checked' : '' }}>
                                <label for="is_current" class="ml-2 text-sm font-medium text-gray-700 dark:text-gray-300">Currently studying</label>
                            </div>
                        </div>

                        <!-- Additional Information Section -->
                        <div class="space-y-4">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Additional Information</h2>
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                                <textarea name="description" id="description" rows="3" class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">{{ old('description', $test->description) }}</textarea>
                            </div>

                            <div class="flex items-center">
                                <input type="checkbox" id="add_to_cv" name="add_to_cv" class="h-5 w-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500" value="1" {{ old('add_to_cv', $test->add_to_cv) ? 'checked' : '' }}>
                                <label for="add_to_cv" class="ml-2 text-sm font-medium text-gray-700 dark:text-gray-300">Add to CV</label>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="mt-6 flex justify-end space-x-4">
                        <a href="{{ route('test.index') }}" class="px-6 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-200 dark:bg-gray-700 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600">Cancel</a>
                        <button type="submit" class="px-6 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">Update test</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection