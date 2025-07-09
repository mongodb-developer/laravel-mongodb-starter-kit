<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Manage Users</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-10">
        @if(session('success'))
            <div class="mb-4 bg-green-100 text-green-800 p-3 rounded">{{ session('success') }}</div>
        @endif

        <div class="bg-white p-6 shadow rounded space-y-4">
            @foreach($users as $user)
                <div class="border-b pb-3">
                    <p><strong>{{ $user->name }}</strong> ({{ $user->email }})</p>
                    <div class="mt-2">
                        <a href="{{ route('users.edit', $user) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                            @csrf @method('DELETE')
                            <button class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
