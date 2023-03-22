<x-layout>
    @unless (count($followers) == 0)
        @foreach ($followers as $follower)
            <div class="border-b p-4 flex flex-row items-center justify-between w-full">
                <div class="flex flex-col items-start">
                    <span class="font-semibold">{{ $follower->user_id_1_name }}</span>
                    <span class="text-gray-500">{{ '@' . $follower->user_id_1_username }}</span>
                </div>
                <a href="/users/{{ $follower->user_id_1 }}" class="px-4 py-2 rounded-md bg-blue-600 text-white">View Profile</a>
            </div>
        @endforeach
    @else
    <div class="p-4">
        @if ($user->id == auth()->user()->id)
            <p class="text-gray-500">No followers yet. Start following people to be followed back!</p>
        @else
            <p class="text-gray-500">No followers yet. Be the first to follow!</p>
        @endif
    </div>
    @endunless
</x-layout>