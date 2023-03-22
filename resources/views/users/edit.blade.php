<x-layout>
    <div class="p-4 flex flex-col items-start space-y-4">
        <img alt="{{ 'Picture of ' . $user->name }}" src="{{ asset('storage/'.$user->avatar) }}" class="h-36 w-36 rounded-lg object-cover" />
        <form action="/users/{{ $user->id }}/update" method="post" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')
            <div class="flex flex-col items-start space-y-1">
                <label for="" class="font-semibold">Update profile picture</label>
                <input type="file" name="avatar" class="border rounded-md w-full">
            </div>
            <button type="submit" name="update" class="px-4 py-2 rounded-md bg-blue-600 text-white">Update</button>
        </form>
    </div>
</x-layout>