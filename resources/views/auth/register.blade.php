<x-layout>
  <section class=" gradient-form">
    <div class="container py-5 ">
      <div class="row d-flex justify-content-center align-items-center ">
        <div class="col-xl-10">
          <div class="cardRegister rounded-3 text-black">
            <div class="row g-0">

              <div class="col-lg-6">

                <div class="card-body p-md-5 mx-md-4">
                  <div class="text-center">
                    <img class="img-custom" src="/img/logo.png" alt="logo">
                    <h4 class="mt-1 mb-5 pb-1">{{__('ui.registerText1')}}
                      <span class="fw-bold">{{__('ui.registerText2')}}</span>
                    </h4> 
                  </div>
                  <form method="POST" action="{{ Route('register') }}">
                    @csrf

                    <div class="mb-3">
                      <label class="form-label">
                        <h5>{{__('ui.registerText3')}}</h5>
                      </label>
                      <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                      @error('name')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="mb-3">
                      <label class="form-label"> <h5>{{__('ui.registerText4')}}</h5></label>
                      <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                      @error('email')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="mb-3">
                      <label class="form-label"><h5>{{__('ui.registerText5')}}</h5></label>
                      <input type="password" class="form-control" name="password">
                      @error('password')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="mb-3">
                      <label class="form-label"> 
                        <h5>{{__('ui.registerText6')}}</h5>
                      </label>
                      <input type="password" class="form-control" name="password_confirmation">
                      @error('password_confirmation')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                      <button class="btn btn-custom mt-3">
                        <h5>{{__('ui.registerText7')}}</h5>
                      </button>
                  </form>
                </div>

              </div>

              <div class="col-lg-6 d-flex align-items-center gradient-custom-2 flex-column justify-content-center">
                <div class="text-black px-3 py-4 p-md-5 mx-md-4 fw-bold fs-3">
                  <h4 class="small mb-0">{{__('ui.registerText8')}}</h4>
                </div>
                <div>
                  <p class="mt-5 aling-items-center justify-content-end">{{__('ui.registerText9')}}</p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>      
</x-layout>
  





