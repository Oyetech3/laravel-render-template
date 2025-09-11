<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carts</title>
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

        <!--header end-->
        @if(session()->has('message'))
            <div class="bg-green-100 mt-2 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{session()->get('message')}}</span>
                <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" aria-label="Close">
                    <span class="text-green-700 hover:text-green-900">&times;</span>
                </button>
            </div>
        @endif

        <div class="my-10">
            <h1 class="heads mt-7">Carts</h1>
            <div class="w-16 h-1 m-auto mt-4 bg-secondary-10"></div>

            <div class="w-full mt-8 mb-8 overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                  <table class="w-full whitespace-no-wrap">
                    <thead>
                      <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Product</th>
                        <th class="px-4 py-3">Title</th>
                        <th class="px-4 py-3">Price</th>
                        <th class="px-4 py-3">Quantity</th>
                        <th class="px-4 py-3">Total</th>
                        <th class="px-4 py-3">Remove</th>
                      </tr>
                    </thead>

                    <?php
                    $totalprice = 0;
                    ?>

                    @foreach ($cart as $cart)

                    <tbody class="bg-white divide-y border-b dark:divide-gray-700 dark:bg-gray-800">
                        <tr class="text-gray-700 dark:text-gray-400">
                          <td class="px-4 py-2">
                            <img class="size-20 rounded-lg shadow-md" src="{{ $cart->image_url }}" />
                          </td>
                          <td class="px-4 py-2">{{$cart->title}}</td>
                          <td class="px-4 py-2">₦{{$cart->naira_price}}</td>
                          <td class="px-4 py-2">
                            <form action="{{url('/update_quantity', $cart->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input class="w-16" type="number" name="quantity" value="{{$cart->quantity}}" >
                                <button class="bg-secondary-9 p-1 text-white rounded-full" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                    </svg>
                                </button>
                            </form>
                          </td>
                          <td class="px-4 py-2">
                            ₦{{ number_format((float) str_replace(',', '', $cart->naira_price) * (int) $cart->quantity) }}
                          </td>
                          <td class="px-4 py-2">
                            <a onclick="return confirm('Are you sure to delete')" href="{{url('/delete_cart', $cart->id)}}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                  </svg>
                            </a>
                          </td>
                        </tr>
                    </tbody>

                    <?php
                    $cleanPrice = (float) str_replace(',', '', $cart->naira_price);
                    $totalprice = $totalprice + ($cleanPrice * $cart->quantity);
                    ?>

                    @endforeach

                  </table>
                </div>
            </div>

            <div class="lg:w-2/5 border mx-4 lg:place-self-end mt-8 rounded-lg shadow-md">
                <div class="border-b py-3">
                    <h2 class="mx-5 text-xl font-semibold text-pink-500">Cart Totals </h2>
                </div>
                <div class="border-b text-secondary-9 flex justify-between px-8 py-2 text-lg">
                    <p>Totals </p>
                    <p>₦{{$totalprice}}</p>
                </div>
                <form class="px-8 py-2" action="{{url('/checkout')}}" method="POST">
                    @csrf
                    <input type="hidden" name="total" >
                    <button class="bg-teal-700 text-white text-lg font-semibold w-full p-4 rounded-full" type="submit">Proceed to Checkout</button>
                </form>
            </div>

        </div>

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
