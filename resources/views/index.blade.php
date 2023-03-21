<x-layout>
<div class="border-b">
    <div class="flex items-start gap-4 px-4 py-4 xl:pl-4 xl:pr-0">
        <a href="#" class="block shrink-0">
            @unless (empty(auth()->user()->avatar))
                <img alt="Speaker" src="{{ auth()->user()->avatar }}" class="h-14 w-14 rounded-lg object-cover" />
            @else
                <i class="fa-solid fa-user-circle text-3xl"></i>
            @endunless
        </a>
        <form action="/chirp/create" method="post" class="w-full flex flex-col items-end space-y-2">
            @csrf
            <textarea name="subject" id="" class="rounded border border-gray-200 w-full h-32 resize-none p-2" cols="30" rows="10" placeholder="What's going on?"></textarea>
            <div class="flex flex-row items-center justify-between w-full">
                <span class="text-sm text-gray-500">150 characters remain</span>
                <button type="submit" class="px-3 py-2 w-16 rounded-md bg-blue-600 text-white">Chirp</button>
            </div>
        </form>
    </div>
</div>
@unless (count($chirps) == 0)
@foreach ($chirps as $chirp)
<div class="border-b">
    <div class="flex items-start gap-4 py-4 pl-4">
        <a href="#" class="block shrink-0">
            <img alt="Speaker" src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8YXZhdGFyfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=800&q=60" class="h-14 w-14 rounded-lg object-cover" />
        </a>

        <div class="space-y-4 w-full">
            <span class="space-y-1">
                <div class="flex flex-wrap items-center w-full lg:flex-row lg:justify-between">
                    <div class="font-medium space-x-1">
                        <span class="font-semibold">{{ $chirp->name }}</span>
                        <span class="font-normal text-gray-500">{{ ' @' . $chirp->username }}</span>
                    </div>
                    <span class="text-sm text-gray-500">
                        {{ date('H:i:s', strtotime($chirp->created_at)) }}
                    </span>
                </div>
                <p class="text-gray-700">
                    {{ $chirp->subject }}
                </p>
            </span>

            <div class="mt-2 flex flex-row items-center space-x-6">
                <div class="flex items-center space-x-2 text-gray-500">
                    <a href="#"><i class="fa-regular fa-message"></i></a>
                    <span href="#" class="text-sm">14</span>
                </div>

                <div class="flex items-center space-x-2 text-gray-500">
                    <a href="#"><i class="fa-solid fa-retweet"></i></a>
                    <span class="text-sm">14</span>
                </div>

                <div class="flex items-center space-x-2 text-gray-500">
                    <a href="#"><i class="fa-regular fa-heart"></i></a>
                    <span class="text-sm">14</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@else
<div class="p-4 flex flex-row items-center justify-center">
    <p class="text-gray-400">Hmm, nothing to see yet. Create your first chirp!</p>
</div>
@endunless
</x-layout>