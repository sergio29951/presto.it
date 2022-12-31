<footer class="mt-4">
  <footer class="footer-distributed">

    <div class="footer-left">
      <p class="footer-links">
        <a class="hover-3" href="{{ route('home') }}">Home</a>
        <a class="hover-3" href="{{ route('contact-team') }}">{{__('ui.contacts')}}</a>
        {{-- ? tasto diventa revisore --}}
        <a class="hover-3" href="{{ route('become.worker') }}">{{__('ui.workWithUs')}}</a>
      </p>
      <p class="footer-company-name text-white fs-4 mt-4">Presto.it © 2022</p>
    </div>  
  
    <div class="footer-center">

      <div>
        <i class="fa-solid text-white fa-location-crosshairs"></i>
        <p><span>Strada S. Giorgio Martire, 2D</span> 70124 Bari (BA)</p>
      </div>
    
      <div>
        <i class="fa-solid text-white fa-phone"></i>
        <p>+39/3311234567</p>
      </div>
    
      <div>
        <i class="fa-solid text-white fa-at"></i>
        <p><a class="hover-3" href="mailto:admin@presto.it">admin@presto.it</a></p>
      </div>
    </div>

    <div class="footer-right">
      <p class="footer-company-about">
      <p class=" h4 text-white pb-3">{{__('ui.payments')}}</p>
      <div class="payments"></div>  
    </div>
  </footer>
</footer>
