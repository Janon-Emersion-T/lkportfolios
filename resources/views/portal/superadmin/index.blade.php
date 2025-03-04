@extends('portal.components.layout')

@section('content')
<div class="min-h-screen flex flex-col p-6">
    <h1 class="text-3xl font-bold text-gray-800 dark:text-white">
        <span class="text-blue-600 dark:text-blue-400">Dashboard</span>
    </h1>
    <p class="mt-2">Manage all users, settings, and website operations.</p>

    <div class="grid grid-cols-3 gap-4 mt-6">
        <div class="p-4 bg-white shadow rounded">
            <h2 class="text-xl font-semibold">Total Users</h2>
            <p class="text-2xl font-bold">1234</p>
        </div>
        <div class="p-4 bg-white shadow rounded">
            <h2 class="text-xl font-semibold">Pending Approvals</h2>
            <p class="text-2xl font-bold">10</p>
        </div>
        <div class="p-4 bg-white shadow rounded">
            <h2 class="text-xl font-semibold">System Logs</h2>
            <p class="text-2xl font-bold">View Logs</p>
        </div>
    </div>
</div>
@endsection
