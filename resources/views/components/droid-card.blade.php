@foreach ($droidsList as $droid)
    <a href="{{ route('droids-show', $droid->id) }}" class="">
        <div class="max-w-sm rounded overflow-hidden shadow-lg hover:opacity-75 hover:duration-300 droid-card">
            @if($droid->image)
                <img class="w-full" src="{{ asset('storage/' . Str::subStr($droid->image, 7)) }}" alt="Droid Image">
            @else
                <img class="w-full" src="{{ asset('images/placeholder-droids.png') }}" alt="Placeholder Droid Image">
            @endif
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{ $droid->name }}</div>
                <p class="text-gray-700 text-base">
                    {{ $droid->description }}
                </p>
            </div>
            <div class="px-6 pt-4 pb-2">
                @foreach(json_decode($droid->tags) as $tag)
                    <span
                        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{$tag}}</span>
                @endforeach
            </div>
        </div>
    </a>
@endforeach
