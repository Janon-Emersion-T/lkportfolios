{{-- Edit --}}

@extends('portal.components.layout')

@section('content')
<div class="min-h-screen flex bg-gray-50 dark:bg-gray-900">
    <!-- Main Content -->
    <div class="w-full pt-24 xl:pl-72 lg:pl-72 sm:pl-4">
        <div class="px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Edit Skill</h1>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Update the details of your skill below.</p>
        </div>

        <div class="mt-8 px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
                <form action="{{ route('skills.update', $skill->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- Skill Name -->
                        <div>
                            <label for="skill" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Skill Name</label>
                            <input type="text" name="skill" id="skill" value="{{ old('skill', $skill->skill) }}" required class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <!-- Skill Type -->
                        <div>
                            <label for="skill_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Skill Type</label>
                            <select name="skill_type" id="skill_type" required class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                <option value="Technical" {{ $skill->skill_type == 'Technical' ? 'selected' : '' }}>Technical</option>
                                <option value="Soft" {{ $skill->skill_type == 'Soft' ? 'selected' : '' }}>Soft</option>
                                <option value="Language" {{ $skill->skill_type == 'Language' ? 'selected' : '' }}>Language</option>
                                <option value="Other" {{ $skill->skill_type == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                        <!-- Skill Level -->
                        <div>
                            <label for="skill_level" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Skill Level</label>
                            <select name="skill_level" id="skill_level" required class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                                <option value="Beginner" {{ $skill->skill_level == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                                <option value="Intermediate" {{ $skill->skill_level == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                                <option value="Advanced" {{ $skill->skill_level == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                                <option value="Expert" {{ $skill->skill_level == 'Expert' ? 'selected' : '' }}>Expert</option>
                            </select>
                        </div>
                        <div>
                            <label for="use_on_CV" class="block text-lg font-medium text-gray-700 dark:text-gray-300">
                                Show on CV
                            </label>
                            <input type="checkbox" id="use_on_CV" name="use_on_CV" class="mt-1 h-5 w-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500" value="1" {{ old('use_on_CV', $skill->use_on_CV) ? 'checked' : '' }}>
                        </div>

                    </div>


                    <div class="mt-6 flex justify-end space-x-4">
                        <a href="{{ route('skills.index') }}" class="px-6 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-200 dark:bg-gray-700 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600">Cancel</a>
                        <button type="submit" class="px-6 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">Update Skill</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
 