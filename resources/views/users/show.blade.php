<x-layout>
    <div class="py-4">
        <div class="px-4 pb-4 flex flex-row items-start justify-between">
            <div class="flex flex-col items-start space-y-2">
                @unless (empty($user->avatar))
                    <img alt="{{ 'Picture of ' . auth()->user()->name }}" src="{{ asset('storage/' . $user->avatar) }}" class="h-36 w-36 rounded-lg object-cover" />
                @else
                    <i class="fa-solid fa-user-circle text-9xl"></i>
                @endunless
                <div class="flex flex-col items-start space-y-4">
                    <div class="flex flex-col items-start">
                        <span class="font-semibold text-2xl">{{ $user->name }}</span>
                        <span class="text-gray-500">{{ '@' . $user->username }}</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <div class="flex flex-row items-center space-x-2">
                        <span class="text-gray-500"><a href="/users/{{ $user->id }}/followers" class="font-semibold text-black duration-200 hover:underline hover:underline-offset-2">{{ count($followers) }}</a> followers</span>
                        <span class="hidden sm:block" aria-hidden="true">&middot;</span>
                        <span class="text-gray-500"><a href="/users/{{ $user->id }}/following" class="font-semibold text-black duration-200 hover:underline hover:underline-offset-2">{{ count($following) }}</a> following</span>
                    </div>
                </div>
            </div>
        @unless (count($follows) == 0)
        @foreach ($follows as $follow)
            @if ($user->id != auth()->user()->id)
                @if ($follow->user_id_2 == $user->id)
                    <a href="/users/{{ $user->id }}/unfollow" class="px-4 py-2 rounded-md bg-gray-300 text-black">Unfollow</a>
                @else
                    <a href="/users/{{ $user->id }}/follow" class="px-4 py-2 rounded-md bg-blue-600 text-white">Follow</a>
                @endif
            @endif
        @endforeach
        @else
            @if ($user->id != auth()->user()->id)
                <a href="/users/{{ $user->id }}/follow" class="px-4 py-2 rounded-md bg-blue-600 text-white">Follow</a>
            @else
            @endif
        @endunless
        </div>

        <div class="border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab"
                        data-tabs-target="#profile" type="button" role="tab" aria-controls="profile"
                        aria-selected="false">Chirps</button>
                </li>
                <li role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab"
                        aria-controls="contacts" aria-selected="false">Likes</button>
                </li>
            </ul>
        </div>
        <div id="myTabContent">
            <div class="hidden" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                @foreach ($user->chirps as $chirp)
                <div class="border-b">
                    <div class="flex items-start gap-4 p-4">
                        <a href="#" class="block shrink-0">
                            <img alt="{{ 'Picture of ' . $user->name }}" src="{{ asset('storage/'.$user->avatar) }}" class="h-14 w-14 rounded-lg object-cover" />
                        </a>
                        <div class="space-y-4 w-full">
                            <span class="space-y-1">
                                <div class="flex flex-row items-center justify-between w-full">
                                    <div class="font-medium space-x-1">
                                        @foreach ($chirp->users as $user)
                                            <span class="font-semibold">{{ $user->name }}</span>
                                            <span class="font-normal text-gray-500">{{ ' @' . $user->username }}</span>
                                        @endforeach
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
                                            <a href="/chirps/unlike/{{ $chirp->id }}"><i class="fa-regular fa-heart"></i></a>
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
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="hidden" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
            @unless (count($likes) == 0)
                @foreach ($likes as $like)
                    @if ($like->user_id == $user->id)
                    <div class="border-b">
                        <div class="flex items-start gap-4 p-4">
                            <a href="#" class="block shrink-0">
                                <img alt="{{ 'Picture of ' . $like->user->name }}" src="{{ asset('storage/'.$user->avatar) }}" class="h-14 w-14 rounded-lg object-cover" />
                            </a>
                            <div class="space-y-4 w-full">
                                <span class="space-y-1">
                                    <div class="flex flex-row items-center justify-between w-full">
                                        <div class="font-medium space-x-1">
                                            <span class="font-semibold">{{ $like->user->name }}</span>
                                            <span class="font-normal text-gray-500">{{ ' @' . $like->user->username }}</span>
                                        </div>
                                        <span class="text-sm text-gray-500">
                                            {{ date('H:i:s', strtotime($like->chirp->created_at)) }}
                                        </span>
                                    </div>
                                    <p class="text-gray-700">
                                        {{ $like->chirp->subject }}
                                    </p>
                                </span>
                    
                                <div class="mt-2 flex flex-row items-center space-x-6">                    
                                    <div class="flex items-center space-x-2 text-gray-500">
                                        <a href="#"><i class="fa-solid fa-retweet"></i></a>
                                        <span class="text-sm"></span>
                                    </div>

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
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            @endunless
            </div>
        </div>
    </div>
</x-layout>