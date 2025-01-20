
    <div class="container px-6 mx-auto grid">
      <h2
        class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
      >
        Dashboard
      </h2>

      <!-- Cards -->
      @include('admin.minicard')

      <!-- New Table -->
      @include('admin.minitable')

      <!-- Charts -->
      <h2
        class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
      >
        Charts
      </h2>

      @include('admin.minichart')

    </div>

