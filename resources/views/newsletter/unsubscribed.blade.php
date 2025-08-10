<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    <link rel="icon" href="./images/logocopy.png">
</head>
<body>
    <div class="container mx-auto px-4 py-16">
        <div class="max-w-md mx-auto bg-white rounded-lg shadow-lg p-8 text-center">
            <div class="mb-6">
                <svg class="w-16 h-16 mx-auto text-green-500 mb-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                </svg>
                <h1 class="text-2xl font-bold text-gray-800 mb-2">Successfully Unsubscribed</h1>
                <p class="text-gray-600">You have been unsubscribed from our newsletter.</p>
            </div>

            <div class="mb-6">
                <p class="text-sm text-gray-600">
                    We're sorry to see you go! If you change your mind, you can always subscribe again from our website.
                </p>
            </div>

            <div class="space-y-3">
                <a href="{{ url('/') }}" class="block w-full bg-pink-500 hover:bg-pink-600 text-white py-3 px-6 rounded-lg font-semibold transition-colors duration-300">
                    Return to Homepage
                </a>

                <a href="{{ url('/products') }}" class="block w-full border border-pink-500 text-pink-500 hover:bg-pink-50 py-3 px-6 rounded-lg font-semibold transition-colors duration-300">
                    Browse Products
                </a>
            </div>
        </div>
    </div>
</body>
</html>
