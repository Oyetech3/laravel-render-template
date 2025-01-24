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
                        <th class="px-4 py-3">View</th>
                        <th class="px-4 py-3">Actions</th>
                      </tr>
                    </thead>


                    @foreach ($like as $like)

                    <tbody class="bg-white divide-y border-b dark:divide-gray-700 dark:bg-gray-800">
                        <tr class="text-gray-700 dark:text-gray-400">
                          <td class="px-4 py-2">
                            <img class="size-20 rounded-lg shadow-md" src="/images/{{$like->image}}" />
                          </td>
                          <td class="px-4 py-2">{{$like->title}}</td>
                          <td class="px-4 py-2">₦{{$like->naira_price}}</td>
                          <td class="px-4 py-2">
                            <form action="{{url('')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="" >
                                <button class="bg-secondary-9 p-1 text-white rounded-full" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                    </svg>
                                </button>
                            </form>
                          </td>
                          <td class="px-4 py-2">
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
