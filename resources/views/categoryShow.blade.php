 <x-layout>
  <section class="container py-5">
    <div class="row">
        <div class="col-12">
           <h1>Esplora la categoria : {{ $category->name }}</h1>
        </div>
    </div>
  </section>
  
  <section class="container">
    <div class="row  min-vh-100">
      @forelse ($category->products as $product)
        <div class="col-12 col-md-4 d-flex justify-content-center">
          <x-card
            :product="$product"
          />
        </div>
      @empty      
        <div class="col-12">
          <p class="h1">Non sono presenti prodotti per questa categoria</p>
          <p class="h2">Publicane uno : 
            <a href="{{ route('products.create') }}" class="btn.btn.btn-success shadow"> Nuovo annuncio</a>
          </p>
        </div>
      @endforelse
    </div>
  </section>
</x-layout>