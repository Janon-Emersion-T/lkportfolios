{{-- Show --}}

@extends('portal.components.layout')

@section('content')
<div class="min-h-screen flex bg-gray-900">
    <div class="w-full pt-24 xl:pl-72 lg:pl-72 sm:pl-4">
        <div class="px-4 sm:px-6 lg:px-8">
            <p class="mt-2 text-sm text-gray-400"></p>
        </div>

        <div class="mt-8 px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
                <h2 class="text-2xl font-semibold text-white mb-4">Skill Details</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-gray-400">Skill Name</h3>
                        <p class="text-lg text-white">{{ $skill->skill }}</p>
                    </div>
                    <div>
                        <h3 class="text-gray-400">Skill Type</h3>
                        <p class="text-lg text-white">{{ $skill->skill_type }}</p>
                    </div>
                    <div>
                        <h3 class="text-gray-400">Skill Level</h3>
                        <p class="text-lg text-white">{{ $skill->skill_level }}</p>
                    </div>
                    <div>
                        <h3 class="text-gray-400">Show on CV</h3>
                        <p class="text-lg text-white">
                            {{ $skill->use_on_CV ? 'Yes' : 'No' }}
                        </p>
                    </div>

                </div>
                <div class="mt-6 flex space-x-4">
                    <a href="{{ route('skills.index') }}" class="text-white bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-lg">Back</a>
                    <a href="{{ route('skills.edit', $skill->id) }}" class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg">Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
