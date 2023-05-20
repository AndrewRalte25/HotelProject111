<x-admin-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} {{ Auth::guard('admin')->user()->name }} - ({{ Auth::guard('admin')->user()->email }})
        </h2>
    </x-slot>
    <div class="mt-3 d-flex align-items-center justify-content-center">
        <div class="max-w-1xl mx-auto sm:px-6 lg:px-8">
       <div class="bg-secondary overflow-hidden shadow-lg sm:rounded-lg">
       <div class="container-fluid ">
                    <form action="/hotels/{{ $hotel->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="name" class="block font-medium text-sm text-gray-700">{{ __('Hotel Name') }}</label>
                            <input id="name" class="form-input rounded-md shadow-sm mt-1 block w-full" type="text" name="name" :value="$hotel->name" required autofocus />
                        </div>

                        <div class="mt-4">
                            <label for="location" class="block font-medium text-sm text-gray-700">{{ __('Location') }}</label>
                            <input id="location" class="form-input rounded-md shadow-sm mt-1 block w-full" type="text" name="location" :value="$hotel->location" required />
                        </div>

                        <div class="mt-4">
                            <label for="openinghours" class="block font-medium text-sm text-gray-700">{{ __('Opening Hours') }}</label>
                            <input id="openinghours" class="form-input rounded-md shadow-sm mt-1 block w-full" type="text" name="openinghours" :value="$hotel->opening" required />
                        </div>

                        <div class="mt-4">
                            <label for="contactinformation" class="block font-medium text-sm text-gray-700">{{ __('Contact Information') }}</label>
                            <input id="contactinformation" class="form-input rounded-md shadow-sm mt-1 block w-full" type="text" name="contactinformation" :value="$hotel->contactinfo" required />
                        </div>

                        <div class="mt-4">
                            <label for="image" class="block font-medium text-sm text-gray-700">{{ __('Image') }}</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded mt-3">
                            <span style="padding: 5px; border: 1px solid black;">Update</span>
                        </button>
                        
                        
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
