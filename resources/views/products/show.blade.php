<x-layout>
  <section class="container swiper-custom mx-auto mt-5">
    <div class="row justify-content-center align-items-center">

      <div class="col-12 col-md-6">
        <x-swiper
          :product="$product"
        />
      </div>

      <div class="col-12 col-md-4 mx-auto">
        <h2 data-aos="flip-left" data-aos-duration="2000"> {{ $product->title }}</h2> 
        <h4 data-aos="flip-left" data-aos-duration="2000"> {{ $product->body }}</h4>
        <h4 class="py-2" data-aos="flip-left" data-aos-duration="2000"> {{ $product->price }} €</h4>
        <p data-aos="flip-right" data-aos-duration="2000">Creato il :{{ $product->created_at->format('d/m/Y') }} - Da: {{ $product->user->name ?? '' }}</p>
        <a href="{{ route('category.show', ['category'=>$product->category]) }}"> Guarda tutti i prodotti in: {{ $product->category->name }}</a>
        {{-- <p class="mt-3"> <a href=""><i class="fa-solid fa-cart-plus fa-2x mx-2 text-dark"></i></a> <span class="fs-5">Aggiungi al carrello</span></p> --}}
      </div>
        
    </div>
  </section>
</x-layout>




