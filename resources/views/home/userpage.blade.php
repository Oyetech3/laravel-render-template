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
