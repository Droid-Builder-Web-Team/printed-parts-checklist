<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Admin Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-2">
      <div class="bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 flex justify-around bg-white border-b border-gray-200">
          <div class="floating-box w-1/3 p-4 flex flex-col bg-gray-500 text-white text-center overflow-hidden shadow-lg sm:rounded-lg">
            <button data-dropdown-toggle="dropdown"
              class="text-white dropdownButton-users flex items-center justify-center text-2xl" type="button">Users <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
              </svg></button>
            <!-- Dropdown menu -->
            <div class="dropdownMenu-users z-10 hidden mx-auto bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700">
              <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                <li>
                  <a href="{{ route('admin-users') }}" class="block px-4 py-2 text-dark-grey hover:bg-gray-100">List</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-dark-grey hover:bg-gray-100">Unverified</a>
                </li>
              </ul>
            </div>
            <h1 class="text-5xl mt-4 mb-2">10</h1>
            <span class="text-xs block italic">Active: 4</span>
          </div>

          <div class="floating-box w-1/3 p-4 flex flex-col bg-gray-500 text-white text-center overflow-hidden shadow-lg sm:rounded-lg">
            <button data-dropdown-toggle="dropdown"
              class="text-white dropdownButton-droids flex items-center justify-center text-2xl" type="button">Droids <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
              </svg></button>
            <!-- Dropdown menu -->
            <div class="dropdownMenu-droids z-10 hidden mx-auto bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700">
              <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                <li>
                  <a href="{{ route('admin-droids') }}" class="block px-4 py-2 text-dark-grey hover:bg-gray-100">List</a>
                </li>
              </ul>
            </div>
            <h1 class="text-5xl mt-4 mb-2">10</h1>
            <span class="text-xs block italic">User Droids: 70</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
