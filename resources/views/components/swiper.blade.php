<div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2 mt-5">

  <div class="swiper-wrapper">
    @if(!$product->images()->get()->isEmpty())
      @foreach ($product->images as $image)
      <div class="swiper-slide">
        <img src="{{ $image->getUrl(400, 300)}}" alt=""></a>
      </div>
      @endforeach
    @else
      <div class="swiper-slide">
        <img src="/img/no-image-available.png" alt=""></a>
      </div>
    @endif
  </div>
  

  <div class="swiper-pagination"></div>
  
</div>

<div thumbsSlider="" class="swiper mySwiper swiper-auto"></div>
