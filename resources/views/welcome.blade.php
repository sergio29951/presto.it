<x-layout>

  @if(session()->has('access.denied'))
    <div class="flex flex-row justify-center my-2 alert alert-success">
      {{ session('access.denied') }}
    </div>    
  @endif

  <x-masthead2/> 
  <x-masthead/>  
  <x-servizi/>

  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="my-5" data-aos="fade-up-right" data-aos-duration="2000"> {{__('ui.categoryMostClicked')  }}</h2>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-12">
        <x-categorieviste/>
      </div>
    </div>
  </div>
        
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="mt-5" data-aos="flip-left" data-aos-duration="2000">{{__('ui.latestProduct')  }}</h2>
      </div>
    </div>
  </div>


        
    
  <section id="swiperHome" class="container">
    <div class="row">
      <div class="col-12">
        <div class="swiper">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper">
            <!-- Slides -->
              @foreach ($products as $product)
                <div class="swiper-slide mb-5">
                  <x-card
                    :product="$product"
                  />
                </div>
              @endforeach
              
          </div>
          <div class="swiper-button-next swipeCustom"></div>
          <div class="swiper-button-prev swipeCustom"></div>
          <!-- If we need pagination -->
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </div>
  </section>
</x-layout>
 
  
