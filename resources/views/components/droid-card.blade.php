@foreach ($droidsList as $droid)
  <a href="{{ route('droids-show', $droid->id) }}" class="">
    <div class="    max-w-sm rounded overflow-hidden shadow-lg hover:opacity-75 hover:duration-300">
      {{-- <img class="w-full" src="https://clipground.com/images/r2d2-png-3.jpg" alt="Droid Image"> --}}
      <img class="w-full" src="{{ $droid->image }}" alt="Droid Image">
      <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2">{{ $droid->name }}</div>
        <p class="text-gray-700 text-base">
          {{ $droid->description }}
        </p>
      </div>
      <div class="px-6 pt-4 pb-2">
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
      </div>
    </div>
  </a>
@endforeach
