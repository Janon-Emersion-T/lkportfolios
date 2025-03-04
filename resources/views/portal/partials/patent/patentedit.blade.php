@extends('portal.components.layout')

@section('content')
<div class="min-h-screen flex bg-gray-50 dark:bg-gray-900">
    <!-- Main Content -->
    <div class="w-full pt-24 xl:pl-72 lg:pl-72 sm:pl-4">
        <div class="px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Edit patent</h1>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Update the details of your patent below.</p>
        </div>

        <div class="mt-8 px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
                <form action="{{ route('patent.update', $patent->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Basic Information Section -->
                    <div class="space-y-6">
                        <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Basic Information</h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">title</label>
                                    <input type="text" name="title" id="title" value="{{ old('title', $patent->title) }}" required class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <div>
                                    <label for="patent_application_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">patent_application_number</label>
                                    <input type="text" name="patent_application_number" id="patent_application_number" value="{{ old('patent_application_number', $patent->patent_application_number) }}" required class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div>
                                    <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                                    <select name="status" id="status" required class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                        <option value="" disabled {{ old('status', $patent->status) ? '' : 'selected' }}>Select Status</option>
                                        <option value="Pending" {{ old('status', $patent->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="granted" {{ old('status', $patent->status) == 'granted' ? 'selected' : '' }}>Granted</option>
                                        <option value="rejected" {{ old('status', $patent->status) == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                        <option value="under review" {{ old('status', $patent->status) == 'under review' ? 'selected' : '' }}>Under Review</option>
                                        <option value="approved" {{ old('status', $patent->status) == 'approved' ? 'selected' : '' }}>Approved</option>
                                        <option value="finalized" {{ old('status', $patent->status) == 'finalized' ? 'selected' : '' }}>Finalized</option>
                                        <option value="appealed" {{ old('status', $patent->status) == 'appealed' ? 'selected' : '' }}>Appealed</option>
                                        <option value="withdrawn" {{ old('status', $patent->status) == 'withdrawn' ? 'selected' : '' }}>Withdrawn</option>
                                        <option value="other" {{ old('status', $patent->status) == 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="issue_date" class="block text-sm text-gray-600 dark:text-gray-400">Issue Date</label>
                                        <input type="date" name="issue_date" id="issue_date" value="{{ old('issue_date', $patent->issue_date) }}" required class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500" max="{{ \Carbon\Carbon::now()->toDateString() }}">
                                    </div>
                                </div>


                            </div>
                        </div>


                        <!-- Additional Information Section -->
                        <div class="space-y-4">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Additional Information</h2>
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                                <textarea name="description" id="description" rows="3" class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">{{ old('description', $patent->description) }}</textarea>
                            </div>

                            <div class="flex items-center">
                                <input type="checkbox" id="add_to_cv" name="add_to_cv" class="h-5 w-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500" value="1" {{ old('add_to_cv', $patent->add_to_cv) ? 'checked' : '' }}>
                                <label for="add_to_cv" class="ml-2 text-sm font-medium text-gray-700 dark:text-gray-300">Add to CV</label>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="mt-6 flex justify-end space-x-4">
                        <a href="{{ route('patent.index') }}" class="px-6 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-200 dark:bg-gray-700 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600">Cancel</a>
                        <button type="submit" class="px-6 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">Update patent</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
