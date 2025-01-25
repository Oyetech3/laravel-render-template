<div class="my-10">

    <!--Categories-->
    <div class="relative inline-block ss:hidden mx-2 sss:mx-5">
        <button id="drop" class="mybut h-8 w-full px-2 rounded-xl bg-gray-200 flex items-center justify-between">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
        <span>Browse Collections</span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 ml-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
        </svg>
        </button>
        <ul class="myul absolute z-10 hidden bg-white border border-gray-300 rounded-md shadow-lg mt-1 w-full">
        <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline-block mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            All Collections
        </li>
        @foreach ($collections as $item)
        <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">{{$item->collection_name}}</li>
        @endforeach
        </ul>

    </div>
    <!--Categories end-->


    <h1 class="heads mt-7">All Products</h1>
    <div class="w-20 h-1 m-auto mt-4 bg-secondary-10"></div>

    <div id="arrivals" class="grid grid-cols-1 vvs:grid-cols-2 mm:grid-cols-3 lg:grid-cols-4 place-items-center gap-10 w-full  px-6 py-12 pb-6">

        <!--each prodcut-->

        @foreach ($products as $item)

        <a class="proanchor" href="">
            <img class="proimg" src="./images/{{$item->image}}" alt="">
            <p class="pt-2 text-lg px-1.5 bg-gray-50 rounded-lg leading-6 text-secondary-9 font-semibold">{{$item->title}}</p>
            <div class="flex justify-between items-center font-semibold px-1.5 bg-gray-50 rounded-lg">
                @empty($item->naira_discount)
                <p class=" text-pink-600 text-lg">₦{{$item->naira_price}}</p>
                @else
                <p class="line-through text-gray-400 text-sm">₦{{$item->naira_price}}</p>
                <p class="text-pink-600 text-lg">₦{{$item->naira_discount}}</p>
                @endempty
            </div>
            <div class="flex gap-2 py-2 px-1.5 justify-between items-center w-full bg-gray-50 rounded-lg">

                @if ($liked->contains($item->id))
                <form action="{{url('/delete', $item->id)}}" method="POST" enctype="multipart/form-data" class="w-10 bg-transparent">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="product_id" value="{{ $item->id }}">
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 fill-secondary-9 hover:fill-secondary-9 transition transform hover:scale-110">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg>
                    </button>
                </form>

                @else
                <form action="{{url('/liked_product', $item->id)}}" method="POST" enctype="multipart/form-data" class="w-10 bg-transparent">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $item->id }}">
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 stroke-secondary-9 hover:fill-secondary-9 transition transform hover:scale-110">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg>
                    </button>
                </form>
                @endif


                <form action="{{url('/add_to_cart', $item->id)}}" method="POST" class="bg-transparent w-full ">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$item->id}}" >
                    <button type="submit" class="flex justify-center items-center w-full bg-gradient-to-r from-teal-500 to-teal-700 shadow-lg text-center h-8 rounded-lg hover:from-teal-700 hover:to-teal-500 transition text-white gap-4 font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                        <p>Add to cart</p>
                    </button>
                </form>

            </div>
        </a>

        @endforeach



    </div>

    <!--button-->
    <div class="pt-4 flex justify-center items-center space-x-2">
        @foreach ($products->links()->elements[0] as $page => $url)
            @if ($page == $products->currentPage())
                <span
                    class="px-4 py-2 bg-secondary-9 text-white rounded-md shadow-md cursor-default">
                    {{ $page }}
                </span>
            @else
                <a
                    href="{{ $url }}"
                    class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 hover:text-gray-900 transition-colors duration-300 shadow-md">
                    {{ $page }}
                </a>
            @endif
        @endforeach
    </div>

    <!--button end-->
</div>
