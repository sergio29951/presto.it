<x-layout>
  <section class="container swiper-custom mx-auto mt-5">
    <div class="row justify-content-center align-items-center">
      <div class="col-12 col-md-8">
        <x-swiper
          :product="$product"
        />
      </div>

      <div class="col-12 col-md-4 mx-auto py-3">
        <h2 data-aos="flip-left" data-aos-duration="2000"> {{ $product->title }}</h2> 
        <h4 data-aos="flip-left" data-aos-duration="2000"> {{ $product->getDescriptionSubstring() }}</h4>
        <h1 class="py-2" data-aos="flip-left" data-aos-duration="2000"> {{ $product->price }} €</h1>
        <p data-aos="flip-right" data-aos-duration="2000">Creato il :{{ $product->created_at->format('d/m/Y') }} - Da: {{ $product->user->name ?? '' }}</p>
        <a href="{{ route('category.show', ['category'=>$product->category]) }}"> Guarda tutti i prodotti in: {{ $product->category->name }}</a>
      </div>

      <div class="col-6">
        <form action="{{ route('revisor.accept_product', ['product'=>$product]) }}" method="POST">
          @csrf
          @method('PATCH')
          <button type="submit" class="btn btn-success mb-3">{{__('ui.Accept')}}</button>
        </form> 
      </div>

      <div class="col-6">
        <form action="{{ route('revisor.reject_product', ['product'=>$product]) }}" method="POST">
          @csrf
          @method('PATCH')
          <button type="submit" class="btn btn-danger mb-3">{{__('ui.Reject')}}</button>
        </form> 
      </div>

    </div>
  </section>


</x-layout>




