<x-app-layout>
  <x-slot name="header" class="hidden">
    <div class="droid-stats-container">
      <div class="active-build-wrapper text-center">
        <div class="active-builds mb-3">
          <div class="active-value-container">0%</div>
        </div>
        <span class="pt-6 uppercase">Active Builds</span>
      </div>

      <div class="completed-build-wrapper text-center">
        <div class="completed-builds mb-3">
          <div class="completed-value-container">0%</div>
        </div>
        <span class="pt-6 uppercase">Completed Builds</span>
      </div>
    </div>
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

          <div class="extra-content pt-4 pb-12">
            <p class="text-sm text-dark-grey">Uploaded: {{ formatDateTime($singleDroid->created_at) }}</p>
            <p class="text-sm text-dark-grey">Last Update: {{ formatDateTime($singleDroid->updated_at) }}</p>
          </div>

          <div class="downloads flex flex-column">
            <a class="bg-white flex items-center border border-white text-dark-grey px-2 py-2 hover:bg-transparent hover:text-white" href="{{ asset($instructions->url) }}">Download Instructions <svg
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="ml-3">
                <path
                  d="M480 352h-133.5l-45.25 45.25C289.2 409.3 273.1 416 256 416s-33.16-6.656-45.25-18.75L165.5 352H32c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-96C512 366.3 497.7 352 480 352zM432 456c-13.2 0-24-10.8-24-24c0-13.2 10.8-24 24-24s24 10.8 24 24C456 445.2 445.2 456 432 456zM233.4 374.6C239.6 380.9 247.8 384 256 384s16.38-3.125 22.62-9.375l128-128c12.49-12.5 12.49-32.75 0-45.25c-12.5-12.5-32.76-12.5-45.25 0L288 274.8V32c0-17.67-14.33-32-32-32C238.3 0 224 14.33 224 32v242.8L150.6 201.4c-12.49-12.5-32.75-12.5-45.25 0c-12.49 12.5-12.49 32.75 0 45.25L233.4 374.6z" />
              </svg></a>
            <a class="bg-transparent flex items-center border border-white text-white px-2 py-2 hover:bg-white hover:text-dark-grey" href="{{ asset($bom->url) }}">Download Bill Of Materials <svg
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="ml-3">
                <path
                  d="M480 352h-133.5l-45.25 45.25C289.2 409.3 273.1 416 256 416s-33.16-6.656-45.25-18.75L165.5 352H32c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-96C512 366.3 497.7 352 480 352zM432 456c-13.2 0-24-10.8-24-24c0-13.2 10.8-24 24-24s24 10.8 24 24C456 445.2 445.2 456 432 456zM233.4 374.6C239.6 380.9 247.8 384 256 384s16.38-3.125 22.62-9.375l128-128c12.49-12.5 12.49-32.75 0-45.25c-12.5-12.5-32.76-12.5-45.25 0L288 274.8V32c0-17.67-14.33-32-32-32C238.3 0 224 14.33 224 32v242.8L150.6 201.4c-12.49-12.5-32.75-12.5-45.25 0c-12.49 12.5-12.49 32.75 0 45.25L233.4 374.6z" />
              </svg></a>
          </div>
        </div>
        <div class="gradient flex justify-end content-center">
          <div class="image-wrapper drop-shadow-xl">
            <img src="{{ asset($singleDroid->image) }}">
          </div>
        </div>
      </div>
    </div>

    {{-- FAQs --}}
    <div class="max-w-7xl mx-auto my-20 my-20 sm:px-6 lg:px-2">
      <h2 class="font-normal text-5xl text-dark-grey py-2 capitalize">Things to Know...</h2>
      <p class="text-sm text-dark-grey">There are a few things that you should know before you begin your build, check our FAQs to see if your questions have been answered.</p>

      <div class="accordion">
        @foreach ($droidFaqs as $faq)
          <div class="accordion-item my-5">
            <button type="button" class="accordion-button label" aria-expanded="false">
              <h3>
                {{ $faq->title }}
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path
                      d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z" />
                  </svg>
                </span>
              </h3>
            </button>
            <div class="content" aria-hidden="true">
              <p class="text-normal text-dark-grey">{{ $faq->content }}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>

    {{-- Gallery --}}
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-2">
      <h2 class="font-normal text-5xl text-dark-grey py-2 capitalize">Gallery</h2>
      <p class="text-sm text-dark-grey">A collection of images of this droid built by our members</p>
      <div class="swiper droid-slider my-5">
        <div class="swiper-wrapper">
          @foreach ($droidGallery as $gallery)
            <div class="swiper-slide">
              <img src="{{ asset($gallery->url) }}">
            </div>
          @endforeach
        </div>

        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
    </div>
  </div>

  <script>
    let activeBuildProgressBar = document.querySelector('.active-builds');
    let activeBuildValueContainer = document.querySelector('.active-value-container');

    let completedBuildProgressBar = document.querySelector('.completed-builds');
    let completedBuildValueContainer = document.querySelector('.completed-value-container');

    let activeBuildProgressValue = {{ $singleDroid->getCountOfActiveBuilds() }};
    let activeBuildProgressEndValue = {{ $singleDroid->getCountOfTotalBuilds() }};

    let completedBuildProgressValue = {{ $singleDroid->getCountOfCompletedBuilds() }};
    let completedBuildProgressEndValue = {{ $singleDroid->getCountOfTotalBuilds() }};
    let speed = 200;

    let activeBuildCompletedPercentage = (activeBuildProgressValue / activeBuildProgressEndValue) * 100;
    let completedBuildCompletedPercentage = (completedBuildProgressValue / completedBuildProgressEndValue) * 100;

    let activeBuildProgress = setInterval(() => {
      activeBuildValueContainer.textContent = `${activeBuildCompletedPercentage}%`;
      activeBuildProgressBar.style.background = `conic-gradient(
          #4d5bf9 ${activeBuildProgressValue * 3.6}deg,
          #cadcff ${activeBuildProgressValue * 3.6}deg
      )`;
      if (activeBuildProgressValue == activeBuildProgressEndValue) {
        clearInterval(activeBuildProgress);
      }
    }, speed)

    let completedBuildProgress = setInterval(() => {
      completedBuildValueContainer.textContent = `${completedBuildCompletedPercentage}%`;
      completedBuildProgressBar.style.background = `conic-gradient(
          #4d5bf9 ${completedBuildProgressValue * 3.6}deg,
          #cadcff ${completedBuildProgressValue * 3.6}deg
      )`;
      if (completedBuildProgressValue == completedBuildProgressEndValue) {
        clearInterval(completedBuildProgress);
      }
    }, speed)
  </script>
</x-app-layout>
