<x-layout>
<div class="border-b">
    <div class="flex items-start gap-4 p-4 xl:pl-4 xl:pr-0">
        <a href="#" class="block shrink-0">
            @unless (empty(auth()->user()->avatar))
                <img alt="{{ 'Picture of ' . auth()->user()->name }}" src="{{ asset('storage/' . auth()->user()->avatar) }}" class="h-14 w-14 rounded-lg object-cover" />
            @else
                <i class="fa-solid fa-user-circle text-3xl"></i>
            @endunless
        </a>
        <form action="/chirps/create" method="post" class="w-full flex flex-col items-end space-y-2">
            @csrf
            <textarea name="subject" id="textarea" class="rounded border border-gray-200 w-full h-32 resize-none p-2" cols="30" rows="10" placeholder="What's going on?" maxlength="200"></textarea>
            <div class="flex flex-row items-center justify-between w-full">
                <span class="text-sm text-gray-500" id="charactersLeft"></span>
                <button type="submit" class="px-3 py-2 w-16 rounded-md bg-blue-600 text-white" id="chirp-btn">Chirp</button>
            </div>
        </form>
    </div>
</div>

@unless (count($chirps) == 0)
@foreach ($chirps as $chirp)
    @foreach ($chirp->users as $user)
            <div class="border-b">
                <div class="flex items-start gap-4 py-4 px-4">
                    <a href="#" class="block shrink-0">
                        <img alt="{{ 'Picture of ' . $user->name }}" src="{{ asset('storage/'.$user->avatar) }}" class="h-14 w-14 rounded-lg object-cover" />
                    </a>
            
                    <div class="space-y-4 w-full">
                        <span class="space-y-1">
                            <div class="flex flex-wrap items-center w-full lg:flex-row lg:justify-between">
                                <div class="font-medium space-x-1">
                                    <span class="font-semibold">{{ $user->name }}</span>
                                    <a href="/users/{{ $user->id }}" class="font-normal text-gray-500">{{ ' @' . $user->username }}</a>
                                </div>
                                <span class="text-sm text-gray-500">
                                    {{ date('H:i:s', strtotime($chirp->created_at)) }}
                                </span>
                            </div>
                            <p class="text-gray-700">
                                {{ $chirp->subject }}
                            </p>
                        </span>
            
                        <div class="flex flex-row item-center justify-between w-full">
                            <div class="mt-2 flex flex-row items-center space-x-6">
                                @unless (count($rechirps) == 0)                            
                                    @foreach ($rechirps as $rechirp)
                                        @if ($rechirp->chirp_id == $chirp->id && $rechirp->user_id == auth()->user()->id)
                                            <div class="flex items-center space-x-2 text-green-600">
                                                <a href="/chirps/unrechirp/{{ $chirp->id }}"><i class="fa-solid fa-retweet"></i></a>
                                                <span href="#" class="text-sm">{{ count($rechirps) }}</span>
                                            </div>
                                        @else
                                            <div class="flex items-center space-x-2 text-gray-500">
                                                <a href="/chirps/rechirp/{{ $chirp->id }}"><i class="fa-regular fa-retweet"></i></a>
                                                <span href="#" class="text-sm"></span>
                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                <div class="flex items-center space-x-2 text-gray-500">
                                    <a href="/chirps/rechirp/{{ $chirp->id }}"><i class="fa-regular fa-retweet"></i></a>
                                    <span href="#" class="text-sm"></span>
                                </div>
                                @endunless
                                @unless (count($likes) == 0)                            
                                    @foreach ($likes as $like)
                                        @if ($like->chirp_id == $chirp->id && $like->user_id == auth()->user()->id)
                                            <div class="flex items-center space-x-2 text-red-400">
                                                <a href="/chirps/unlike/{{ $chirp->id }}"><i class="fa-solid fa-heart"></i></a>
                                                <span href="#" class="text-sm">{{ count($likes) }}</span>
                                            </div>
                                        @else
                                            <div class="flex items-center space-x-2 text-gray-500">
                                                <a href="/chirps/like/{{ $chirp->id }}"><i class="fa-regular fa-heart"></i></a>
                                                <span href="#" class="text-sm"></span>
                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                <div class="flex items-center space-x-2 text-gray-500">
                                    <a href="/chirps/like/{{ $chirp->id }}"><i class="fa-regular fa-heart"></i></a>
                                    <span href="#" class="text-sm"></span>
                                </div>
                                @endunless
                            </div>
                            <div class="text-gray-500">
                                <a href="/chirps/delete/{{ $chirp->id }}"><i class="fa-regular fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endforeach
@endforeach
@else
<div class="p-4 flex flex-row items-center justify-center">
    <p class="text-gray-400">Hmm, nothing to see yet. Create your first chirp!</p>
</div>
@endunless
</x-layout>
<script>
    var textarea = document.getElementById('textarea');

    window.onload = textareaLengthCheck();

    function textareaLengthCheck() {
        var textArea = textarea.value.length;
        var charactersLeft = 200 - textArea;
        var count = document.getElementById('charactersLeft');
        count.innerHTML = "Remaining characters left: " + charactersLeft;
    }

    textarea.addEventListener('keyup', textareaLengthCheck, false);
    textarea.addEventListener('keydown', textareaLengthCheck, false);
</script>