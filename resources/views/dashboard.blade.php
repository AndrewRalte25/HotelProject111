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
                            
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#about-us">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#faq">FAQ</a>
                            </li>
                          
                        </ul>
                    </div>
                </div>
            </nav>
            </h2>
    </x-slot>
    <div class="card w-100" style="width: 18rem;">
        <div style="position: relative;">
            <img src="{{ asset('logo/card.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body" style="position: absolute; bottom: 0; left: 0; right: 0; padding: 20px; background-color: rgba(0, 0, 0, 0.5); color: white;">
               
                <p class="card-text" style="font-size: 23px;">WE PROVIDE HASSLE FREE SELF CHECKIN AND BOOKING FOR HOTELS.</p>
            </div>
        </div>
    </div>
   

    <section class="bg-white py-5" id="faq">
        <div class="container">
            <h2 class="text-dark mb-4">FAQ</h2>
            <div class="accordion" id="faqAccordion">
                <!-- Add your FAQ items here -->
                <div class="accordion-item">
                    <h3 class="accordion-header" id="faqHeading1">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faqCollapse1" aria-expanded="false" aria-controls="faqCollapse1">
                            Is Offline booking possible
                        </button>
                    </h3>
                    <div id="faqCollapse1" class="accordion-collapse collapse" aria-labelledby="faqHeading1"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Yes. You can just contact the owner of establishments through the given information.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h3 class="accordion-header" id="faqHeading1">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faqCollapse1" aria-expanded="false" aria-controls="faqCollapse1">
                            I want to register my establishment.
                        </button>
                    </h3>
                    <div id="faqCollapse1" class="accordion-collapse collapse" aria-labelledby="faqHeading1"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                           To register an establishment kindly contact us at asdv@gmail.com 
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h3 class="accordion-header" id="faqHeading1">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faqCollapse1" aria-expanded="false" aria-controls="faqCollapse1">
                            I want a Refund.
                        </button>
                    </h3>
                    <div id="faqCollapse1" class="accordion-collapse collapse" aria-labelledby="faqHeading1"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                           Refunds are done automatically within 5 working days.
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <section class="bg-light py-5 " id="about-us">
            <div class="container">
                <h2 class="text-dark mb-4">About Us</h2>
                <p class="text-dark">We are a startup aiming to provide User Friendly Experiences</p>
            </div>
        </section>
    </section>
  
    
    

   
    
</x-app-layout>