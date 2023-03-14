<x-app-layout>
	@role('Admin')
	<x-slot name="header" class="hidden">
		<div class="droid-stats-container">
			<div class="text-center active-build-wrapper">
				<div class="mb-3 active-builds">
					<div class="active-value-container">0%</div>
				</div>
				<span class="pt-6 uppercase">Active Builds</span>
			</div>

			<div class="text-center completed-build-wrapper">
				<div class="mb-3 completed-builds">
					<div class="completed-value-container">0%</div>
				</div>
				<span class="pt-6 uppercase">Completed Builds</span>
			</div>
		</div>
	</x-slot>
	@endrole

	<div class="py-12"
	     style="background-image: linear-gradient(90deg, rgba(16,20,48,1) 0%, rgba(33,140,190,0.5) 50%, rgba(51,179,209,0.25) 100%)">
		<div class="mx-auto max-w-7xl sm:px-6 lg:px-2">
			<div class="flex droid-info-hero-section">
				<div class="flex w-full flex-col items-start justify-center droid-info-text">
					<h1 class="py-2 text-7xl font-semibold text-white">{{ $singleDroid->name }}</h1>
					<h3 class="py-2 text-4xl font-normal text-dark-grey">{{ $singleDroid->version }}</h3>
					<p class="pb-4 text-lg font-normal text-dark-grey">{{ $singleDroid->description }}</p>

					<div class="button-wrapper">
						<a href="#"
						   class="flex items-center rounded-lg border border-white bg-white px-2 py-3 font-semibold text-dark-grey hover:bg-transparent hover:text-white">
							Build This Droid
							<i class="fas fa-tools"></i>
						</a>
					</div>

					<div class="pt-4 pb-12 extra-content">
						<p class="text-sm text-dark-grey">Uploaded: {{ formatDateTime($singleDroid->created_at) }}</p>
						<p class="text-sm text-dark-grey">Last
							Update: {{ formatDateTime($singleDroid->updated_at) }}</p>
					</div>

					<div class="flex downloads flex-column">
						@if($instructions)
							<a class="flex items-center border border-white bg-white px-2 py-2 text-dark-grey hover:bg-transparent hover:text-white"
							   href="{{ asset($instructions->url) }}">Download Instructions
								<i class="fa-light fa-download"></i>
							</a>
						@endif
						@if($bom)
							<a class="flex items-center border border-white bg-transparent px-2 py-2 text-white hover:bg-white hover:text-dark-grey"
							   href="{{ asset($bom->url) }}">Download Bill Of Materials
								<i class="fa-light fa-download"></i>
							</a>
						@endif
					</div>
				</div>
				<div class="flex content-center justify-center items-center gradient">
					<div class="drop-shadow-xl image-wrapper">
						@if($singleDroid->image)
							<img src="{{ asset('storage/' . Str::subStr($singleDroid->image, 7)) }}">
						@else
							<img src="{{ asset('images/placeholder-droids.png') }}" alt="Placeholder Droid Image">
						@endif
					</div>
				</div>
			</div>
		</div>

		{{-- FAQs --}}
		@if($droidFaqs->count() > 0)
			<div class="mx-auto my-20 max-w-7xl sm:px-6 lg:px-2">
				<h2 class="py-2 text-5xl font-normal capitalize text-dark-grey">Things to Know...</h2>
				<p class="text-sm text-dark-grey">There are a few things that you should know before you begin your
					build, check our FAQs to see if your questions have been answered.</p>

				<div class="accordion">
					@foreach ($droidFaqs as $faq)
						<div class="my-5 accordion-item">
							<button type="button" class="accordion-button label" aria-expanded="false">
								<h3>
									{{ $faq->title }}
									<span>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path
		                    d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"/>
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
		@endif

		{{-- Gallery --}}
		@if($droidGallery->count() > 0)
			<div class="mx-auto max-w-7xl sm:px-6 lg:px-2">
				<h2 class="py-2 text-5xl font-normal capitalize text-dark-grey">Gallery</h2>
				<p class="text-sm text-dark-grey">A collection of images of this droid built by our members</p>
				<div class="my-5 swiper droid-slider">
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
	@endif

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
