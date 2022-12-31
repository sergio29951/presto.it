<x-layout>
  {{-- TITOLO --}}
  <div class="container mt-5">
    <div class="row">
      <div class="col-12">
        <h1>{{__('ui.allProducts')  }}</h1>
      </div>
    </div>

    <div class="col-12 col-md-6 ms-end mt-4">
      <form action="{{ route('products.search') }}" method="GET" class="d-flex">
        <input type="search" name="searched" class="form-control" placeholder="{{__('ui.placeHolder')}}"> 
        <button class="btn btn-custom mx-2" type="submit">{{__('ui.go')}}</button>
      </form>
      </div>
  </div>

    <div id="indexProdDark" class="container">
      <div class="row">

        @forelse ($products as $product)
          <div class="col-12 col-md-4 d-flex justify-content-center">
            <x-card
              :product="$product"
            />
          </div>
        @empty

          <div class="col-12 col-md-6 mt-5 vh-100">
            <div class="alert alert-warning py-2">
              <p>{{__('ui.errorMessageSearch')}}</p>
            </div>
          </div>
          
        @endforelse
          {{ $products->links() }}
          
      </div>
    </div>
</x-layout>
