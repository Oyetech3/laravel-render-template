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

            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Add Collections</h2>

            <form action="{{url('/add_collection')}}" method="POST"  enctype="multipart/form-data">
                @csrf
                <input class="border-secondary-9 rounded-md w-half" type="text" name="collection_name" placeholder="Write the category name" /><br/>
                <input class="mt-3" type="file" name="image1" /><br/>
                <input class="mt-3" type="file" name="image2" /><br/>
                <input class="mt-3" type="file" name="image3" /><br/>
                <input class="mt-5 bg-secondary-9 text-white p-2 rounded-lg cursor-pointer hover:bg-gray-700" type="submit" value="Add Collection" />
            </form>
          </div>

          <div class="container px-6 mx-auto">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Collections Table</h2>
            <div class="w-full overflow-x-auto">

                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                      <th class="px-4 py-3">Collection Name</th>
                      <th class="px-4 py-3">Image</th>
                      <th class="px-4 py-3">Action</th>
                    </tr>
                  </thead>

                  @foreach ($collections as $collections)
                  <tbody class="bg-white divide-y border-b dark:divide-gray-700 dark:bg-gray-800">
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">{{$collections->collection_name}}</td>
                      <td class="px-4 py-3">
                        <img class="size-24 rounded-lg shadow-md" src="{{ asset('storage/images/' . $collections->imageone) }}" />
                      </td>
                      <td class="px-4 py-3">
                        <a onclick="return confirm('Are you sure to delete')" href="{{url('/delete_collection', $collections->id)}}" class="bg-secondary-9 hover:bg-gray-700 text-white rounded-md px-3.5 py-2">Delete</a>
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
