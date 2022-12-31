<x-layout>
  <div class="container">
 
    @if(!$product_to_check)
    <div class="row my-5">
      <div class="col-12">
        <h2>Non ci sono annunci da revisionare</h2>
      </div>
    </div>
   @else

    <div class="row my-5">
      <div class="col-12">
        <h2>Annuncio in coda da revisionare</h2>
      </div>
    </div>
    <x-product-revisor-detail :product="$product_to_check"/>
    {{-- <div class="row">
      <div class="col-12">
        <form action="{{ route('revisor.accept_product', ['product'=>$product_to_check]) }}" method="POST">
          @csrf
          @method('PATCH')
          <button type="submit" class="btn btn-success mb-3">{{__('ui.Accept')}}</button>
        </form> 
        <div class="col-6">
          <a href="{{ route('revisor.index') }}" class="btn btn-danger mb-3">{{__('ui.Reject')}}</a>
        </div>
      </div> --}}
    </div>
    @endif
    

  </div>    
  

  <div class="container my-5 min-vh-50">
    <div class="row">
      <div class="col-12">
        <table class="table">
          <table class="table-wrapper">
          <table class="fl-table tableCustom">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">{{__('ui.titleTab')}}</th>
              <th scope="col">{{__('ui.descriptionTab')}}</th>
              <th scope="col">{{__('ui.priceTab')}}</th>
              <th scope="col">{{__('ui.functionsTab')}}</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $product)
            <tr>
              <th scope="row">{{$product->id}}</th>
              <td>{{ $product->title }}</td>
              <td>{{$product->getDescriptionSubstring()}}</td>
              <td>{{$product->price}}</td>
              <td>
              @if($product->is_accepted == NULL)
                <a href="{{ route('revisor.product', $product) }}" class="btn btn-danger">{{__('ui.Revision')}}</a>
              @endif
              @if($product->is_accepted == true)
                <form action="{{ route('revisor.reset_product', ['product'=>$product]) }}" method="POST">
              @csrf
              @method('PATCH')
                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-warning">{{__('ui.sendRevision')}}</button>
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Sei sicuro di volere mandare l'articolo in revisione?</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-footer">
                          <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Si</button>
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                  </form>
                  @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </table>
      </div>
    </div>
  </div>

  
  
</x-layout>

  