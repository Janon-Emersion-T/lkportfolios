@extends('portal.components.layout')

@section('content')
<div class="min-h-screen flex bg-gray-50 dark:bg-gray-900">
    <!-- Main Content -->
    <div class="w-full pt-24 xl:pl-72 lg:pl-72 sm:pl-4">
        <div class="px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Edit recommendation</h1>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Update the details of your recommendation below.</p>
        </div>

        <div class="mt-8 px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
                <form action="{{ route('recommendation.update', $recommendation->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Basic Information Section -->
                    <div class="space-y-6">
                        <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Basic Information</h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <label for="recommender" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Recommender</label>
                                    <input type="text" name="recommender" id="recommender" value="{{ old('recommender', $recommendation->recommender) }}" required class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <div>
                                    <label for="relationship" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Relationship</label>
                                    <input type="text" name="relationship" id="relationship" value="{{ old('relationship', $recommendation->relationship) }}" required class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                </div>
                            </div>
                        </div>

                        <!-- Additional Information Section -->
                        <div class="space-y-4">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Additional Information</h2>
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                                <textarea name="description" id="description" rows="3" class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">{{ old('description', $recommendation->description) }}</textarea>
                            </div>

                            <div class="flex items-center">
                                <input type="checkbox" id="add_to_cv" name="add_to_cv" class="h-5 w-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500" value="1" {{ old('add_to_cv', $recommendation->add_to_cv) ? 'checked' : '' }}>
                                <label for="add_to_cv" class="ml-2 text-sm font-medium text-gray-700 dark:text-gray-300">Add to CV</label>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="mt-6 flex justify-end space-x-4">
                        <a href="{{ route('recommendation.index') }}" class="px-6 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-200 dark:bg-gray-700 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600">Cancel</a>
                        <button type="submit" class="px-6 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">Update recommendation</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection