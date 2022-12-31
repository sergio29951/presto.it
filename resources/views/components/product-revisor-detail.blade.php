
<div class="row my-2">
    <div class="col-12">
        <h2>{{ $product->title }}</h2>
        <p>{{ $product->body }}</p>
        <p>{{ $product->price }} €</p>
    
    </div>
    @if(count($product->images)>0)
    <div class="col-12 text-center">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($product->images as $image)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img src="{{ $image->getUrl(400,300) }}" class="img-fluid p-3 w-50" alt="">
                    @if($image->labels)
                    <h5 class="tc-accent mt-3">Tags</h5>
                    <div class="p-2">
                    @foreach ($image->labels as $label)
                        <p class="d-inline">{{ $label }},</p>
                    @endforeach
                    </div>
                    @endif
                    <h5 class="tc-accent mt-3">Revisione Immagini</h5>
                    <div class="card-body d-flex justify-content-center mt-3">
                    <p class="mx-2">Adulti:<span class="{{ $image->adult }} mx-2"></span></p>
                    <p class="mx-2">Satira:<span class="{{ $image->spoof }} mx-2"></span></p>
                    <p class="mx-2">Medicina:<span class="{{ $image->medical }} mx-2"></span></p>
                    <p class="mx-2">Violenza:<span class="{{ $image->violence }} mx-2"></span></p>
                    <p class="mx-2">Contenuto Ammiccante:<span class="{{ $image->racy }} mx-2"></span></p>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon spnCustom" aria-hidden="true"></span>
            {{-- <span class="visually-hidden">Previous</span> --}}
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            
            </button>
        </div> 
        
        
    </div>  
    @endif
</div>



  
