<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liked Products</title>
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
            <h1 class="heads mt-7">Liked Products</h1>
            <div class="w-20 h-1 m-auto mt-4 bg-secondary-10"></div>

            <div class="w-full mt-8 mb-8 overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                  <table class="w-full whitespace-no-wrap">
                    <thead>
                      <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Product</th>
                        <th class="px-4 py-3">Title</th>
                        <th class="px-4 py-3">Price</th>
                        <th class="px-4 py-3">Add to cart</th>
                        <th class="px-4 py-3">Remove</th>
                      </tr>
                    </thead>


                    @foreach ($like as $like)

                    <tbody class="bg-white divide-y border-b dark:divide-gray-700 dark:bg-gray-800">
                        <tr class="text-gray-700 dark:text-gray-400">
                          <td class="px-4 py-2">
                            <a href="">
                              <img class="size-20 rounded-lg shadow-md" src="/images/{{$like->image}}" />
                            </a>
                          </td>
                          <td class="px-4 py-2">{{$like->title}}</td>
                          <td class="px-4 py-2">₦{{$like->naira_price}}</td>
                          <td class="px-8 py-2 ">
                            <form action="{{url('/add_to', $like->id)}}" method="POST" class="bg-transparent w-full ">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$like->id}}" >
                                <button type="submit" >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                    </svg>
                                </button>
                            </form>
                          </td>
                          <td class="px-7 py-2">
                            <a onclick="return confirm('Are you sure to delete')" href="{{url('/delete_like', $like->id)}}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                  </svg>
                            </a>
                          </td>
                        </tr>
                    </tbody>

                    @endforeach

                  </table>
                </div>
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
