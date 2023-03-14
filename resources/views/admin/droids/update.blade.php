<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Droid') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-2">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 tabs-wrapper">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin-store-droid') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-row">
                            <h2>Droid Details</h2>
                            <div class="form-group mb-6">
                                <label>Droid Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="droid_name"
                                    name="droid_name"
                                    value="{{ old('droid_name', optional($droid)->name) }}">
                            </div>

                            <div class="form-group mb-6">
                                <label>Droid Version</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="droid_version"
                                    name="droid_version"
                                    value="{{ old('droid_version', optional($droid)->version) }}">
                            </div>

                            <div class="form-group mb-6">
                                <label>Droid Description</label>
                                <textarea
                                    class="form-control"
                                    id="droid_description"
                                    name="droid_description">{{ old('droid_description', optional($droid)->description) }}</textarea>
                            </div>

                            <div class="form-group mb-6">
                                <label>Tags</label>
                                <input type="text"
                                       class="form-control"
                                       id="droid_tags"
                                       name="droid_tags"
                                       value="{{ old('droid_tags', optional($droid)->tags) }}">
                            </div>
                            <div class="form-group mb-6">
                                <label>Build Level</label>
                                <select
                                    id="build_level"
                                    name="build_level"
                                    class="form-control block">
                                    <option disabled value="null">Select The Build Level</option>
                                    @foreach($types as $type)
                                        <option @if($droid)
                                                    {{$droid->type_id === $type->id ? 'selected' : ''}}
                                                @endif
                                                value="{{$type['id']}}">{{$type->type}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-6">
                                <label>Droid Image</label>
                                <input class="block form-control" id="droid_avatar" name="droid_avatar" type="file">

                                @if(optional($droid)->image)
                                    <div class="preview-wrapper">
                                        <h6>Current Image</h6>

                                        <div class="image-preview">
                                            <img src="{{ asset('storage/' . Str::subStr($droid->image, 7)) }}">
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <h2>Instructions</h2>
                            <div class="form-group mb-6">
                                <label>Instructions Title</label>
                                <input class="block form-control"
                                       id="instructions_title"
                                       name="instructions_title"
                                       type="text"
                                       value="{{old('instructions_title', optional($instructions)->title)}}">
                            </div>

                            <div class="form-group mb-6">
                                <label>Instructions File</label>
                                <input class="block form-control"
                                       id="instructions_file"
                                       name="instructions_file"
                                       type="file">
                            </div>
                        </div>
                        <div class="form-row">
                            <h2>Bill Of Materials</h2>
                            <div class="form-group mb-6">
                                <label>Bill Of Materials Title</label>
                                <input class="block form-control" id="bill_of_materials_title"
                                       name="bill_of_materials_title"
                                       type="text"
                                       value="{{old('bill_of_materials_title', optional($bom)->title)}}">
                            </div>

                            <div class="form-group mb-6">
                                <label>Bill Of Materials File</label>
                                <input class="block form-control" id="bill_of_materials_file"
                                       name="bill_of_materials_file"
                                       type="file">
                            </div>
                        </div>

                        <div class="form-row">
                            <h2>Droid Gallery</h2>
                            <div class="form-group mb-6">
                                <label>Upload Gallery Images</label>
                                <input class="block form-control" id="gallery_images" name="gallery_images" multiple
                                       type="file">
                            </div>

                            @if($gallery)
                                <div class="gallery-wrapper">
                                    @foreach($gallery as $image)
                                        <div class="image-wrapper">
                                            {{$image->url}}
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="form-row">
                            <h2>FAQs</h2>
                            @if($faq)
                                @foreach($faq as $q)
                                    <div class="form-group mb-6">
                                        <label>FAQ Title</label>
                                        <input class="block form-control" id="faq_title"
                                               name="faq_title"
                                               type="text"
                                               value="{{old('faq_title', optional($q)->title)}}">
                                    </div>


                                    <div class="form-group mb-6">
                                        <label>FAQ Content</label>
                                        <input class="block form-control"
                                               id="faq_content"
                                               name="faq_content"
                                               type="text"
                                               value="{{old('faq_content', optional($q)->content)}}">
                                    </div>
                                @endforeach
                            @else
                                <div class="form-group mb-6">
                                    <label>FAQ Title</label>
                                    <input class="block form-control" id="faq_title"
                                           name="faq_title"
                                           type="text">
                                </div>


                                <div class="form-group mb-6">
                                    <label>FAQ Content</label>
                                    <input class="block form-control"
                                           id="faq_content"
                                           name="faq_content"
                                           type="text">
                                </div>
                            @endif
                        </div>
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        let tags = @json(optional($droid)->tags ?: [])
    </script>
</x-app-layout>
