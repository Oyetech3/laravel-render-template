<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mutminebeads</title>
    @vite('resources/css/app.css')
    <link rel="icon" href="./images/logocopy.png">
</head>
<body>

    <!--body start -->

    <div class="relative ">
        <!--header start-->
        <!--firstheader start-->
        @include('home.header')
        <!--firstheader end-->

        <!--secondheader-->
        @include('home.miniheader')
        <!--secondheader end-->

        <!--header end-->

        @if(session()->has('message'))
            <div class="bg-green-100 mt-2 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{session()->get('message')}}</span>
                <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" aria-label="Close">
                    <span class="text-green-700 hover:text-green-900">&times;</span>
                </button>
            </div>
         @endif

        <!--slider info-->
        @include('home.slider')
        <!--slider info-->


        <!--New Arrivals-->
        @include('home.products')
        <!--Trending Products end-->

        <!--Newsletter start-->
        @include('home.footer')
        <!--Currency end-->

    </div>

    <!--body end-->


    <!--javascript-->
    <script src="./js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        document.querySelectorAll('[aria-label="Close"]').forEach(button => {
        button.addEventListener('click', () => {
        button.parentElement.remove();
            });
        });
    </script>


</body>
</html>
