<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Products</title>
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

            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Add Products</h2>

            <form class="" action="{{url('/add_product')}}" method="POST"  enctype="multipart/form-data">
                @csrf
                <div class="grid gap-1 mb-2">
                    <label>Product Title:</label>
                    <input name="title" class="w-1/2 text-sm placeholder:text-gray-400 shadow-md rounded-md border-0" type="text" placeholder="Input product title" required />
                </div>
                <div class="grid gap-1 mb-2">
                    <label>Product Description:</label>
                    <textarea name="description" class="text-sm w-1/2 shadow-md rounded-md border-0 placeholder:text-gray-400" placeholder="Write the product desription here" required></textarea>
                </div>
                <div class="grid gap-1 mb-2">
                    <label>Naira Price:</label>
                    <input name="naira_price" class="w-1/5 text-sm placeholder:text-gray-400 shadow-md rounded-md border-0" type="text" placeholder="₦" required />
                </div>
                <div class="grid gap-1 mb-2">
                    <label>Naira Discount:</label>
                    <input name="naira_discount" class="w-1/5 text-sm placeholder:text-gray-400 shadow-md rounded-md border-0" type="text" placeholder="₦" />
                </div>
                <div class="grid gap-1 mb-2" >
                    <label>Dollar Price:</label>
                    <input name="dollar_price" class="w-1/5 text-sm placeholder:text-gray-400 shadow-md rounded-md border-0" type="text" placeholder="$" required />
                </div>
                <div class="grid gap-1 mb-2">
                    <label>Dollar Discount:</label>
                    <input name="dollar_discount" class="w-1/5 text-sm placeholder:text-gray-400 shadow-md rounded-md border-0" type="text" placeholder="$" />
                </div>
                <div class=" gap-1 mb-2">
                    <label>Choose Collection:</label><br>
                    <select class="mt-1" name="collection" class="shadow-md rounded-md border-0" required>
                        @foreach ($collections as $item)
                        <option value="{{$item->collection_name}}">{{$item->collection_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="grid gap-1 mb-2">
                    <label>Product Image:</label>
                    <input name="image" class="w-fit text-sm shadow-sm rounded-md border-0" type="file"  />
                </div>

                <input class="mt-5 bg-secondary-9 text-white p-2 rounded-lg cursor-pointer hover:bg-gray-700" type="submit" value="Add Collection" />
            </form>
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
