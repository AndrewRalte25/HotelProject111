<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           ADD HOTEL
        </h2>
    </x-slot>
   
    <div class="mt-3 d-flex align-items-center justify-content-center">
     <div class="max-w-1xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-secondary overflow-hidden shadow-lg sm:rounded-lg">
    <div class="container-fluid ">

<form action="/hoteladd" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="mb-3">
                <label for="nameInput" class="form-label">Name</label>
                <input name="name" value="{{ old('name') }}" type="text" class="form-control" id="nameInput" aria-describedby="nameHelp">
                @error('name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <div class="row gx-3">
                    <div class="col-xs-12 cl-sm-12 col-md-6">
                        <label for="dateInput" class="form-label">Location</label>
                        <input name="location" value="{{ old('date') }}" type="text" class="form-control" id="dateInput" aria-describedby="dateHelp">
                        @error('location')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="row gx-3">
                    <div class="col-xs-12 cl-sm-12 col-md-6">
                        <label for="dateInput" class="form-label">Opening Hours</label>
                        <input name="openinghours" value="{{ old('date') }}" type="text" class="form-control" id="dateInput" aria-describedby="dateHelp">
                        @error('openinghours')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="row gx-3">
                    <div class="col-xs-12 cl-sm-12 col-md-6">
                        <label for="Contact" class="form-label">Contact Information</label>
                        <input name="contactinformation" value="{{ old('date') }}" type="text" class="form-control" id="dateInput" aria-describedby="dateHelp">
                        @error('Contact')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="row gx-3">
                    <div class="col-xs-12 cl-sm-12 col-md-6">
                        <label for="ImageInput" class="form-label">Image</label>
                        <input name="image"  type="file" class="form-control" id="ImageInput" aria-describedby="dateHelp">
                        @error('Image')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn btn-dark">Submit</button>
        </div>
    </div>
</form>  
</div>
</div>
</div>
</div>
</x-admin-layout>