<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Droid Mainframe') }}
    </h2>
  </x-slot>

  <div class="pt-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-2">
      <div class="bg-white shadow-sm sm:rounded-lg">
        <div class="p-2 flex justify-around bg-white order-b border-gray-200">
          <input type="text" placeholder="Search...">
        </div>
      </div>
    </div>
  </div>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-2">
      <div class="bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 flex justify-around bg-white border-b border-gray-200">
          <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
            <x-droid-card :droidsList="$droidsList"></x-droid-card>
            {{ $droidsList->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
