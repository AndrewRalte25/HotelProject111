<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-light leading-tight">
        {{ __('Welcome!!') }} {{ Auth::user()->name }}
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/userhotels">Hotels</a>
                        </li>
                        
                      
                      
                    </ul>
                </div>
            </div>
        </nav>
        </h2>
</x-slot>

<div class="d-flex" id="wrapper">
  <div class="my-3">
      <form method="POST" action="/userhotels/filter">
          @csrf
          <div class="form-group">
              <label for="filter_location">Filter by Location:</label>
              <select class="form-control" id="filter_location" name="filter_location">
                  <option value="">All</option>
                  @php
                      $uniqueLocations = [];
                  @endphp
                  @foreach ($hotels as $hotel)
                      @if (!in_array($hotel->Location, $uniqueLocations))
                          <option value="{{ $hotel->Location }}">{{ $hotel->Location }}</option>
                          @php
                              $uniqueLocations[] = $hotel->Location;
                          @endphp
                      @endif
                  @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="filter_opening">Filter by Opening Hours:</label>
              <select class="form-control" id="filter_opening" name="filter_opening">
                  <option value="">All</option>
                  @php
                      $uniqueOpeningHours = [];
                  @endphp
                  @foreach ($hotels as $hotel)
                      @if (!in_array($hotel->Opening, $uniqueOpeningHours))
                          <option value="{{ $hotel->Opening }}">{{ $hotel->Opening }}</option>
                          @php
                              $uniqueOpeningHours[] = $hotel->Opening;
                          @endphp
                      @endif
                  @endforeach
              </select>
          </div>
          <button type="submit" class="btn btn-primary">Filter</button>
      </form>
  </div>

        @foreach ($hotels as $Hot)
        
        <div class="container border border-dark pt-5 mt-5">
            <div class="row text-center">
              <div class="col-6 my-auto">
                    Name:
                    {{ $Hot->name }}</td><br>
                    Location:
                    {{ $Hot->Location }}</td><br>
                    Opening Hours:
                    {{ $Hot->Opening }}</td><br>
                    Contact Information:
                    {{ $Hot->ContactInfo }}</td>
              </div>
              <div class="col-6 justify-content-center">
                <img src="{{ asset($Hot->Image) }}" class="img-fluid img-thumbnail mx-auto d-block" alt="mobile screen">
              </div>
            </div>
            <button>
              <a href="{{ '/display/' . $Hot->id }}">More Details</a>
            </button>

           
          </div>
        @endforeach
</x-app-layout>
