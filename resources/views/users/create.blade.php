<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chirper</title>
    <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro-v6@44659d9/css/all.min.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <header class="p-4">
        <nav class="flex flex-row items-center justify-center">
            <i class="fa-regular fa-dove text-3xl text-blue-600"></i>
        </nav>
    </header>
    <div class="relative max-w-screen-xs mx-auto">
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 translate-y-1/3 w-full flex flex-col items-center justify-center space-y-6">
            <div class="flex flex-col items-center justify-center text-center space-y-1">
                <h1 class="font-semibold text-2xl text-center">Welcome to Chirper!</h1>
                <p class="text-gray-500">We're excited to have you join our community.</p>
            </div>
            <form action="" method="post" class="px-4 grid grid-flow-row gap-4 w-full">
                <div class="flex flex-col items-start space-y-1">
                    <label for="">Full Name</label>
                    <input type="text" name="name" class="p-2 rounded-md border w-full"
                        placeholder="Enter your full name">
                </div>
                <div class="flex flex-col items-start space-y-1">
                    <label for="">Username</label>
                    <div class="flex w-full">
                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md">
                            <i class="fa-regular fa-at"></i>
                        </span>
                        <input type="text" name="username" class="p-2 rounded-tr-md rounded-br-md border w-full" placeholder="Enter your username">
                    </div>
                </div>
                <div class="flex flex-col items-start space-y-1">
                    <label for="">Email Address</label>
                    <input type="email" name="email" class="p-2 rounded-md border w-full" placeholder="Enter your email address">
                </div>
                <div class="flex flex-col items-start space-y-1">
                    <label for="">Password</label>
                    <input type="password" name="password" class="p-2 rounded-md border w-full" placeholder="Minimum of 8 characters">
                </div>
                <div class="flex flex-col items-start space-y-1">
                    <label for="">Confirm password</label>
                    <input type="password" name="password_confirmed" class="p-2 rounded-md border w-full" placeholder="Re-enter password">
                </div>
                <span>
                    <button type="submit" class="px-4 py-2 rounded-md bg-blue-600 text-white">Register</button>
                </span>
            </form>
        </div>
    </div>
</body>

</html>
