<nav id="darkModeNav" class="navbar navbar-expand-md navbar-custom sticky-top" aria-label="Fourth navbar example">
  <div class="container-fluid">

  <a class="navbar-brand" href="{{ route('home') }}">
    <img class="logo-custom" src="/img/logo.png" alt="">
  </a>

  <div class="switch navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation" type="button">
    <input type="checkbox">
    <div class="navHamb">
      <span class="line-1"></span>
      <span class="line-2"></span>
      <span class="line-3"></span>
    </div>
  </div>
  
    <div class="collapse navbar-collapse" id="navbarsExample04">

      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        
        <li class="nav-item">
          <a class="nav-link fs-5" aria-current="page" href="{{ route('home') }}">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link fs-5" aria-current="page" href="{{ route('products.index') }}"> {{__('ui.allProductsNav')  }}</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle fs-5" href="#" role="button"  id="categoriesDropdown" data-bs-toggle="dropdown" aria-expanded="false">{{__('ui.category')}}</a>

          <ul class="dropdown-menu dropcustom" aria-labelledby="categoriesDropdown">
            @foreach ($categories as $category)
            @if(session('locale') == 'en')
              <li>
                <a class="dropdown-item fs-5 hover-3 text-white a-custom" href="{{ route('category.show', compact('category')) }}">{{ ($category->name_en)}}</a>
              </li>
              <li><hr class="dropdown-divide"></li>
              @else
              <li>
                <a class="dropdown-item fs-5 hover-3 text-white a-custom" href="{{ route('category.show', compact('category')) }}">{{ ($category->name)}}</a>
              </li>
              <li><hr class="dropdown-divide"></li> 
              @endif          
            @endforeach
          </ul>
        </li>

      </ul>


      <li class="nav-link dropdown">
      
        <a class="nav-link dropdown-toggle fs-5" href="#" role="button"  id="Dropdown" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-language"></i>
        </a>
        <ul class="dropdown-menu">

          <li class="dropdown-item">
            <x-_locale lang='en' nation='gb'/>
          </li>

          <li class="dropdown-item">
            <x-_locale lang='it' nation='it'/>
          </li>

        </ul>
      
      
      </li>
      

       {{-- !NON TOCCARE!! LOGICA LOGIN E LOGOUT --}}

        {{-- ?se non sei loggato/registrato --}}
          <ul class="navbar-nav me-5 mb-2 mb-md-0">
            @guest
            <li class="nav-item">
              <a class="nav-link fs-5" href="{{ route('login') }}">Login</a>
            </li>
  
          @else
            <li class="nav-item">
              <a class="nav-link fs-5" href="{{ route('products.create') }}">{{__('ui.createProduct')}}</a>
            </li>


              <li class="nav-item dropdown">
                @if(Auth::user()->is_revisor)
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{ App\Models\Product::toBeRevisionedCount() }}
                  <span class="visually-hidden">Unread messages</span>
                </span>
                @endif
                <a class="nav-link dropdown-toggle fs-5" href="#" data-bs-toggle="dropdown" aria-expanded="false">{{__('ui.welcomeNav')}} {{Auth::user()->name}}</a>
                <ul class="dropdown-menu dropcustom">

                  <li>
                    <a class="dropdown-item hover-3 text-white a-custom" href="#">
                      <i class="fa-solid fa-user"></i> 
                      <span class="mx-2">{{__('ui.myProfile')}}</span> 
                    </a>
                  </li>

                  <li>
                    <a class="dropdown-item hover-3 text-white a-custom my-2" href="#">
                      <i class="fa-solid fa-envelope-open-text"></i> 
                      <span class="mx-2">{{__('ui.messages')}}</span> 
                    </a>
                  </li>

                  <li>
                    <a class="dropdown-item hover-3 text-white a-custom" href="/logout" onclick="event.preventDefault();getElementById('form-logout').submit();">
                      <i class="fa-solid fa-right-from-bracket "></i> 
                      <span class="mx-2">{{__('ui.exit')}}</span> 
                    </a>
                  </li>

                  <form id="form-logout" action="{{ route('logout') }}" method="POST" class="d-none fs-5">
                    @csrf
                  </form>
                 
                  <li class="nav-item">
                    <a class="dropdown-item hover-3 text-white a-custom btn-sm position-relative fw-bold" href="{{ route('revisor.index') }}">
                      <i class="fa-solid fa-unlock-keyhole"></i> 
                      <span class="mx-2">{{__('ui.revisorArea')}}</span>
                    </a>
                  </li>

                </ul>
              </li>
              @endguest
        
          </ul> 
      
      {{-- !FINE LOGICA LOGIN E LOGOUT --}}

    </div>
  </div>
</nav>
