<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MutmineBeads</title>
    @vite('resources/css/app.css')
    <link rel="icon" href="./images/logocopy.png">
</head>
<body>

    <div class="relative">

        <!--header-->
        @include('home.header')
        <!--header end-->

        <!--Categories-->
        @include('home.collections')
         <!--Categories end-->



        <!--Newsletter start-->
        @include('home.footer')
        <!--Currency end-->

    </div>

    <script src="./js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
</body>
</html>
