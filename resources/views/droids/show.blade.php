<x-app-layout>
  <x-slot name="header" class="hidden">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ $singleDroid->name }}
    </h2>
  </x-slot>

  <div class="py-12" style="background-image: linear-gradient(90deg, rgba(16,20,48,1) 0%, rgba(33,140,190,0.5) 50%, rgba(51,179,209,0.25) 100%)">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-2">
      <div class="droid-info-hero-section flex">
        <div class="droid-info-text w-full flex flex-col justify-center items-start">
          <h1 class="font-semibold text-7xl text-white py-2">{{ $singleDroid->name }}</h1>
          <h3 class="font-normal text-4xl text-dark-grey py-2">{{ $singleDroid->version }}</h3>
          <p class="font-normal text-lg text-dark-grey pb-4">{{ $singleDroid->description }}</p>

          <div class="button-wrapper">
            <a href="#" class="bg-white flex items-center border border-white text-dark-grey px-2 py-3 font-semibold rounded-lg hover:bg-transparent hover:text-white">Build This
              Droid
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="ml-3">
                <path
                  d="M331.8 224.1c28.29 0 54.88 10.99 74.86 30.97l19.59 19.59c40.01-17.74 71.25-53.3 81.62-96.65c5.725-23.92 5.34-47.08 .2148-68.4c-2.613-10.88-16.43-14.51-24.34-6.604l-68.9 68.9h-75.6V97.2l68.9-68.9c7.912-7.912 4.275-21.73-6.604-24.34c-21.32-5.125-44.48-5.51-68.4 .2148c-55.3 13.23-98.39 60.22-107.2 116.4C224.5 128.9 224.2 137 224.3 145l82.78 82.86C315.2 225.1 323.5 224.1 331.8 224.1zM384 278.6c-23.16-23.16-57.57-27.57-85.39-13.9L191.1 158L191.1 95.99l-127.1-95.99L0 63.1l96 127.1l62.04 .0077l106.7 106.6c-13.67 27.82-9.251 62.23 13.91 85.39l117 117.1c14.62 14.5 38.21 14.5 52.71-.0016l52.75-52.75c14.5-14.5 14.5-38.08-.0016-52.71L384 278.6zM227.9 307L168.7 247.9l-148.9 148.9c-26.37 26.37-26.37 69.08 0 95.45C32.96 505.4 50.21 512 67.5 512s34.54-6.592 47.72-19.78l119.1-119.1C225.5 352.3 222.6 329.4 227.9 307zM64 472c-13.25 0-24-10.75-24-24c0-13.26 10.75-24 24-24S88 434.7 88 448C88 461.3 77.25 472 64 472z" />
              </svg>
            </a>
          </div>

          <div class="extra-content pt-4">
            <p class="text-sm text-dark-grey">Uploaded: {{ formatDateTime($singleDroid->created_at) }}</p>
            <p class="text-sm text-dark-grey">Last Update: {{ formatDateTime($singleDroid->updated_at) }}</p>
          </div>
        </div>
        <div class="gradient flex justify-end content-center">
          <div class="image-wrapper drop-shadow-xl">
            <img src="{{ $singleDroid->image }}">
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
