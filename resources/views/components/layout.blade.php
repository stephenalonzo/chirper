<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chirper</title>
    <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro-v6@44659d9/css/all.min.css" rel="stylesheet"
        type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="grid grid-flow-row gap-0 lg:grid-cols-6 xl:w-2/3 xl:mx-auto">
        <div class="p-4 hidden h-screen flex-col justify-between border-r bg-white lg:flex" id="sidebar">
            <div class="space-y-8">
                <div class="flex flex-row items-center justify-between">
                    <i class="fa-regular fa-dove text-3xl text-blue-600"></i>
                    <button type="button" id="close" class="flex lg:hidden"><i
                            class="fa-regular fa-times text-2xl text-gray-700"></i></button>
                </div>
                <nav aria-label="Main Nav" class="mt-6 flex flex-col space-y-4">
                    <a href="/" class="flex items-center gap-2 text-gray-700">
                        <i class="fa-regular fa-home text-lg"></i>

                        <span class="font-medium">Home</span>
                    </a>

                    <details class="group [&_summary::-webkit-details-marker]:hidden">
                        <summary
                            class="flex cursor-pointer items-center justify-between text-gray-700">
                            <div class="flex items-center gap-2">
                                <i class="fa-regular fa-user text-lg"></i>

                                <a href="/users/{{ auth()->user()->id }}" class="font-medium">Profile</a>
                            </div>

                            <span class="shrink-0 transition duration-300 group-open:-rotate-180">
                                <i class="fa-solid fa-chevron-down text-sm"></i>
                            </span>
                        </summary>

                        <nav aria-label="Teams Nav" class="mt-2 flex flex-col px-4 space-y-2">
                            <a href="/users/{{ auth()->user()->id }}/edit"
                                class="flex items-center gap-2 rounded-lg px-4 py-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                                <i class="fa-regular fa-pen-to-square"></i>
                                <span class="text-sm font-medium">Edit Profile</span>
                            </a>
                        </nav>
                    </details>
                </nav>
            </div>
            <a href="/logout" class="px-4 py-2 rounded-md flex items-center gap-2 bg-gray-200 text-black">
                <i class="fa-regular fa-right-from-bracket"></i>
                <span class="font-medium">Logout</span>
            </a>
        </div>
        <div class="lg:col-span-5">
            <header>
                <div class="mx-auto flex h-16 w-full items-center justify-between px-4 border-b">
                    <div class="flex flex-row items-center justify-between w-full">
                        <button type="button" class="lg:hidden" id="bars"><i
                                class="fa-solid fa-bars-sort text-3xl text-blue-600"></i></button>
                        <span class="font-semibold text-xl hidden lg:flex">{{ Str::ucfirst(Route::currentRouteName()) }}</span>
                        <form action="/discover" class="mb-0">
                            <div class="relative">
                                <input class="h-10 rounded-lg border border-gray-200 pl-3 pr-10 placeholder-gray-300 focus:z-10" placeholder="Discover users" type="text" name="search" />
                                <button type="submit"
                                    class="absolute inset-y-0 right-0 rounded-r-lg p-2 text-gray-600">
                                    <i class="fa-solid fa-search text-sm"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </header>
            {{ $slot }}
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
    <script>
        const bars = document.getElementById("bars");
        const sidebar = document.getElementById("sidebar");
        const close = document.getElementById("close");
        const chirpBtn = document.getElementById("chirp-btn");

        bars.addEventListener('click', () => {
            sidebar.classList.remove("hidden");
            sidebar.classList.toggle("flex");
            sidebar.classList.toggle("absolute");
            sidebar.classList.toggle("w-full");
            sidebar.classList.toggle("z-50");
        });

        close.addEventListener('click', () => {
            sidebar.classList.toggle("hidden");
            sidebar.classList.remove("flex");
            sidebar.classList.remove("absolute");
            sidebar.classList.remove("w-full");
            sidebar.classList.remove("z-50");
        });
    </script>
</body>

</html>