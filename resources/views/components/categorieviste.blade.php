<div class="image-mosaic">

  <div class="card-mosaic card-tall card-wide effect-card img-Motori">
    <a class="decoration" href="{{ route('category.show', $categories->where('name', 'Motori')->first()) }}">
      <h2 class="text-white">{{__('ui.motors')}}</h2>
    </a>
  </div>

  <div class="card-mosaic card-tall effect-card img-informatica">
    <a class="decoration" href="{{ route('category.show', $categories->where('name', 'Informatica')->first()) }}">
      <h2 class="text-white">{{__('ui.IT')}}</h2>
    </a>
  </div>

  <div class="card-mosaic effect-card img-elettrodomestici">
    <a class="decoration" href="{{ route('category.show', $categories->where('name', 'Elettrodomestici')->first()) }}">
      <h2 class="text-white">{{__('ui.domesticAppliances')}}</h2>
    </a>
  </div>

  <div class="card-mosaic effect-card img-sport">
    <a class="decoration" href="{{ route('category.show', $categories->where('name', 'Sport')->first()) }}">
      <h2 class="text-white">{{__('ui.sport')}}</h2>
    </a>
  </div>

</div>

