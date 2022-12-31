<x-layout>
  <section class="gradient-form">
    <div class="container py-5">
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col-xl-10">
          <div class="cardLogin rounded-3 text-black">
            <div class="row g-0">

              <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4">

                  <div class="text-center">
                    <img class="img-custom" src="/img/logo.png" alt="logo">
                    <h4 class="mt-1 mb-5 pb-1">{{__('ui.loginText6')}}</h4>
                  </div>
  
                  <form method="POST" action="{{ Route('login') }}">
                  @csrf

                  <div class="mb-3">
                    <label class="form-label"><h5>Email</h5></label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                  </div>

                  <div class="mb-3">
                    <label class="form-label"><h5>Password</h5></label>
                    <input type="password" class="form-control" name="password" id="myInput">
                  </div>
                  <div class="mb-3">

                    {{-- logica show password --}}
                    <input type="checkbox" id="myInput" onclick="togglePassword()"> {{__('ui.loginText5')}}
                  </div>               
                   <script>
                    function togglePassword() {
                      let x = document.getElementById("myInput");
                      if (x.type === "password") {
                        x.type = "text";
                      } else {
                        x.type = "password";
                      }
                    }
                  </script> 

                  <button class="btn btn-custom mt-3">
                    <h5>Login</h5>
                  </button>
                    <h5 class="mt-5">{{__('ui.loginText3')}}
                      <a class="h5" href="{{ route('register') }}">{{__('ui.loginText4')}}</a>
                    </h5>
                  </form>

                </div>
              </div>

              <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                <div class="text-black px-3 py-4 p-md-5 mx-md-4">
                  <h4 class="mb-4 fw-bold">{{__('ui.loginText1')}}</h4>
                  <p class="small mb-0 fs-5">{{__('ui.loginText2')}}</p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</x-layout>














