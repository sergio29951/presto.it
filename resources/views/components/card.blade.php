<div class="card my-5">
  <div class="cardCustom">
    <a  class="text-black" href="{{ route('products.show', compact('product')) }}">
    <img src="{{ !$product->images()->get()->isEmpty() ? Storage::url($product->images()->first()->path) : 'https://picsum.photos/200/300' }}" alt=""></a>
  </div>
  <div class="cardBody text-center">
    <p class="txtTitle"><h5>{{ $product->title }}</h5></p>
    <p class="txtBody"> {{ $product->getDescriptionSubstringCard()}}</p>
    <span>{{ $product->price }} € </span>
  </div>
</div>