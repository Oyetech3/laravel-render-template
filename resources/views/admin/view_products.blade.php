<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Collections</title>
    <link rel="icon" href="./images/logocopy.png">
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    @vite('resources/css/app.css')
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="./js/init-alpine.js"></script>

  </head>
  <body>
    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen}"
    >
      @include('admin.sidebar')

      <div class="flex flex-col flex-1">
        @include('admin.header')

        <main class="h-full pb-16 overflow-y-auto">
          <div class="container px-6 mx-auto grid">

            @if(session()->has('message'))
            <div class="bg-green-100 mt-2 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{session()->get('message')}}</span>
                <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" aria-label="Close">
                    <span class="text-green-700 hover:text-green-900">&times;</span>
                </button>
            </div>

            @endif

          </div>

          <div class="container px-6 mx-auto">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Products Table</h2>
            <div class="w-full overflow-x-auto">

                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                      <th class="px-4 py-3">Product Title</th>
                      <!--<th class="px-4 py-3">Description</th>!-->
                      <th class="px-4 py-3">Collection</th>
                      <th class="px-4 py-3">Naira Price</th>
                      <th class="px-4 py-3">Naira Discount</th>
                      <th class="px-4 py-3">Dollar Price</th>
                      <th class="px-4 py-3">Dollar Discount</th>
                      <th class="px-4 py-3">Image</th>
                      <th class="px-4 py-3">Delete</th>
                      <th class="px-4 py-3">Edit</th>
                    </tr>
                  </thead>

                  @foreach ($products as $products)
                  <tbody class="bg-white divide-y border-b dark:divide-gray-700 dark:bg-gray-800">
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">{{$products->title}}</td>
                      <!--<td class="px-4 py-3">{{$products->description}}</td>!-->
                      <td class="px-4 py-3">{{$products->collection}}</td>
                      <td class="px-4 py-3">₦{{$products->naira_price}}</td>
                      <td class="px-4 py-3">₦{{$products->naira_discount}}</td>
                      <td class="px-4 py-3">${{$products->dollar_price}}</td>
                      <td class="px-4 py-3">${{$products->dollar_discount}}</td>
                      <td class="px-4 py-3">
                        <img class="size-20 rounded-lg shadow-md" src="/images/{{$products->image}}" />
                      </td>
                      <td class="px-4 py-3">
                        <a onclick="return confirm('Are you sure to delete')" href="{{url('/delete_product', $products->id)}}" class="bg-secondary-9 hover:bg-gray-700 text-white rounded-md px-3.5 py-2">Delete</a>
                      </td>
                      <td class="px-4 py-3">
                        <a  href="{{url('/edit_product', $products->id)}}" class="bg-pink-500 hover:bg-pink-600 text-white rounded-md px-3.5 py-2">Edit</a>
                      </td>
                    </tr>
                  </tbody>
                  @endforeach
                </table>
          </div>

        </main>
      </div>
    </div>

    <script>
        document.querySelectorAll('[aria-label="Close"]').forEach(button => {
        button.addEventListener('click', () => {
        button.parentElement.remove();
            });
        });
    </script>

  </body>
</html>
