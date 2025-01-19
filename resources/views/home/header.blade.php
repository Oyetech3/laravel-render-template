<div class="flex sticky top-0 z-30 items-center justify-between bg-white w-full h-16 px-1 vs:px-5 py-1">
    <!--Logo-->
    <a href="{{url('/')}}" id="logo" class="flex items-center cursor-pointer ">
        <img class="size-8 sss:size-12 vs:size-16" src="./images/logomut.png" alt="">
        <h3 class="font-extrabold text-sm sss:text-xl vs:text-2xl">Mutmine<span class="text-primary-1">Beads</span></h3>
    </a>
    <!--links-->
    <div class="">
        <nav id="nav" class="hidden border-red-700 transition-all duration-400 bg-white absolute z-20 top-0 w-1/2 h-screen left-1/2 mm:block mm:bg-transparent mm:w-auto mm:h-auto mm:static">
            <div id="close" class="mm:hidden place-self-end mx-6 mt-8 border-2 border-pink-500 w-fit cursor-pointer hover:bg-pink-200 transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </div>
            <ul class="flex w-mini flex-col py-5 px-10 gap-5 mm:flex-row mm:px-0 mm:justify-between ">
                <li class="links"><a href="{{url('/')}}">Home</a></li>
                <li class="links"><a href="">Products</a></li>
                <li class="links"><a href="">Services</a></li>
                <li class="links"><a href="">Contact</a></li>
            </ul>
        </nav>
    </div>
    <!--links end-->

    <!--additional link-->
    <div class="flex items-center justify-end w-fin">
        <a href="" class="px-0.5 sss:px-2 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 sss:size-6 hover:fill-black">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
            </svg>
        </a>
        <a href="" class="relative cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 sss:size-6 hover:fill-black">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
            </svg>
            <div class="absolute -top-2 sss:-top-2.5 left-2.5 sss:left-3 bg-primary-1 rounded-lg w-3 h-3.5 sss:w-4 sss:h-5 text-center">
                <p class="-translate-y-0.5 sss:-translate-y-0 sss:text-sm text-small font-semibold text-white">0</p>
            </div>

        </a>
        <div  class="flex items-center h-10 px-0.5 sss:px-2 cursor-pointer">

            @if (Route::has('login'))
            @auth
            @include('home.navmenu')

            @else
            <svg id="pro" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 sss:size-6 hover:fill-black">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
            <a href="{{url('login')}}" class="hidden lg:block ml-1 px-3.5 cursor-pointer bg-pink-500 hover:bg-pink-600 h-10 text-white py-1.5 rounded-md">
                <p class="">Sign In</p>
            </a>

            @endauth
            @endif
        </div>


        <div id="log" class="lg:invisible hidden absolute rounded-lg top-16 bg-secondary-9 p-8">
            <a href="{{url(route('login'))}}" class="block ml-1 px-3.5 cursor-pointer bg-pink-500 hover:bg-pink-600 h-10 text-white py-1.5 rounded-md">
                <p class="">Sign In</p>
            </a>
            <a href="{{url(route('register'))}}" class="block mt-5 ml-1 px-3.5 cursor-pointer bg-teal-700 hover:bg-teal-800 h-10 text-white py-1.5 rounded-md">
                <p class="">Register</p>
            </a>
        </div>
        <div id="menu" class="mm:hidden cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 sss:size-6 hover:fill-black">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </div>
    </div>
    <!--additional link end -->
</div>
