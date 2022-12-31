<div>
   
  <h1 class="pt-5">{{__('ui.createProduct')}}</h1>

    @if(session()->has('message'))
      <div class="flex flex-row justify-center my-2 alert alert-success">
          {{ session('message') }}
      </div>    
    @endif

    <form wire:submit.prevent="store">

      @csrf
    
      <div class="mb-3">
        <label for="title" class="form-label">{{__('ui.titleCreateProduct')}}</label>
        <input type="text" wire:model="title" class="form-control @error('title') is-invalid @enderror">
          @error('title')
              {{ $message }}
          @enderror    
      </div>

      <div class="mb-3">
          <label for="body" class="form-label">{{__('ui.descriptionCreateProduct')}}</label>
          <textarea wire:model='body' class="form-control @error('body') is-invalid @enderror" id="" cols="30" rows="10"></textarea>
            @error('body')
              {{ $message }}
            @enderror   
        </div>

        <div class="mb-3">
          <label for="price" class="form-label">{{__('ui.priceCreateProduct')}}</label>
          <input type="number" step="0.1" class="form-control @error('price') is-invalid @enderror" wire:model="price">
            @error('price')
              {{ $message }}
            @enderror   
        </div>

        <div class="mb-3">
          <label for="category">{{__('ui.categoryCreateProduct')}}</label>
          <select wire:model.defer="category" class="form-control" id="category"> 
            <option value="">{{__('ui.chooseCategory')}}</option>
            @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach    
          </select>
        </div>

        <div> 
          <input wire:model="temporary_images" type="file" name="images" multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img">
          @error('temporary_images.*')
            <p class="text-danger mt-2">{{ $message }}</p>
          @enderror
        </div> 
          @if(!@empty($images))

        <div class="row my-3">
          <div class="col-12">
            <p>{{__('ui.preview')}}</p>
          </div>
        </div>
        <div class="row border border-4 borderCustom">

          @foreach($images as $key=>$image)
          <div class="col-12 col-md-4">
            <div class="img-preview" style="background-image: url({{ $image->temporaryUrl() }});"></div>
            <button type="button" class="btn btn-danger d-block mb-3" wire:click="removeImage ({{ $key }})">{{__('ui.delete')}}</button>
          </div>
          @endforeach
          
        </div>

          @endif

        {{-- <button type="submit" class="btn btn-custom mt-3 mb-5 fw-bold">Crea</button> --}}
        <section class="container my-3">
          <div class="row">
            <div class="col-12 d-flex justify-content-end">
              <div id="btnWrap">
                <button class="btnCreate" id="btnCreate">
                  <span class="fs-5" id="txtCrea">{{__('ui.create')}}</span>
                  <i class="fa-solid fa-circle-check iconCreate fa-2x" id="iconCreate"></i>
                </button>
              </div>
            </div>
          </div>
        </section>
    
    </form>

</div>




