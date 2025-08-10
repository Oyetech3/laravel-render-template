<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Unsubscribed Comfirm</title>
    @vite('resources/css/app.css')
    <link rel="icon" href="./images/logocopy.png">
</head>
<body>
    <div class="container mx-auto px-4 py-16">
        <div class="max-w-md mx-auto bg-white rounded-lg shadow-lg p-8 text-center">
            <div class="mb-6">
                <svg class="w-16 h-16 mx-auto text-yellow-500 mb-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"/>
                </svg>
                <h1 class="text-2xl font-bold text-gray-800 mb-2">Confirm Unsubscribe</h1>
                <p class="text-gray-600">Are you sure you want to unsubscribe from our newsletter?</p>
                <p class="text-sm text-gray-500 mt-2">Email: {{ $subscriber->email }}</p>
            </div>

            <div class="space-y-4">
                <form action="{{ route('newsletter.unsubscribe.process', $subscriber->unsubscribe_token) }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white py-3 px-6 rounded-lg font-semibold transition-colors duration-300">
                        Yes, Unsubscribe Me
                    </button>
                </form>

                <a href="{{ url('/') }}" class="block w-full bg-gray-500 hover:bg-gray-600 text-white py-3 px-6 rounded-lg font-semibold transition-colors duration-300">
                    Cancel
                </a>
            </div>

            <div class="mt-6 p-4 bg-blue-50 rounded-lg">
                <p class="text-sm text-blue-800">
                    <strong>We'll miss you!</strong> You'll no longer receive updates about new collections, exclusive offers, or beading tips.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
