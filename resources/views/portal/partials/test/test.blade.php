@extends('portal.components.layout')

@section('content')
<div class="min-h-screen flex bg-gray-900">
    <div class="w-full pt-24 xl:pl-72 lg:pl-72 sm:pl-4">
        <div class="px-4 sm:px-6 lg:px-8">
            <p class="mt-2 text-sm text-gray-400"></p>
        </div>

        <!-- Action Bar -->
        <div class="mt-8 px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6 flex items-center justify-between border-b border-gray-200 dark:border-gray-700">
                <div class="flex items-center space-x-4">
                    <!-- Search Bar -->
                    <div class="relative flex-grow">
                        <input type="text" id="searchInput" placeholder="Search test..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                        <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
                <!-- Add New test Button -->
                <a href="{{ route('test.create') }}" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-2.5 transition-all duration-200 ease-in-out transform hover:scale-105 focus:outline-none">
                    <i class="fas fa-plus mr-2"></i> Add test
                </a>
            </div>
        </div>

        <!-- Skills Table -->
        <div class="mt-8 px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">ID</th>
                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Tests</th>
                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">score</th>
                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="testTable" class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                        @if(isset($test) && $test->count() > 0)
                        @foreach ($test as $test)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                            <td class="p-4 text-sm font-medium text-white">{{ $loop->iteration }}</td>
                            <td class="p-4 text-sm font-medium text-white">{{ $test->test }}</td>
                            <td class="p-4 text-sm font-medium text-white">{{ $test->score }}</td>
                            <td class="p-4 space-x-2 whitespace-nowrap">
                                <a href="{{ route('test.show', $test->id) }}" class="inline-flex items-center px-4 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700">
                                    <i class="fas fa-eye mr-2"></i> View
                                </a>
                                <a href="{{ route('test.edit', $test->id) }}" class="inline-flex items-center px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                                    <i class="fas fa-edit mr-2"></i> Edit
                                </a>
                                <form action="{{ route('test.destroy', $test->id) }}" method="POST" class="inline" id="delete-form-{{ $test->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete({{ $test->id }})" class="inline-flex items-center px-4 py-2 text-white bg-red-600 rounded-lg hover:bg-red-700">
                                        <i class="fas fa-trash-alt mr-2"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="5" class="p-4 text-center text-gray-400">No test found.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Search Functionality -->
<script>
    document.getElementById("searchInput").addEventListener("keyup", function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll("#testTable tr");

        rows.forEach(row => {
            let test = row.querySelector("td:nth-child(2)"); // Skill Name
            let score = row.querySelector("td:nth-child(3)"); // Skill Type

            if (test && score) {
                let testText = test.textContent.toLowerCase();
                let scoreText = score.textContent.toLowerCase();

                if (testText.includes(filter) || typeText.includes(filter) || levelText.includes(filter)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            }
        });
    });

</script>

<!-- JavaScript for Delete Confirmation -->
<script>
    function confirmDelete(testId) {
        if (confirm("Are you sure you want to delete this test? This action cannot be undone!")) {
            document.getElementById('delete-form-' + testId).submit();
        }
    }

</script>
@endsection
