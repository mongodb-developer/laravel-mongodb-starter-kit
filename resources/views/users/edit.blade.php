<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Edit User</h2>
    </x-slot>

    <div class="max-w-xl mx-auto py-10">
        <form action="{{ route('users.update', $user) }}" method="POST" class="space-y-4 bg-white p-6 shadow rounded">
            @csrf
            @method('PUT')

            <div>
                <label class="block">Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                       class="w-full border px-3 py-2 rounded">
                @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                       class="w-full border px-3 py-2 rounded">
                @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="flex justify-between">
                <button type="submit"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-green-600 text-white font-semibold text-sm rounded hover:bg-green-700 transition">
                     💾 <span>Save Changes</span>
                </button>
                <a href="{{ route('users.index') }}" class="text-gray-600 hover:underline">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>
