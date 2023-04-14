<x-layout>
    @foreach ($users as $user)
    <div class="border-b p-4 flex flex-row items-center justify-between w-full">
        <div class="flex flex-col items-start">
            <span class="font-semibold">{{ $user->name }}</span>
            <span class="text-gray-500">{{ '@' . $user->username }}</span>
        </div>
        <a href="/users/{{ $user->id }}" class="px-4 py-2 rounded-md bg-blue-600 text-white">View Profile</a>
    </div>
    @endforeach
</x-layout>