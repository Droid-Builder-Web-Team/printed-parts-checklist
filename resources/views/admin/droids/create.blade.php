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
          <form action="{{ route('admin-store-droid') }}" enctype="multipart/form-data" method="POST">
            @csrf
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <ul class="flex flex-wrap mb-px text-sm font-medium text-center tab-content__tabs mb-10">
              <li>
                <button data-tab="1"
                  type="button"
                  class="inline-block p-4 rounded-t-lg text-blue-600 hover:text-blue-600 dark:text-blue-500 dark:hover:text-blue-500 border-blue-600 dark:border-blue-500 tab-content__tab-link">Droid
                  Information</button>
              </li>
              <li>
                <button data-tab="2"
                  type="button"
                  class="inline-block p-4 rounded-t-lg text-blue-600 hover:text-blue-600 dark:text-blue-500 dark:hover:text-blue-500 border-blue-600 dark:border-blue-500 tab-content__tab-link">Instructions</button>
              </li>
              <li>
                <button data-tab="3"
                  type="button"
                  class="inline-block p-4 rounded-t-lg text-blue-600 hover:text-blue-600 dark:text-blue-500 dark:hover:text-blue-500 border-blue-600 dark:border-blue-500 tab-content__tab-link">Bill
                  Of Materials</button>
              </li>
              <li>
                <button data-tab="4"
                  type="button"
                  class="inline-block p-4 rounded-t-lg text-blue-600 hover:text-blue-600 dark:text-blue-500 dark:hover:text-blue-500 border-blue-600 dark:border-blue-500 tab-content__tab-link">Gallery</button>
              </li>
              <li>
                <button data-tab="5"
                  type="button"
                  class="inline-block p-4 faqs rounded-t-lg text-blue-600 hover:text-blue-600 dark:text-blue-500 dark:hover:text-blue-500 border-blue-600 dark:border-blue-500 tab-content__tab-link">FAQs</button>
              </li>
            </ul>
            <div class="tab-content__tab-items">
              {{-- Droid Details --}}
              <div class="hidden p-4 bg-white rounded-lg dark:bg-gray-800 tab-content__tab-contents" data-tab="1" aria-hidden="true">
                <div class="relative z-0 w-full mb-6 group">
                  <input type="text" name="name"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " />
                  <label for="name"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Droid
                    Name</label>
                </div>

                <div class="relative z-0 w-full mb-6 group">
                  <input type="text" name="version"
                    class="block mb-2 py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " />
                  <p id="helper-text-explanation" class="text-xs text-gray-500 dark:text-gray-400">MKI, MKII, MKIII etc.</p>
                  <label for="version"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Droid
                    Droid Version</label>
                </div>

                <div class="relative z-0 w-full mb-6 group">
                  <textarea rows="4" name="description"
                    class="block mb-2 py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" "></textarea>
                  <label for="description"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Droid
                    Droid Description</label>
                </div>

                <div class="relative z-0 w-full mb-6 group">
                  <select id="type" name="type"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                    <option disabled selected="selected">Select The Build Level</option>
                    <option value="full-droid">Full Droid</option>
                    <option value="work-in-progress">Work In Progress</option>
                    <option value="dome-only">Dome Only</option>
                    <option value="body-only">Body Only</option>
                    <option value="microdroid">Microdroid</option>
                    <option value="minidroid">Minidroid</option>
                    <option value="babydroid">Babydroid</option>
                  </select>
                </div>

                <div class="relative z-0 w-full mb-6 group">
                  <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="droid_avatar">Upload Droid Avatar</label>
                  <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    aria-describedby="droid_avatar_help" id="droid_avatar" name="droid_avatar" type="file">
                </div>

                <div class="relative z-0 w-full mb-6 group">
                  <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="user_avatar">Upload Parts List</label>
                  <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    aria-describedby="user_avatar_help" id="user_avatar" type="file">
                </div>
              </div>

              {{-- Instructions --}}
              <div class="hidden p-4 bg-white rounded-lg dark:bg-gray-800 tab-content__tab-contents" data-tab="2" aria-hidden="true">
                <div class="relative z-0 w-full mb-6 group">
                  <input type="text" name="instructions_title"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " />
                  <label for="instructions_title"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Title</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                  <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="instructions_file">Upload Instructions</label>
                  <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="instructions_file" name="instructions_file" type="file">
                </div>
              </div>

              {{-- Bill Of Materials --}}
              <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800 tab-content__tab-contents" data-tab="3" aria-hidden="true">
                <div class="relative z-0 w-full mb-6 group">
                  <input type="text" name="bill_of_materials_title"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " />
                  <label for="bill_of_materials_title"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Title</label>
                  <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="bill_of_materials_file">Upload Bill Of Materials</label>
                  <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="bill_of_materials_file" name="bill_of_materials_file" type="file">
                </div>
              </div>

              {{-- Image Gallery Upload --}}
              <div class="hidden p-4 bg-white rounded-lg dark:bg-gray-800 tab-content__tab-contents" data-tab="4" aria-hidden="true">
                <div class="relative z-0 w-full mb-6 group">
                  <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="gallery_images">Upload Gallery Images</label>
                  <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="gallery_images[]" name="gallery_images[]" type="file" multiple>
                </div>
              </div>

              {{-- FAQs --}}
              <div class="hidden p-4 bg-white rounded-lg dark:bg-gray-800 tab-content__tab-contents" data-tab="5" aria-hidden="true">
                <div class="faq-block">
                  <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="title"
                      class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                      placeholder=" " />
                    <label for="title"
                      class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Title</label>
                  </div>

                  <div class="relative z-0 w-full mb-6 group">
                    <textarea type="text" name="content"
                      class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                      placeholder=" "></textarea>
                    <label for="content"
                      class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Content</label>
                  </div>
                </div>
              </div>
              <div class="button-row">
                <button type="button" id="newFaqButton" class="border border-dark-grey p-2">Add New FAQ</button>
              </div>
            </div>
            <button type="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
